<?php

require_once __DIR__ . '/../vendor/autoload.php';

//Patron singlenton para una conexion global 
class Database {
    private static ?PDO $instance = null; //? La variable puede ser de tipo PDO o null, ? le dice a php que acepte que empiece en null y luego convertir a PDO 

    //Constructor 
    private function __construct() //Primer constructor para evitar que alguien haga new Database() fuera de la clase
    {
        
    }

    private function __clone() //Segundo constructor evitara una segunda conexion
    {

    }
    
    public static function getConnection(): PDO{
        if(self::$instance === null){
            $dotenv = Dotenv\Dotenv::createUnsafeMutable(__DIR__ .  '/..'); //Guarda una instancia configurada con la ruta del env 
            $dotenv->load(); //Abre el archivo y mete las variables en $_ENV
            $dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_CHARSET']);

            $dsn = "mysql:host=" . $_ENV['DB_HOST'] 
            . ";dbname=" . $_ENV['DB_NAME'] 
            . ";charset=" . $_ENV['DB_CHARSET']; // 
           

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            try {
                self::$instance = new PDO(
                    $dsn,
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS'] ?? '',
                    $options
                );
            }catch(PDOException $e){
                error_log("[" . date('Y-m-d H:i:s'). "] "
                . "[Database] "
                . $e->getMessage()
                . " en " . $e->getFile()
                . " linea " . $e->getLine()
                );

            }
        }
        return self::$instance;
    }


}