<?php

namespace App\Traits;

use App\Classes\Bind;

trait View
{
    public function view($view,$dados){

        $twig = Bind::get('twig');

        $template = $twig->loadTemplate(str_replace('.', '/', $view) . '.html');

        return $template->display($dados);
    }
}