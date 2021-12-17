<?php

namespace App\Controllers\site;


use App\Classes\Redirect;
use App\Classes\Validator;
use App\Controllers\ContainerController;
use App\Models\admin\Admin;
use App\Models\site\Depoimento as depoimento;

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

    public function store(){

        $validate = Validator::validate(function () {
            return Validator::required('nome','mensagem')
                ->sanitize('nome:s', 'mensagem:s');
        });

        if(Validator::failed()){
            return Redirect::back();
        }

//        dd($validate);

        $depoimento = new Depoimento();
//        $cadastrado = $depoimento->insert($validate);
        $cadastrado = $depoimento->update($validate, ['id' => 15]);
        dd($cadastrado);
    }



}
