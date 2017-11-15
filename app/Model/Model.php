<?php
/** Modelo padrão para execução de tarefas no banco de dados */

namespace Varejo\Model;

use Varejo\Services\Conn\Insert;
use Varejo\Services\Conn\Update;
use Varejo\Services\Conn\Select;
use Varejo\Services\Conn\Delete;

abstract class Model{

    private $insert;
    private $update;
    private $select;
    private $delete;
   
    /** Nome da tabela */
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
        return $this->insert->execute($this->table, $data);
        
    }

    /**
     * @param array $data - Dados de atualizações com seus respectivos campos e novos valores
     * @param array $clauses - Cláusula ou regra para atualização de registros
     */
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

    /**
     * Deletar registro de uma tabela pelo id
     * @param int $id
     */
    public function delete($id){

    }

    /**
     * Seleção de campos para leitura do SQL
     * @param $fields - campos da tabela
     */
    public function select(...$fields){
        return $this;
    }


    /** Métodos curtos e diretos */    
    public function all(){

    }

    /**
     * @param int $id
     */
    public function find($id){
        
    } 

    public function findByField($field, $operador, $value){

    } 

    public function orderBy($field, $order){
        
    } 

    public function get(){

    }
}