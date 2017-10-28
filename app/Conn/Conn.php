<?php
/** Conexão com banco de dados usando padrão SingleTon */
namespace Varejo\Conn;

abstract class Conn{
    private static $host = "localhost";
    private static $port = "3307";    
    private static $dbsa = "varejo_web";
    private static $user = "root";
    private static $pass = "";

    private static $conection = null;
    
    /**
     * Executa a inicialização da conexão com o banco de dados
     */
    public static function Conn(){
        try{
            if(self::$conection == null){ // Verifica se já há conexão ativa

                // string padrão de opções para conexão com mysql
                $dsn = "mysql:host=" . self::$host . ";port=" . self::$port . ";dbname=" . self::$dbsa;

                // definição de opção de tipo de caracter inserido no banco de dados
                $options = [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8']; 

                // Armazena no atributo uma instancia PDO de conexão
                self::$conection = new \PDO($dsn, self::$user, self::$pass, $options);
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