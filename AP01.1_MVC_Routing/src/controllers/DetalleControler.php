<?php
namespace App\Controllers;

use App\Core\DataBase;
use App\Models\Tareas;
use App\Views\DetalleTarea;

class DetalleController{

    public function detalleTarea($id = null){
        if (is_null ($id)){
            $view = DetalelTarea(array());
        } else {
            $tarea = new Tareas (new DataBase);
            $view = new DatalleTarea ($tarea->findById($id));
        }
    }
}

?>