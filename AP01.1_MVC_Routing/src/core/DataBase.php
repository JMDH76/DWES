<?php
namespace App\Core;

//Esta clase gestiona la conexion y la gestión de los datos desde la BDD externa.

class DataBase{
    private $dbConfig;
    private $conn;

    //El constructor carga los datos del fichero json de config y lanza la conexion
    public function __construct(){
        $this -> dbConfig = json_decode( file_get_contents(__DIR__."/../../config/dbConfig.json"), true); 
        $this -> connect();
    }

    //Asignamos los datos del fichero a las variables para crear la conexión
    private function connect(){
        $servername = $this -> dbConfig["server"];
        $username = $this -> dbConfig["user"];
        $password = $this -> dbConfig["password"];
        $dbname = $this -> dbConfig["dbname"];

        //Creamos la conexión
        $this -> conn = new \mysqli($servername, $username, $password, $dbname);
    }

    //Ejecuta cualquier sentencia SQL que le pasemos
    public function executeSQL($sql){
        return $this -> conn -> query($sql) -> fetch_all(MYSQLI_ASSOC);
    }

    //Se asegura que la conexión se cierra para no consumir recursos
    public function __destruct(){
        if($this -> conn != null) $this -> conn -> close();
    }
}
?>