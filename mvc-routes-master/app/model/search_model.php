<?php

/**
 * Created by PhpStorm.
 * User: thien
 * Date: 8/13/2016
 * Time: 8:54 PM
 */
class search_model extends base_model {
    public $table = "posts";
    public function findPostByTitle($get) {
        $pattern = "%".$get."%";
//        $sql = "SELECT * FROM ".$this->table." WHERE title LIKE '$pattern'";
        $sql = "SELECT * FROM ".$this->table." WHERE title LIKE '$pattern'";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
        } catch(PDOException $exc) {
            die($exc->getMessage());
        }
        return $this->stmt->fetchAll();
    }
}