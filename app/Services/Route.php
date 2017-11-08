<?php

namespace Varejo\Services;

class Route{
    private $input = [];
    private $buildParams = [];
    private $uri;
    private $obj;


    /**
     * Construto da classe RouteService
     */
    public function __construct(){
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
    }

    /**
     * Define rota para métodos HTTP GET
     * @param $route - url
     * @param $controller - Controle e método a chamar Ex. 'Contato@show'
     */
    public function get($route, $controller){
        $this->input['GET'][$route] = $controller;
        return $this;
    }

    /**
     * Define rota para métodos HTTP POST
     * @param $route - url
     * @param $controller - Controle e método a chamar Ex. 'Contato@show'
     */
    public function post($route, $controller){
        $this->input['POST'][$route] = $controller;
        return $this;
    }

    /** 
     * Execução de rotas definidas
     */
    public function execute(){
        $this->verify();
    }

    /**
     * Verifica se a rota atual, existe no dicionário de rotas do sistema de acordo 
     * com o método requisitado
     */
    private function verify(){
        if($this->isRouteExists()){
            
            if(isset($this->input[$this->method()]) && array_key_exists($this->uri, $this->input[$this->method()])){
                $this->loadController();
            }else{
                error_debug(null, "ERROR: Método de requisição <b>{$this->method()}</b> não permitido para esta rota!");
            }
        }else{
            return view('error/404');
        }
    }

    /**
     * Carrega o controller definido por uma rota específica
     */
    private function loadController(){         
        $control = $this->input[$this->method()][$this->uri];
        $control = explode("@", $control);
        $path_control = str_replace('\\', '/', $control[0]);

        if(file_exists(__DIR__ . _DS_ . '..' . _DS_ . 'Controller' . _DS_ . $path_control . ".php")){
            $namespace = "\\Varejo\\Controller\\" . $control[0];
            $this->obj = new $namespace;
            $this->loadMethod($control[1]);
        }else{
            error_debug(null, "ERROR: Controller <b>'{$control[0]}'</b> não existe" );
        }
    }

    /**
     * Executa o método do controller chamado
     */
    private function loadMethod($method){
        if(method_exists($this->obj, $method)){
            $this->obj->{$method}();
        }else{
            error_debug(NULL, "ERROR: método <b>'{$method}'</b> não existe!<br>" );
        }
    }

    /**
     * Retorna o tipo do método requisitado (POST, GET etc)
     * @return string
     */
    private function method(){
        return filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    }

    /**
     * Veifica se há uma rota cadastrada no dicionário de rotas independente do
     * método de requisição
     * @return boolean
     */
    private function isRouteExists(){
        foreach($this->input as $input){
            $this->buildParams($input);
            if(array_key_exists($this->uri, $input)){
                return true;
            }
        }
        
        return false;
    }

    private function buildParams($input){
        $first = \strpos($input, "{");
        dd(array_keys($input));
    }
}