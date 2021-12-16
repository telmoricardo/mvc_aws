<?php

namespace App\Controllers\site;

use App\Controllers\ContainerController;


class ProdutoController extends ContainerController
{

    public function index(){
        $this->view('site.produto', [
            'titulo' => 'Página produto',
        ]);
    }
}