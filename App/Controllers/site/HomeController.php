<?php

namespace App\Controllers\site;


use App\Controllers\ContainerController;

class HomeController extends ContainerController
{
    public function index(){

         //$depoimentos = new Depoimento();
         //$depoimentosEncontrados = $depoimentos->all();

//         $senha = Hash::criarSenha("1234", 'X053tc6CNy1QtHepzPU1Cw==');
//         echo $senha;

        $this->view('site.home', [
            'titulo' => 'Página inicial'
        ]);

    }



}
