<?php

namespace App\Classes;

class Load
{
    static $config;

    public static function load($index){

        static::$config = require "../config.php";

        if(!isset(static::$config[$index])){
            throw new \Exception('Esse indice não existe: {$index}, na classe Load');
        }

        return (object) static::$config[$index];
    }
}