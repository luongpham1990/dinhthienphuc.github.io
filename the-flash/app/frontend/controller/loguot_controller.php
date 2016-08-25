<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/15/2016
 * Time: 10:02 AM
 */
class loguot_controller extends base_controller {
    public function view() {
        unset($_SESSION['login_success']);
        header("Location:index");
    }
}