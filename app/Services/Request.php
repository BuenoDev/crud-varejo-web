<?php

namespace Varejo\Services;

class Request{
    private $get;
    private $post;
    private $all = [];

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
         $merge = array_merge($this->get, $this->post);
         foreach($merge as $key => $value){
            $this->all[$key] = $value;
         }

         return $this->all;
    }

    public function __get($attribute){
        return $this->all[$attribute];
    }

    public function __set($attribute, $value){
        $this->all[$attribute] = $value;
    }

    public function __isset($attribute){
        return isset($this->all[$attribute]);
    }
}