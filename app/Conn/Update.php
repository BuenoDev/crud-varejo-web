<?php
/** Conexão com banco de dados usando padrão SingleTon */
namespace Varejo\Conn;

class Update extends Conn{
    private $table;
    private $data;
    private $clause;
    private $parce_string;

    /** @object Conn */
    private $conn;

    /**
     * Iniciamos uma atuaização de registro no banco de dados de acordo com a tabela
     */
    public function execute($table, array $data, $clause, $parce_string = null){
        $this->table = $table;
        $this->data = $data;
        $this->clause = $clause;
    }
}