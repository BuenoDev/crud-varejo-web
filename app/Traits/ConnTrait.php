<?php
/** Conexão com banco de dados usando padrão SingleTon */
namespace Varejo\Traits;

trait ConnTrait{

    protected $table;
    private $query;

    public function query($query){
        
    }

    public function insert(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function select(){
        
    }


    /** Métodos curtos e diretos */    
    public function all(){

    }

    public function find($id){
        
    } 

    public function findField($field, $operador, $value){

    } 

    public function orderBy($field, $order){
        
    } 

    public function get(){

    }
 
}