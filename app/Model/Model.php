<?php
/** Modelo padrão para execução de tarefas no banco de dados */

namespace Varejo\Model;

abstract class Model{

    protected $table;
    private $model;
    
    public function query($query){
        
    }

    public function insert($data){
        $insert = new \Varejo\Conn\Insert;
        if($insert->execute($this->table, $data)){
            return $insert->result();
        }
    }

    public function update($data, $clause){
        
    }

    public function delete($id){
        
    }

    public function select($fields){
        return $this;
    }


    /** Métodos curtos e diretos */    
    public function all(){

    }

    public function find($id){
        
    } 

    public function findByField($field, $operador, $value){

    } 

    public function orderBy($field, $order){
        
    } 

    public function get(){

    }
}