<?php

namespace App\Classes;

class Bind
{
    private static $bind = [];

    public static function bind($key,$value){
        static::$bind[$key] = $value;
    }

    public static function get($key){
        if(!isset(static::$bind[$key])){
            throw  new \Exception("Esse {$key} indice não existe na container");
        }

        return static::$bind[$key];
    }
}