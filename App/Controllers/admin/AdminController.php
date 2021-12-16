<?php

namespace App\Controllers\admin;

use App\Classes\Flash;
use App\Classes\Hash;
use App\Classes\Login;
use App\Classes\Redirect;
use App\Controllers\ContainerController;
use App\Models\Admin\Admin;

class AdminController extends ContainerController
{
    public function index(){

        //dd(Hash::make(123456));
        $this->view('admin.login', [
            'titulo' => 'Login de usuarios'
        ]);
    }

    public function store(){

        $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $logado = logar($email, $password, new Admin());

        if($logado){
            return Redirect::to('painel');
        } else {

            Flash::add('login', 'Usuário ou senha inválidos');
            return Redirect::back();
        }


    }
}