<?php

/**
 * Classe responsável pelo roteamento do sistema
 * Suporta passagem de parâmetros simples e dinâmicos
 * A lógica basea-se em URLs amigáveis
 * @author Bruno Moura
 */
namespace Varejo\Services;
class Route{
    /** Armazena um array contendo o método da requisição, rota e controller */
    private $input = [];

    /** Armazena os parâmetros dinâmicos com seus respectivos valores, se houver */
    private $params = [];

    /** Armazena a rota atual para verificação  */
    private $certifield_route = null;    

    /** Armazena ua URI atual */
    private $uri;

    /** Armazena uma instancia de class de controle */
    private $obj;

    /** Construto da classe RouteService */
    public function __construct(){

        /** @url http://php.net/manual/en/function.filter-input.php */
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
     * Executa as de rotas definidas
     */
    public function execute(){

        /** Verifica a existencia da rota de acordo com a URI */
        $this->verifyRoute();

        $this->finalize();
    }

    /**
     * Finaliza a execusão verificando a rota e chamando o controller
     * com o método requisitado
     */
    private function finalize(){

        /** Verifica se a rote é diferente de null, ou seja, a rota foi encontrada */
        if($this->certifield_route !== null){

            /**
             * Verifica se o método requisitado está de acrodo com a rota para carregar o controller
             * @url http://php.net/manual/en/function.array_key_exists.php
             */
            if(isset($this->input[$this->method()]) && array_key_exists($this->certifield_route, $this->input[$this->method()])){
                $this->loadController();
            }else{
                error_debug(null, "ERROR: Método de requisição <b>{$this->method()}</b> não permitido para esta rota!");
            }
        }else{
            return view('error/404');
        }
    }

    /** Carrega o controller baseado na rota encontrada */
    private function loadController(){  
        
        /** Armazena o segundo parâmetro informa no cadastro da rota no arquivo route.php */
        $control = $this->input[$this->method()][$this->certifield_route];

        /** Transforma a string em array separando Controller de método
         * @url http://php.net/manual/en/function.explode.php
         */
        $control = explode("@", $control);

        /** Para que possamos verificar o arquivo controller no projeto, precisamos definir o separador para
         * ser lido por qualquer S.O. Isso acontece quando adicionamos uma Chamada com namespace junto ao
         * segundo parâmetro do cadastro de rota ex.: Dashboard\Home. Apenas invertemos a barra \
         * @url http://php.net/manual/en/function.str_replace.php
         */
        $path_control = str_replace('\\', '/', $control[0]);

        /** Verificamos se o arquivo existe
         * @url http://php.net/manual/en/function.file_exists.php
         */
        if(file_exists(__DIR__ . _DS_ . '..' . _DS_ . 'Controller' . _DS_ . $path_control . ".php")){

            /** Montamos o namespace dinâmico e construimos o objeto */
            $namespace = "\\Varejo\\Controller\\" . $control[0];
            $this->obj = new $namespace;

            /** Agora vamos carregar o método correspondente */
            $this->loadMethod($control[1]);
        }else{
            error_debug(null, "ERROR: Controller <b>'{$control[0]}'</b> não existe" );
        }
    }
    /**
     * Executa o método do controller configurado
     */
    private function loadMethod($method){

        /** Verificamos se este método existe na classe instanciada
         * @url http://php.net/manual/en/function.method_exists.php
         */
        if(method_exists($this->obj, $method)){

            /** Caso haja parâmetros dinâmicos, passamos seus valores para o método do controller */
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

        /** Separamos o array por Método */
        foreach($this->input as $input){

            /** Separamos agora por rota cadastrada */
            foreach($input as $route => $controller){

                /** Transformamos nossa URI em um array array indexado */
                $param_uri = explode('/', $this->uri);
                unset($param_uri[0]);

                /** Transformamos nossa ROTA em um array array indexado */
                $param_route = explode('/', $route);
                unset($param_route[0]);

                /**-------------------------------------
                 * ----------------ATENÇÂO--------------
                 * 
                 * elimino o primeiro índice de ambos, pois 
                 * sempre retornarão uma string vazia
                 * */

                 /** Vericamos se a quantidade de índice de ambos arrays
                  * construídos são iguais.
                  * Desta forma otimizamos a aplicação, pois não há
                  * deperdício de processamento 
                  */
                if(count($param_uri) == count($param_route)){

                    /** Separamos nosso array URI em parâmetros */
                    foreach($param_uri as $num => $param){

                        /** Verifico se o índice atual do parâmetro da URI, existe no array de rota parametrizada */
                        if(isset($param_route[$num])){

                            /** Verifico se ambos parâmetros são iguais */
                            if($param_route[$num] === $param){

                                /** Se sim, armazeno minha rota autorizada
                                 * Porém esse valor pode mudar até o fim do loop
                                 */
                                $this->certifield_route = $route;
                                continue;
                            }else{
                                /** Sendo os parâmetros diferentes, suponha que seja um parâmetro dinâmico
                                 * e que qualquer valor equivale a ele.
                                 * Então verifico se o carater '{' existe nesse parâmetro
                                 * Ainda pode ser melhorado...
                                 */
                                if(strpos($param_route[$num], '{') !== false){

                                    /** Existindo, agora armazeno meu parametro dinâmico no atributo $this->param
                                     * para que possa ser passado como parâmetro para o controller. 
                                     * Mas antes, preciso eliminar as '{}' e indentificar o meu índice deste array
                                     * Depois amazenamos o valor no índice correspondente
                                     * @url http://php.net/manual/en/function.substr.php
                                     * @url http://php.net/manual/en/function.strlen.php
                                     */
                                    $key = substr($param_route[$num], 1, strlen($param_route[$num]) - 2);
                                    $this->params[$key] = $param;

                                    /** Como foi decidido que este é um parâmetro genérico (dinâmico), 
                                     * armazenamos a rota.
                                     * Podendo ainda sofrer alteração e ser anulada
                                     */
                                    $this->certifield_route = $route;
                                }else{

                                    /** Não encontrando '{' no corpo do parâmetro atual, então essa rota 
                                     * não é válida e pulamos para a próxima rota sem precisar ler o restante 
                                     * dos parametros dessa URI
                                     */
                                    $this->certifield_route = null;
                                    break;
                                }
                            }
                        }else{
                            
                            /** Caso o índice não exista, já descarto essa rota */
                            $this->certifield_route = null;
                            break;
                        }
                    }
                }

                /** Se até aqui foi persistente o armazenamento da rota, então a rota está autoriza, 
                 * saimos totalmente do loop, sem precisar verificar outras rotas
                 */
                if($this->certifield_route){
                    return true;
                }
            }
        }
        
        return false;
    }
}