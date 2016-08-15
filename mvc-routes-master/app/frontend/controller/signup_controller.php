<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/14/2016
 * Time: 2:18 PM
 */
include_once dirname(PATH_APPLICATION) . "/libs/validation.php";
include_once dirname(PATH_APPLICATION) . "/libs/helper.php";

class signup_controller extends base_controller {

    public function view() {
        //if submit button is not pressed, call loadView(); else - check error
        if($_SERVER['REQUEST_METHOD'] !== "POST") {
            $this->loadView('signup');
        } else {
            $this->setValidateError($_POST);

            //if session['not_validated'] exist, call loadView() and push errors
            if(!empty($_SESSION['not_validated'])) {
                $this->loadView('signup', array(
                    'invalid' => $_SESSION['not_validated']
                ));
            } else { //if error session empty, insert user into database and return detail infomation

                //add info into databse and return this info to user
                $this->loadModel('signup');
                $info = $this->model->addUser($_POST);

                //call loadView() to check
                $this->loadView('signup', array(
                    'success' => "register success!"
                ));
            }
        }
    }

    public function setEmptyError($arr) {
        if(!isset($arr['username'])) {
            helper::setNotFillError('username', 'Please re-enter username!');
        }
        if(!isset($arr['password'])) {
            helper::setNotFillError('password', 'Please re-enter password!');
        }
        if(!isset($arr['re-password'])) {
            helper::setNotFillError('re-password', 'Please re-enter confirm-password!');
        }
        if(!isset($arr['email'])) {
            helper::setNotFillError('email', 'Please re-enter email!');
        }
    }

    //set valid errors such as invalid name, invalid pass, unmatched pass
    public function setValidateError($arr) {
        if(!Validation::isValidUser($arr['username'])) {
            helper::setValidateError('username', 'Invalided username. Please re-enter!');
        }
        if(!Validation::isValidPass($arr['password'])) {
            helper::setValidateError('password', 'Invalided password. Please re-enter!');
        }
        if(!Validation::isMatched($arr['password'], $arr['re-password'])) {
            helper::setValidateError('re-password', 'Unmatched. Please re-confirm password!');
        }
    }
}