<?php
/** Arquivo de inicialização de classes de forma automáticas já pré carregadas na memória */

require_once __DIR__ . '\..\vendor\autoload.php';


/** Carregamente de rotas do sistema */
$route = new \Varejo\Services\Route;
require_once __DIR__ . '\route.php';
$route->execute();
