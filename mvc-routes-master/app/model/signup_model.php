<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/14/2016
 * Time: 2:28 PM
 */
class signup_model extends base_model{
    public $table = "users";
    public function addUser($array) {
        $array['password'] = md5($array['password']);
        $sql = "INSERT INTO ".$this->table."(user_name, user_pass, user_email) VALUES (?, ?, ?)";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $array['username']);
            $this->stmt->bindParam(2, $array['password']);
            $this->stmt->bindParam(3, $array['email']);
            $this->stmt->execute();
        } catch(PDOException $exc) {
            die($exc->getMessage());
        }
        $id = $this->conn->lastInsertId();
        return $this->getById($this->table, $id);
    }

}