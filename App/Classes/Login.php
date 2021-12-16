<?php

namespace App\Classes;

use App\Models\Model;

class Login
{
    public function logar($email, $password, Model $model){

        $dados = $model->find('email', $email);

        if(!$dados){
            return false;
        }

        if(Hash::checkPassword($password, $dados->password)){

            $_SESSION[$model->logado] = true;

            $_SESSION[$model->dados] = true;

            session_regenerate_id();

            return true;
        }

        return  false;
    }
}