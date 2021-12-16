<?php

namespace App\Classes;

class Parameters
{

    public static function getParameter($index){
        $exploderUrl = explode('/', Url::getUrl());

        return $exploderUrl[$index];
    }
}