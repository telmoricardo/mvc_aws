<?php
use \App\Models\Model;
use \App\Classes\Login;
function dd($dump){
    var_dump($dump);

    die();
}

function logar($email, $password, Model $model){

    return (new Login())->logar($email, $password, $model);
}

function flash($index, $message){
    return (new \App\Classes\Flash())::add($index, $message);
}

function back(){
    return \App\Classes\Redirect::back();
}

function redirect($target){
    return \App\Classes\Redirect::to($target);
}