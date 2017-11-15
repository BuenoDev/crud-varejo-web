<?php
/**
 * Classe responsável por deletar genéricamente informações no banco de dados
 * @author Bruno Moura <contato@brunosite.com>
 */

namespace Varejo\Services\Conn;

class Delete extends Conn {

    private $table;
    private $clause;
    private $parse_string;
    private $result;

    private $query;

    private $conn;

    public function execute($table, $clause, $parse_string) {
        $this->table = (string) $table;
        $this->clause = (string) $clause;

        parse_str($parse_string, $this->parse_string);

        $this->buildQuery();
        $this->finalize();
        
    }

    public function result() {
        return $this->result;
    }

    public function count() {
        return $this->query->rowCount();
    }

    private function buildQuery() {
        $this->query = "DELETE FROM {$this->table} {$this->clause}";

        $this->conn = parent::getConn();
        $this->query = $this->conn->prepare($this->query);
    }

    private function finalize() {
        $this->buildQuery();
        try {
            $this->query->execute($this->parse_string);
            $this->result = true;
        } catch (PDOException $e) {
            $this->result = NULL;
            error_debug($e, '<b>Erro ao Deletar conteúdo: </b>');
            die;
        }
    }

}
