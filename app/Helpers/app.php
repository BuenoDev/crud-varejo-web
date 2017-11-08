<?php

/**
 * Função para debug na aplicação
 */
if(!function_exists('dd')){
    function dd(...$args){
        echo "<pre>";
            var_dump($args);
        echo "</pre>";
        die;
    }
}

/**
 * Retorno de view renderizada
 */
if(!function_exists('view')){
    function view($view, array $vars = []){
        $resources = '../resources/views/' . $view . '.view.php';
        if(file_exists($resources)){
            require_once $resources;
        }else{
            echo "ERROR: View {$view} não encontrada";
        }
        
    }
}

/**
 * Retorno de view renderizada
 */
if(!function_exists('view_path')){
    function view_path($view){
        return ROOT_PATH . _DS_ . 'resources' . _DS_ . 'views' . _DS_ . $view . '.view.php';
    }
}

/**
 * Aresentação e tratamento de erro na aplicação
 */
if(!function_exists('errorDebug')){
    function error_debug($error, $message){
        if($error){
            die($message . " - File: {$error->getFile()} <br> - Linha: {$error->getLine()}");
        }else{
            die($message);
        }

    }
}

