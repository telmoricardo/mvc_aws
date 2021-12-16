<?php

namespace App\Traits;

trait CollectionDb
{

    protected $paginate;
    protected $busca;
    protected $binds = [];
    protected $sql;

    public function paginate($perpage)
    {
        $list = $this->bindExecute();
    }

    public function get()
    {
        $list = $this->bindExecute();
        return $list->fetchAll();
    }

    public function first()
    {
        $list = $this->bindExecute();
        return $list->fetch();
    }

    public function bindValues($list)
    {
        if(!empty($this->binds)){
            foreach ($this->binds as $key => $value):
                $list->bindValue(":{$key}", $value);
            endforeach;
        }
    }

    private function bindExecute(){
        if(!isset($this->sql)){
            throw new \Exception("Por favor use o ". $this->sql);
        }

        $list = $this->connection->prepare($this->sql);
        $this->bindValues($list);
        $list->execute();

        return $list;
    }

    public function select($fields){
        $this->sql = "SELECT $fields FROM {$this->table}";


        return $this;
    }

    public function all(){
        $this->sql = "SELECT * FROM {$this->table}";


        return $this;
    }

    public function find($field, $value){
        $sql = "SELECT * FROM {$this->table} where {$field} = ?";
        $find = $this->connection->prepare($sql);
        $find->bindValue(1, $value);
        $find->execute();

        return $find->fetch();
    }
}