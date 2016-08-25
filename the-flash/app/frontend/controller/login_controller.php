<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/13/2016
 * Time: 11:11 PM
 */
//include_once dirname(PATH_APPLICATION) . "/libs/validation.php";
include_once dirname(PATH_APPLICATION) . "/libs/helper.php";

class login_controller extends base_controller
{

    public function view()
    {
        if ($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->loadView('login');
        } else {
            //load data where user_name === input data username
            $this->loadModel('login');
            $data = $this->model->checkLogin($_POST['username']);

            $flag = true;

            //check whether username exist or not
            if ($data === false) {
                helper::setDuplicateErrorInDatabase('username', 'Wrong username. Please re-enter!');
                $flag = false;
            } else {
                //compare password, both md5 and not-md5 define
                if (strlen($data['user_pass']) === 32) {
                    if (md5($_POST['password']) !== $data['user_pass']) {
                        helper::setDuplicateErrorInDatabase('password', 'Wrong password. Please re-ener!');
                        $flag = false;
                    }
                } else {
                    if ($_POST['password'] !== $data['user_pass']) {
                        helper::setDuplicateErrorInDatabase('password', 'Wrong password. Please re-ener!');
                        $flag = false;
                    }
                }
            }

            //if $flag === false, it means there is error
            if ($flag === false) {
                $this->loadView('login', array(
                    'data_empty' => $_SESSION['not_found']
                ));
            } else {
                //if %flag === true, input info is true, head user to index.php, add "hello" button
                $_SESSION['login_success'] = $_POST['username'];
                header("Location:index");
            }

        }

    }
}