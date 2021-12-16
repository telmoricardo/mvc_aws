<?php

namespace App\Controllers\admin;

use App\Controllers\ContainerController;


class PainelController extends ContainerController
{
    public function index(){
        $this->view('admin.painel.painel', [
            'titulo' => 'Página de Administrativo'
        ]);
    }
}

