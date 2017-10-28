<?php
/** 
 * Controlando inserção de registros no banco de dados com tatamento das queryies
 */
namespace Varejo\Conn;

class Insert extends Conn{
    private $table;
    private $data;
    private $result;
    private $query;

    private $insert;
    
    /** @object Conn */
    private $conn;

    /**
     * Iniciamos uma inserção de registro no banco de dados de acordo com a tabela
     * @param $table string - nome da tabela
     * @param $data array - array de dados a serem inseridos ['coluna' => 'valor']
     */
    public function execute($table, array $data){
        $this->table = (string) $table;
        $this->data = $data;
    }

    /**
     * Retorna o resultado Inserção de registro com o último id cadastrado
     */
    public function result(){
        return $this->result;
    }


    /**
     * Criamos a query a partir do array $data passado como parâmetro
     */
    private function buildQuery(){
        // Transforma as chaves do array em campos separados por ","
        $fields = implode(", ", array_keys($this->data));

        // Trasnforma as chaves do array em variáveis a receberem os valores dos respectivos campos separdos por ", :"
        // ":" antes da variável definida é um padrão anti injection estabelecido pelo PDO.
        $values = ':' . implode(", :", array_keys($this->data));

        $this->query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$values})";
    }

    /**
     * A query é preparada para ser inserida
     */
    private function prepareQuery(){
        $this->conn = parent::getConn();
        $this->insert = $this->conn->prepare($this->query);
    }

    /**
     * Aqui finaliza a consulta e armazena o resultado no atributo $result
     */
    private function finalize(){
        // Chama o método de preparação
        $this->prepareQuery();
        try{
            // PDO faz o trabalho de distribuir os valores do array para as variáveis definidas na query utilizando ":"
            // Tais variaveis, possuem o mesmo nome da chave do array, então a disperção é perfeita.
            $this->insert->execute($this->data);

            // Inserimos como resultado, o id do registro cadastrado.
            $this->result = $this->conn->lastInsertId();

        } catch(\PDOException $e){
            $this->result = null;
            echo "ERROR: " . $e->getMessage . " - " . $e->getCode;
        }
    }
}