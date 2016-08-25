<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/14/2016
 * Time: 11:16 PM
 */
class login_model extends base_model {
    public $table = "users";
    public function checkLogin($str) {
        $sql = "SELECT user_name, user_pass FROM ".$this->table." WHERE user_name=?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $str);
            $this->stmt->execute();
        } catch(PDOException $exc) {
            die($exc->getMessage());
        }
        return $this->stmt->fetch();
    }
}