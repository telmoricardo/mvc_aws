<?php

namespace App\Models\Site;

use App\Models\Model;

class Depoimento extends Model
{
    public $table = "depoimentos";

    protected $sql;

    public function listar(){
        $this->sql = "select * from {$this->table}";
        return $this;
    }

}