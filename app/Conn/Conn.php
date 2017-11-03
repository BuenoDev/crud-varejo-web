<?php
/** Conexão com banco de dados usando padrão SingleTon */
namespace Varejo\Conn;

abstract class Conn{
    private static $conection = null;
    
    /**
     * Executa a inicialização da conexão com o banco de dados
     */
    public static function Conn(){
        require __DIR__ . '\..\..\config.php';
        try{
            if(self::$conection == null){ // Verifica se já há conexão ativa

                // string padrão de opções para conexão com mysql
                $dsn = "mysql:host=" . $connection['host'] . ";port=" . $connection['port'] . ";dbname=" . $connection['dbsa'];

                // definição de opção de tipo de caracter inserido no banco de dados
                $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']; 

                // Armazena no atributo uma instancia PDO de conexão
                self::$conection = new \PDO($dsn, $connection['user'], $connection['pass'], $options);
            }
        } catch (\PDOException $e){
            // Caso haja falha na conxão, exibe o erro.
            die("ERROR: " . $e->getMessage() . " - " . $e->getCode());
        }

        // Atribuimos a conexão, o retorno de erros com exception em caso de falha ao executar uma query 
        self::$conection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return self::$conection;
    }

    /** Retorna um objeto singleTon Pattern */
    public static function getConn(){
        return self::Conn();
    }
}