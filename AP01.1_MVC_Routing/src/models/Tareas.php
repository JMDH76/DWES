<?php
namespace App\Models;

use App\Core\DataBase;

/* Modela una tarea de la BB.DD. que están dentro de la tabla Tarea */

class Tareas {

    //Obtiene la base de datos. Mete la base de datos en la vble.
    private DataBase $database; //Crea objeto DataBase para pasar consulta
    public function __construct (DataBase $database){
        $this->database = $database;
    }

    //Ejecuta la consulta en la tabla "tareas" pasando la instruccion a la función de la clase DataBase. 
    //Muestra toda la tabla
    public function findAll(){
        $sql = "SELECT * FROM tareas";
        return $this->database->executeSQL($sql);
    }

    //Consulta por id
    public function findById(){
        $sql = "SELECT * FROM tareas WHERE id=$id";
        $result = $this->database->executeSQL($sql);
        return array_shift($result);  //array_shift >> quita el primer elemento de un array. Eliminamos la columna "id"
    }
}
?>