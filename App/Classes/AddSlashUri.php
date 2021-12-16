<?php
namespace App\Classes;
class AddSlashUri
{
    public function addSlash(){
        if($_SERVER['REQUEST_URI'] != '/'){
            return $_SERVER['REQUEST_URI'].'/';
        }
    }
}