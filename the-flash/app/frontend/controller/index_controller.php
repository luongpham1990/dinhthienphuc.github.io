<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 08/08/2016
 * Time: 8:23 CH
 */
class index_controller extends base_controller
{
    public function view()
    {
        define('LIMIT', 6);
        $this->loadModel('index');
        // $this->model is the object of index_model
        // pagination analyze
        $total_post = $this->model->getTotalPost()['total_post'];
        $total_page = ceil($total_post / LIMIT);

        if (isset($_GET['page'])) {
            //if page = character, assign $total_page+1 to it, in order to make this over range
            if (!is_numeric($_GET['page'])) {
                $_GET['page'] = $total_page + 1;
            }
            $data = $this->model->getData(LIMIT, $_GET['page']);
        } else {
            $data = $this->model->getData(LIMIT, 1);
        }

        // call loadView() and show data
        $this->loadView('index', array(
            'data' => $data,
            'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'total_page' => $total_page,
            'back_to_home' => "Oops. Something went wrong. Please search again..."
        ));
    }
}