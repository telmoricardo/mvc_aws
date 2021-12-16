<?php
//carregar template
$template = new \App\Classes\LoadTemplate();
$twig = $template->init();

//carrega funcões do twig
$twig->addFunction($site_url);
$twig->addFunction($message);

$twig->addGlobal("session", $_SESSION);

/**definir o timezone do projeto */
//$twig->getExtension('core')->setTimeZone('America/Sao_Paulo');
//$twig->getExtension('core')->setDateFormat('d/m/Y');

//chamar o base controller
$baseController = new \App\Controllers\Controller();

$controller = $baseController->getController();
$classController = new $controller();

\App\Classes\Bind::bind('twig', $twig);

try {
    //pegar o metodo
    $metodo = $baseController->getMethod($classController);
    $parameter = $baseController->parameter();
    $classController->$metodo($parameter);
}catch (\Throwable $e){
    dd($e->getMessage() . ' ' .$e->getFile() . ' ' . $e->getLine());
}


