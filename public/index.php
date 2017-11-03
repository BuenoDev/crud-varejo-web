<?php
/** Arquivo de inicialização de classes de forma automáticas já pré carregadas na memória */

require __DIR__ . '\..\vendor\autoload.php';


/** Carregamente de rotas do sistema */
$route = new \Varejo\Services\Route;
require __DIR__ . '\..\app\route.php';
$route->execute();