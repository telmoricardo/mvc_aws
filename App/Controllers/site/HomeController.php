<?php

namespace App\Controllers\site;


use App\Controllers\ContainerController;
use App\Models\Site\Depoimento as depoimento;

class HomeController extends ContainerController
{
    public function index(){


         $depoimento = new Depoimento();
         //$depoimentos = $depoimento->listar()->get();
         //$depoimentos = $depoimento->listar()->first();
        // $depoimentos = $depoimento->select('id, nome')->first();
        $depoimentos = $depoimento->listar()->paginate(2)->get();

         //$depoimentosEncontrados = $depoimentos->all();

//        dd( $depoimento->links());

//         $senha = Hash::criarSenha("1234", 'X053tc6CNy1QtHepzPU1Cw==');
//         echo $senha;

        $this->view('site.home', [
            'titulo' => 'Página inicial',
            'depoimentos' => $depoimentos,
            'links' => $depoimento->links()
        ]);

    }



}
