<?php
namespace App\Controllers;

use App\Core\DataBase;
use App\Models\Tareas;
use App\Views\DetalleTarea;

class DetalleController{

    /**
     * Mostraremos la totalidad de los datos de una determinada tarea a partir de su id.
     */
    public function detalleTarea($id = null){
        
        //if(!isset($id)){
        if(is_null($id)){
            //No recibe id por lo tanto no podemos mostrar los datos de una tarea solamente
            $view = new DetalleTarea(array());
        }else{
            //Recibe la id
            $tarea = new Tareas(new DataBase);
            $view = new DetalleTarea($tarea->findById($id));
        }
        
    }

}