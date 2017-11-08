<?php

namespace Varejo\Services;

class Request{
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
            return $this->post[$post];
        }
        return $this->post;
    }

    public function all(){
        $arr_get = \filter_input_array(\INPUT_GET, \FILTER_DEFAULT);
        $arr_post = \filter_input_array(\INPUT_POST, \FILTER_DEFAULT);        
        return array_merge($arr_get, $arr_post);
    }
}