<?php
/** Atualização de registros no banco de dados */
namespace Varejo\Services\Conn;

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
    public function execute($table, array $data, $clause, $parce_string){
        $this->table = (string) $table;
        $this->data = $data;
        $this->clause = (string) $clause;
        parse_str($parce_string, $this->parce_string);

        $this->buildQuery();
        $this->finalize();
    }

    /**
     * Retorna o resultada da uatualização de registro no banco de dados
     * @return boolean
     */
    public function result(){
        return $this->result;
    }

    /**
     * Retorn o quantidades de registros atualizados no banco
     * @return int
     */
    public function countUpdated(){
        return $this->query->rowCount();
    }

    /**
     * Contrução da query SQL seguindo o padrão PDO Statements
     */
    public function buildQuery(){
        $data = [];
        foreach($this->data as $key => $value){
            $data[] = $key . ' = :' . $key;
        }
        $set = implode(', ', $data);

        /** Construção da Query segundo o padrão PDO Statements */
        $this->query = "UPDATE {$this->table} SET {$set} {$this->clause}";
    }

    /**
     * Prepara a query para receber os valores dos dados
     */
    public function prepareQuery(){
        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->query);
    }

    /**
     * Finaliza a atualização executando a query no banco de dados
     */
    public function finalize(){
        $this->prepareQuery();
        try{
            /** Unimos os 2 arrays para que PDO possa trocar as variáveis correspondentes por valores respectivos */
            $this->query->execute(array_merge($this->data, $this->parce_string));

            $this->result = true;
        } catch (\PDOException $e){
            error_debug($e, "Atualização de dado não realizada");
            $this->result = null;
        }
    }
}