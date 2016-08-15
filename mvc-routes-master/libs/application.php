<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 11:26 AM
 */
class application {
    private $controller;
    private $action = 'view';
    private $param;
    private $request_path = array();

    public function __construct() {
        //split url to get controller and action, then head to corresponding controller
        $this->request_path = $this->request_path();
        $this->splitURL();

        //assign first member of path to controller, rename by "name_controller"
        $controller = empty($this->controller) ? 'index' : $this->controller;
        $controller = strtolower($controller)."_controller";

        //check whether file exist or not
        if (!file_exists(PATH_APPLICATION . "/frontend/controller/".$controller.".php")) {
            header("Location:".BASE_PATH."/p404");
        }

        //import file to create new object of name_controller class
        require PATH_APPLICATION."/frontend/controller/".$controller.".php";
        $controllerObj = new $controller();

        //check if class exist
        if(!class_exists($controller)) {
            header("Location:".BASE_PATH."/p404");
        }

        //check if method exist
        if(method_exists($controller,$this->action)) {
            if(!empty($this->param)) {
              call_user_func_array(array($controllerObj,$this->action), $this->param);
            } else {
              //call method view(); >.< it's default method
              $controllerObj->{$this->action}();
            }
        } else {
            header("Location:".BASE_PATH."/p404");
        }
    }

    private function request_path() {
        //split url into array, then compare
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
        if (empty($parts)) {
            return '/';
        }
        $path = implode('/', $parts);
        if (($position = strpos($path, '?')) !== FALSE) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }

    private function splitURL() {
        if (empty($this->request_path)) {
            $this->controller = null;
            $this->param = null;
        } else {
            $url = $this->request_path;
            $url = filter_var($url, FILTER_SANITIZE_URL); //check with filter-val
            $url = explode("/", $url);
            $this->controller = isset($url[0]) ? $url[0] : null; // $url[0] is controller
            unset($url[0]);//unset controller from array

            $this->param = array_values($url);
        }
    }
}