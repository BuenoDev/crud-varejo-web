<?php

if(!function_exists('dd')){
    function dd(...$args){
        echo "<pre>";
            var_dump($args);
        echo "</pre>";
    }
}

if(!function_exists('view')){
    function view($view, array $vars = []){
        $resources = '../resources/views/' . $view . '.view.php';
        if(file_exists($resources)){
            return file_get_contents($resources);
        }
        return "ERROR: View {$view} não encontrada";
    }
}