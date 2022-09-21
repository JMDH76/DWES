<?php

namespace App\Controllers;

use App\Core\DataBase;
use App\Models\Tareas;
use App\Views\DetalleTareas;

class DetalleController
{
    /**
     * Mostraremos la totalidad de los datos de una determinada tarea a partir de su id.
     */
    public function detalleTarea($id = null)
    {
        if (is_null($id)||strcmp("", $id)==0) {
            //No recibe id por lo tanto no podemos mostrar los datos de una tarea solamente
            $view = new DetalleTareas(array());
        } else {
            $tarea = new Tareas(new DataBase());
            $view = new DetalleTareas($tarea->findById($id));
        }
    }
}
