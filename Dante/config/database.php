<?php
// CONEXION A BASE DE DATOS CON PDO, MAS SEGURO Y VERSATL A DIFERENCIA DE MYSQLI
define('DB_HOST', '');
define('DB_NAME', '');
define('DB_USER', '');
define('DB_PASS', '');
define('DB_CHAR', 'utf8mb4');


//data source name 
$dsn = "mysql_host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHAR;

// OPciones de pdo
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //Lanza excepciones automaticamente cuando ocurre un error en la bd
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //DEVOLVER CADA FILA DE LA BD COMO ARRAY ASOCIATIVO, UTILIZANDO LOS NOMBRES DE LAS COLUMNAS COMO CLAVES
    PDO::ATTR_EMULATE_PREPARES => false  //Para usar sentencias preparadas 
 
];
// Conexion 
try{
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    echo "Conexion exitosa";
}catch(PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
};

