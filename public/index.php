<?php
session_start();
ini_set('display_errors', 1);

if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
} else {
    //$url = $_SERVER["REQUEST_URI"];
    //$explodeUrl = explode('/', $url);
//    print_r($explodeUrl);

    /**
     * definir as constantes
     */
    define("DEFAULT_CONTROLLER", "home");
    define("ROOT", dirname(__FILE__));
    //echo dirname(__FILE__);

    /**
     * Carregar o sistema
     */
    require "../vendor/autoload.php";
    require "../App/functions/helpes.php";
    require "../App/functions/function.php";
    require "../App/functions/twig.php";
    require "../bootstrap.php";
}
