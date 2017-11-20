<?php

/**
 * Função para debug na aplicação
 */
if(!function_exists('url')){
    function url($url = '/'){
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        return  $protocol . '://' . $_SERVER['HTTP_HOST'] . $url;
    }
}

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
    function view($view, $data = []){
        $resources = '../resources/views/' . $view . '.view.php';
        if(file_exists($resources)){
            include_once $resources;
        }else{
            echo "ERROR: View {$view} não encontrada";
        }
        
    }
}


if(!function_exists('data')){
    function data($dados, $menu = 'menu1', $header = 'header1'){
        $data['views']['menu'] = $menu;
        $data['css']['menu'] = 'menu';
        $data['views']['header'] =  $header;
        $data['css']['header'] = 'header';
        $data['views']['dados'] = $dados;
        $data['css']['dados'] = 'dados';

        return $data;
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
if(!function_exists('error_debug')){
    function error_debug($error, $message){
        if($error){
            die($message . " - File: {$error->getFile()} <br> - Linha: {$error->getLine()}");
        }else{
            die($message);
        }

    }
}

if(!function_exists('generate_code')){
    function generate_code(){
        $year = date('Y');
        $mounth = substr(date('M'), 0, 1);
        
        $code = $mounth . $year  . time();
        return $code;
    }
}



if(!function_exists('is_info')){
    function is_info($info){
        if(isset($info)){
            return $info;
        }
        return null;
    }
}