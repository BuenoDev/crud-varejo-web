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
   
    private $fields;
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


        if(count($clauses[0]) > 1){
            foreach($clauses as $clause){
                
            } 
        }else{
            $define = $clauses[0] . ' ' . $clauses[1] . ' :' . $clauses[0]; 
            $query_string = $clauses[0] . '=' . $clauses[2];
        }
        
        $clause = "{$where} {$define}";
        $this->update->execute($this->table, $data, $clause, $query_string);
    }

    /**
     * Deletar registro de uma tabela pelo id
     * @param int $id
     */
    public function delete($id){
        $this->delete = new Delete;
        $this->delete->execute($this->table, "WHERE id = :id", "id={$id}");
        return $this->delete->result();
    }

    /**
     * Seleção de campos para leitura do SQL
     * @param $fields - campos da tabela
     */
    public function select(... $selects){
        $this->select = new Select;
        $this->fields = $selects ? implode(', ', $selects) : '*';
        return $this;
    }


    /** Métodos curtos e diretos */    
    public function all(){
        $this->select->execute($this->table, $this->fields);
        return $this->select->result();
    }

    /**
     * @param int $id
     */
    public function find($id){
        $this->select->execute($this->table, $this->fields, "WHERE id = :id", "id={$id}");
        return $this->select->result();
    } 

    public function findByField($field, $operador, $value){
        $this->select->execute($this->table, $this->fields, "WHERE {$field} {$operador} :{$field}", "{$field}={$value}");
        return $this->select->result();
    }
    
}