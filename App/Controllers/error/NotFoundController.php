<?php

namespace App\Controllers\error;

use App\Controllers\ContainerController;


class NotFoundController extends ContainerController
{
//    public function index(){
//        $dados = ['titulo' => '404 '];
//        $template = $this->twig->loadTemplate('error/.html');
//        $template->display($dados);
//    }

    public function index(){

        $this->view('error.error404', [
            'titulo' => '404 '
        ]);

    }


}