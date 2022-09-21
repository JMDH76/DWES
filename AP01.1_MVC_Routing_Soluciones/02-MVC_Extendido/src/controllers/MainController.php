<?php
namespace App\Controllers;

use App\Core\DataBase;
use App\Models\Tareas;
use App\Views\ListadoTareas;

class MainController{

    /**
     *  Esta ruta que sale al iniciar la aplicación y que debe listar todos los registros de la BB.DD.
     */
    public function main(){ 
        //Creamos un objeto del modelo Tareas de la BB.DD.
        $tareas = new Tareas(new DataBase);
        //Listamos en un array todos los datos de las tareas con el método del modelo findAll
        $listTareas = new ListadoTareas($tareas->findAll());
    }

    /**
     * Mediante esta clase cargaremos un controlador que nos indica que la ruta no es correcta
     */
    public function default(){
        echo "La ruta que buscas no existe.\n";
    }
}