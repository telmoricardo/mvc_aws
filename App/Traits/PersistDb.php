<?php

namespace App\Traits;

use App\Models\querybuider\Insert;
use App\Models\querybuider\Update;

trait PersistDb
{

    public function insert($data){
        return (new Insert($data, $this->table))->create()->save();

    }

    public function update($data, array $where){

        if(!is_array($where)){
            throw new \Exception("o where do update tem que ser um array");
        }
        return (new Update($data, $where, $this->table))->create()->save();
    }
}