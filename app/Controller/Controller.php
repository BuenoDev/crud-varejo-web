<?php
/** Controle de rotas do ambiente  */

namespace Varejo\Controller;

class Controller{
    private $get;
    private $post;

    function __construct(){
        $this->get = filter_input_array(INPUT_GET, FILTER_DEFAULT);
        $this->post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    }

    public function build(){
        
    }

    
}