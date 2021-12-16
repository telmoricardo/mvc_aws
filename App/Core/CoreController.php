<?php
namespace App\Core;

use App\Classes\Url;


class CoreController
{


    /**
     * verifica o numero de segmentos da url e pega o controller e o metodo
     * @param $explodeUrl
     * @return void
     */
    private function retornoControllerMetodo($url){
        $controller = substr($url,1);

        if(substr_count($controller, '/') >= 1){
            list($controller,$method, $parameter) = explode('/', $controller . '/');

            return [
                'controller' => $controller,
                'method' => $method,
                'parameter' => $parameter
            ];
        }

        return ['controller' => $controller];
    }

    public function controller(){
        $url = Url::getUrl();

        if($url != '/'){
            return $this->retornoControllerMetodo($url);
        }

        return ['controller' => DEFAULT_CONTROLLER ];
    }
}