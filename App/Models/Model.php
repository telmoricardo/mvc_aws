<?php

namespace App\Models;

abstract class Model
{
    public $conn;

    public function __construct() {
        $this->conn = Connection::connection();
    }

    public function all(){
        $sql = "SELECT * FROM {$this->table}";
        $all = $this->conn->prepare($sql);
        $all->execute();

        return $all->fetchAll();
    }
    public function find($field, $value){
        $sql = "SELECT * FROM {$this->table} where {$field} = ?";
        $find = $this->conn->prepare($sql);
        $find->bindValue(1, $value);
        $find->execute();

        return $find->fetch();
    }
}