<?php

namespace App\Traits;

use App\Classes\Flash;

trait Sanitize
{

    private static $sanitized = [];

    public function sanitize(...$indexes){

        foreach ($indexes as $index):
            if(!strpos($index, ':')){

                throw new \Exception("Tem alguma coisa errada com a sua validação no indice {$index}, verifique se tem dois pontos");
             }

            list($fiedlToValidate, $typeValidate) = explode(":", $index);

            switch ($typeValidate){

                case 's':
                    static::$sanitized[$fiedlToValidate] = $this->string($_POST[$fiedlToValidate]);
                    break;

                case 'i':
                    static::$sanitized[$fiedlToValidate] = $this->string($_POST[$fiedlToValidate]);
                    break;

            }

        endforeach;

        return new static();
    }


    public function string($string){
        return filter_var($string, FILTER_SANITIZE_STRING);
    }

    public function int($int){
        return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }

    public static function dataSanitized(){
        if(empty(static::$sanitized)){
            throw new \Exception("Opa, você esieceu de proteger seus dados, use sempre o sanitize");
        }
        return (object) static::$sanitized;
    }

}