<?php
namespace Varejo\Services;
class Route{
    private $input = [];
    private $params = [];
    private $certifield_route = null;    
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
        $this->verifyRoute();
        $this->finalize();
    }
    /**
     * Verifica se a rota atual, existe no dicionário de rotas do sistema de acordo 
     * com o método requisitado
     */
    private function finalize(){
        if($this->certifield_route){
            if(isset($this->input[$this->method()]) && array_key_exists($this->certifield_route, $this->input[$this->method()])){
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
        $control = $this->input[$this->method()][$this->certifield_route];
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
            ($this->params ? $this->obj->{$method}($this->params) : $this->obj->{$method}());
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
    private function verifyRoute(){
        foreach($this->input as $input){

            foreach($input as $route => $controller){
                $param_uri = explode('/', $this->uri);
                unset($param_uri[0]);

                $param_route = explode('/', $route);
                unset($param_route[0]);
                if(count($param_uri) == count($param_route)){
                    foreach($param_uri as $num => $param){
                        if(isset($param_route[$num])){
                            if($param_route[$num] === $param){
                                $this->certifield_route = $route;
                                continue;
                            }else{
                                if(strpos($param_route[$num], '{') !== false){
                                    $key = substr($param_route[$num], 1, strlen($param_route[$num]) - 2);
                                    $this->params[$key] = $param;
                                    $this->certifield_route = $route;
                                }else{
                                    $this->certifield_route = null;
                                    break;
                                }
                            }
                        }else{
                            $this->certifield_route = null;
                            break;
                        }
                    }
                }
                if($this->certifield_route){
                    return true;
                }
            }
        }
        
        return false;
    }
}