<?php

namespace App\Controllers\site;

use App\Classes\Email;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\SendEmail;
use App\Classes\Validator;
use App\Controllers\ContainerController;
use App\Models\Admin\Admin;


class ContatoController extends ContainerController
{
    public function index(){

           $this->view('site.contato', [
            'titulo' => 'Contrato'
        ]);

    }

    public function enviar(){

        if(Request::request('post')){

            $validate = Validator::validate(function () {
                return Validator::required('nome','email','mensagem')
                    ->email('email')
                    ->sanitize('nome:s', 'email:s', 'mensagem:s')
                    ->unique('email', Admin::class);
            });


            if(Validator::failed()){
                return Redirect::back();
            }

            $senderEmail = new SendEmail(new Email());
            $senderEmail->data([
                'assunto' => 'assunto do email',
                'quem' => $validate->email,
                'para' => 'telmoricardorosa@gmail.com',
                'mensagem' => $validate->mensagem
            ]);

            if($senderEmail->send()){
                flash('mensagem_email', 'Email enviando com sucesso');
                return back();

            }
            flash('mensagem_email', 'error ao enviar o email');
            back();

        }


    }
}