<?php

namespace App\Classes;

class Request
{
    public static function request($type){
        if($_SERVER['REQUEST_METHOD'] != strtoupper($type)){

            throw new \Exception("A requisição tem que ser do tipo {$type}");
        }
        return true;
    }
}