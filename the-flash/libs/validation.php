<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 10:25 AM
 */
class validation {

    static public function isValidUser($user) {
        $pattern = "/^[a-zA-Z0-9]{6,18}$/";
        if(preg_match($pattern, $user)) {
            return true;
        } else {
            return false;
        }
    }

    static public function isValidPass($pass) {
        $pattern = "/^[a-zA-Z0-9]{6,18}$/";
        if(preg_match($pattern, $pass)) {
            return true;
        } else {
            return false;
        }
    }

    static public function isMatched($pass1, $pass2) {
        if($pass1 === $pass2) {
            return true;
        } else {
            return false;
        }
    }
}