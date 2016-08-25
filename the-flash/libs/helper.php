<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/9/16
 * Time: 10:17 AM
 */
class helper
{
    static function setNotFillError($name, $value)
    {
        $_SESSION['not_filled'][$name] = $value;
    }

    static function setValidateError($name, $value)
    {
        $_SESSION['not_validated'][$name] = $value;
    }

    static function setDuplicateErrorInDatabase($name, $val)
    {
        $_SESSION['not_found'][$name] = $val;
    }

    static function oldInputLogin($username, $password)
    {
        self::setInput('old_username', $username);
        self::setInput('old_password', $password);
    }

    static function oldInputResgister($username, $password, $repassword, $email)
    {
        self::setInput('old_username', $username);
        self::setInput('old_password', $password);
        self::setInput('old_repassword', $repassword);
        self::setInput('old_email', $email);
    }

}