<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

abstract class Controller{
    private $get;
    private $post;

    function __construct(){
        $this->get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
        $this->post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    }

    public function get($get = null){
        if($get){
            return $this->get[$get];
        }
        return $this->get;
    }
    
    public function post($post = null){
        if($post){
            return $this->get[$post];
        }
        return $this->post;
    }

    abstract public function show();
}