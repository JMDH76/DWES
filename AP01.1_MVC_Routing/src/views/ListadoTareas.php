<?php

namespace App\Views;

//muestra toda la tabla de "tareas" de la base de datos
class ListadoTareas{
    
    public function __construct($result){
       
        if(count($result)>0){       //Si la variable que nos pasan tiene algún elemento... Formatea la tabla y pone titulos
            echo "<table border='2'>";
            echo "<tr><td>Título</td><td>Descripción</td><td>Fecha de creación</td><td>Fecha de vencimiento</td></tr>";
           
            foreach ($result as $row){
                echo "<tr><td><a href='/?ruta=detalle&params=" . $row["id"] . "'>" . $row["titulo"] . 
                "</a><td>" . $row["descripcion"] . "</td><td>" . $row["fecha_creacion"]. "</td><td>" . $row["fecha_vencimiento"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 resultados";
        }
    }
}

?>