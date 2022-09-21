<?php
namespace App\Controllers;

use App\Core\DataBase;
use App\Models\Tareas;
use App\Views\ListadoTareas;

class MainController{

    public function main(){
        //Creamos un objeto del modelo Tareas de la BB.DD.
        $tareas = new Tareas(new DataBase);

        //Listamos en un array todos los datos de las tareas con el método del modelo findAll
        $listTareas = new ListadoTareas ($tareas->findAll());
    }

    public function default(){
        echo "la ruta no existe.\n";
    }
}

?>