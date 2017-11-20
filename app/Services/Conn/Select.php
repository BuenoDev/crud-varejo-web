<?php
/** Conexão com banco de dados usando padrão SingleTon */
namespace Varejo\Services\Conn;

class Select extends Conn{
    private $table;
    private $data;
    private $result;
    private $query;
    private $select;
    private $fields;    
    private $parse_string;
    private $conn;


    /**
     * @param string $table             'tabela' 
     * @param string $clause            "WHERE id = :id AND login = :login"
     * @param string $parse_string      "id=1&login='sdfsdf'"
     */
    public function execute($table, $fields = '*', $clause = null, $parse_string = null){
        $this->table = (string) $table;
        $this->fields = (string) $fields;
        $this->clause = (string) $clause;
        if(!empty($parse_string)){
            parse_str($parse_string, $this->parse_string);
        }

        $this->finalize();
    }

    public function result(){
        return $this->result;
    }

    private function prepareQuery(){
        $this->query = "SELECT {$this->fields} FROM {$this->table} {$this->clause}";
        $this->conn = parent::getConn();
        $this->select = $this->conn->prepare($this->query);
        $this->select->setFetchMode(\PDO::FETCH_ASSOC);
    }

    private function buildQuery(){
        if($this->parse_string){
            foreach($this->parse_string as $key => $value){
                if(strtoupper($key) == 'LIMIT' || strtoupper($key) == 'OFFSET'){
                    $value = (int) $value;
                }
                $this->select->bindValue(":{$key}", $value, (is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR));
            }
        }
    }


    public function finalize(){
        $this->prepareQuery();
        try {
            $this->buildQuery();
            $this->select->execute();
            $this->result = $this->select->fetchAll();
        } catch (\PDOException $e) {
            $this->result = NULL;
            error_debug($e, "Erro ao ler conteudo");
        }
    }

}