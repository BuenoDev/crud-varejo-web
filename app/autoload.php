<?php
/** Arquivo de inicialização de classes de forma automáticas já pré carregadas na memória */

require_once __DIR__ . '\..\vendor\autoload.php';

$page = filter_input(INPUT_GET, 'page', FILTER_DEFAULT) ?? 'home';

$name_controller = ucfirst($page);

if(file_exists(__DIR__ . "\\Controller\\" . $name_controller . ".php")){
    $namespace = "\\Varejo\\Controller\\" . $name_controller;
    $controller = new $namespace;
}else{
    $controller = new \Varejo\Controller\Home;
}
echo $controller->show();