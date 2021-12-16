<?php

namespace App\Classes;

use App\Traits\Sanitize;
use App\Traits\Validate;

class Validator
{

    use Validate, Sanitize;

    public static function validate(\Closure $callback){

        if(is_callable($callback)){
            $callback();

            return self::dataSanitized();
        }
    }
}