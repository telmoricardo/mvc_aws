<?php

namespace App\Classes;
use Twig_Loader_Filesystem;
use Twig_Environment;
class LoadTemplate
{
    protected $twig;
    private $loader;

    private function load(){
        $this->loader = new Twig_Loader_Filesystem('../App/Views');
        return $this->loader;
    }

    public function init(){
        $this->twig = new Twig_Environment($this->load(),
        [
            'debug'=>true,
//            'cache' => ROOT.'/Cache',
            'auto_reload' => true
        ]);

        return $this->twig;
    }
}