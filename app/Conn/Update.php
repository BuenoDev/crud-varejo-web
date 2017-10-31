<?php
/** Atualização de registros no banco de dados */
namespace Varejo\Conn;

class Update extends Conn{
    private $table;
    private $data;
    private $clause;
    private $parce_string;
    private $result;

    private $query;

    /** @object Conn */
    private $conn;

    /**
     * Iniciamos uma atuaização de registro no banco de dados de acordo com a tabela
     */
    public function execute($table, array $data, $clause = null, $parce_string = null){
        $this->table = (string) $table;
        $this->data = $data;
        $this->clause = (string) $clause;

        $this->buildQwuery();
    }

    public function result(){
        return $this->result;
    }

    public function countUpdated(){

    }
    public function buildQwuery(){
        $data = [];
        foreach($this->data as $key => $value){
            $data[] = $key . ' = ' . $value;
        }
        $set = implde(', ', $data);

        dd($set);
        /** UPDATE table_name SET col1 = val1, col2 = val2 WHERE field = value */

    }

    public function prepareQuery(){

    }

    public function finalize(){

    }
}