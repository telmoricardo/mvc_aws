<?php

namespace App\Classes;

class Flash
{
    //verifica se existe a sessão existe
    //verificar se sessão existe para uma variavel
    // no final return na variavel que eu atribui a sessão

    public static function add($index, $message){
        if(!isset($_SESSION[$index])){
            $_SESSION[$index] = $message;
        }
    }

    // se não exister cria ela
    public static function get($index){
        if(isset($_SESSION[$index])){
            $message = $_SESSION[$index];
        }

        // logo depois destruir a sessão
        unset($_SESSION[$index]);

        return $message ?? '';
    }

}