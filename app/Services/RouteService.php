<?php

namespace Varejo\Services;

class RouteService{
    private $route = [];
    private $controller = [];
    private $input = [];
    private $uri;
    private $obj;

    public function __construct(){
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
    }

    public function get($route, $controller){
        $this->route[] = (string) $route;
        $this->controller[] = (string) $controller;
        $this->input = [$route => $controller];
    }

    public function execute(){
        $this->verify();
    }

    private function verify(){
        if(in_array($this->uri, $this->route)){
            $this->loadController();
        }else{
            die("Rota nã definida!");
        }
    }

    private function loadController(){
        $control = $this->input[$this->uri];
        $control = explode("@", $control);
        if(file_exists(__DIR__ . '\..\Controller\\' . $control[0] . ".php")){
            $namespace = "\\Varejo\\Controller\\" . $control[0];
            $this->obj = new $namespace;
            $this->loadMethod($control[1]);
        }else{
            error_debug(null, "ERROR: Controller <b>'{$control[0]}'</b> não existe" );
        }
    }

    private function loadMethod($method){
        if(method_exists($this->obj, $method)){
            $this->obj->{$method}();
        }else{
            error_debug(NULL, "ERROR: método <b>'{$method}'</b> não existe!<br>" );
        }
    }
}