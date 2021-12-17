<?php

namespace App\Models\querybuider;

use App\Classes\Bind;

class Insert
{
    private $sql;
    private $data;
    private $table;

    public function __construct($data, $table)
    {
        $this->data = (array) $data;
        $this->table = $table;
    }

    public function create(){
        $this->sql = "INSERT INTO {$this->table}";

        $fields = implode(',', array_keys($this->data));

        $this->sql .= "({$fields}) values";

        $values = ':' . implode(', :', array_keys($this->data));

        $this->sql .= "({$values})";

        return $this;
    }

    public function save(){
        $connection = Bind::get('connection');

        $insert = $connection->prepare($this->sql);

        $insert->execute($this->data);

        return $connection->lastInsertId();

    }
}