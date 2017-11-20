<?php
session_start();

// use Varejo\Services\RenderView;


/**
 * Definição de constantes de apoio ao sistema
 */
define("_DS_", DIRECTORY_SEPARATOR);
define("ROOT_PATH", filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));


/** 
 * Arquivo de inicialização de classes de forma automáticas já pré 
 * carregadas na memória 
 * */
require __DIR__ . _DS_ . '..' . _DS_ . 'vendor' . _DS_ . 'autoload.php';



/** 
 * Carregamente de rotas do sistema
 * Todo cadastro de rotas encontra-se no arquivo route.php
 */
$route = new \Varejo\Services\Route;
require __DIR__ . _DS_ . '..' . _DS_ . 'app' . _DS_ . 'route.php';
$route->execute();
