<?php
/** Arquivo de inicialização de classes de forma automáticas já pré carregadas na memória */

require_once __DIR__ . '\..\vendor\autoload.php';


$route = new \Varejo\Services\RouteService;
require_once __DIR__ . '\route.php';
$route->execute();
