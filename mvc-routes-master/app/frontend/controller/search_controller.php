<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/13/2016
 * Time: 8:53 PM
 */
class search_controller extends base_controller {

    public function view() {
        if(isset($_GET['s'])) {
            $limit = 4;

//            if(str_word_count($_GET['s']) > 1) {
//                $arr = explode(" ", $_GET['s']);
//                $_GET['s'] = implode($arr);
//            }

            $this->loadModel('search');
            $data = $this->model->findPostByTitle($_GET['s']);

            $total_search = count($data);
            $total_page = ceil($total_search/ $limit);

            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            if(!is_numeric($current_page) || $current_page > $total_page) {
                $current_page = $total_page + 1;
            }

            $this->loadView('search', array(
                'result' => $data,
                'current_page' => $current_page,
                'total_page' => $total_page,
                'limit' => $limit,
                's' => $_GET['s'],
                'back_to_home' => "Oops. Something went wrong. Please search again..."
            ));
        }
    }

}