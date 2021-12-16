<?php

namespace App\Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email extends PHPMailer
{

    private $email;
    private $body;
    private $quem;
    private $para;
    private $copia;
    private $assunto;
    private $mensagem;

    public function enviarEmail(){

        $config = Load::load('email');

        $this->charset = "UTF-8";
        $this->SMTPSecure = "tls";
        $this->IsSmtp();
        $this->Host = $config->host;
        $this->Port = $config->port;
        $this->SMTPSecure =  true;
        $this->Username = $config->username;
        $this->Password = $config->password;
        $this->IsHtml();
        $this->setFrom($config->from);
        $this->From = $this->quem;
        //$this->AddAdress($this->para);
        $copia = $this->copia;

        if(!empty($copia)){
            $this->AddAdress($this->copia);
        }
        $this->Subject = $this->assunto;
        $this->AltBody = "Para voce ver esse email, tenha certeza de estar endo em um programa que aceite ver html";
        $this->MsgHTML($this->body);

       // dd($this->ErrorInfo);
        return $this->send();

    }


    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function setBody($body)
    {
        $this->body = $body;
    }


    public function setQuem($quem)
    {
        $this->quem = $quem;
    }


    public function setPara($para)
    {
        $this->para = $para;
    }


    public function setCopia($copia)
    {
        $this->copia = $copia;
    }


    public function setAssunto($assunto)
    {
        $this->assunto = $assunto;
    }


    public function setMensagem($mensagem)
    {
        $this->mensagem = $mensagem;
    }





}