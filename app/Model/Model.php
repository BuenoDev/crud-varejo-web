<?php
/** Modelo padrão para execução de tarefas no banco de dados */

namespace Varejo\Model;

use Varejo\Conn\Insert;
use Varejo\Conn\Update;
use Varejo\Conn\Select;
use Varejo\Conn\Delete;

abstract class Model{

    private $insert;
    private $update;
    private $select;
    private $delete;
    
    protected $table;
    private $model;
    
    
    public function query($query){
        
    }

    /**
     * Model insert registro no bnco dedados
     * 
     */
    public function insert($data){
        $this->insert = new Insert;
        if($this->insert->execute($this->table, $data)){
            return $insert->result();
        }
    }

    public function update(array $data, array $clauses){
        $this->update = new Update;
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
        
        $this->update->execute($this->table, $data, $clause, $query_string);
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