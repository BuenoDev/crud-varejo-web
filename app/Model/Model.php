<?php
/** Modelo padrão para execução de tarefas no banco de dados */

namespace Varejo\Model;

abstract class Model{

    protected $table;
    private $model;
    
    public function query($query){
        
    }

    /**
     * Model insert registro no bnco dedados
     * 
     */
    public function insert($data){
        $insert = new \Varejo\Conn\Insert;
        if($insert->execute($this->table, $data)){
            return $insert->result();
        }
    }

    public function update(array $data, array $clauses){
        $update = new \Varejo\Conn\Update();
        $where = "WHERE";
        $clause = null;
        if($clauses){
            foreach($clauses as $clause){
                if(count($clauses[0]) > 1){
                    foreach($clauses as $clause){
                        $define = implode(' ', $clause);
                    }  
                }
            }





            if(count($clauses) == 1){
                $define = implode(' ', $clauses);    
            }else{
                foreach($clauses as $clause){
                    $define = implode(' ', $clause);
                }      
            }
            $clause = "{$where} {$define}";
        }
        
        $update->execute($this->table, $data, $clause, $query_string);
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