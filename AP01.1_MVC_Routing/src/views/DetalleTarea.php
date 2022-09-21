<?php
namespace App\Views;

//Nos devuelve únicamente el dato de una tarea
class DetalleTarea{

    //Forzamos typeando la variable de entrada sea de tipo array para garantizar que no de un error.
    public function __construct(array $row){
       
        //Como solo debe contener una linea no hacemos foreach sino que obtenemos los datos del array
        if(count($row)>0){
            echo "<table border='1'>";
            echo "<tr><td>Id</td><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td><td></td></tr>";
            echo "<tr><td>" . $row["id"] .
                "<td>" . $row["titulo"] .
                "<td>" . $row["descripcion"] .
                "<td>" . $row["fecha_creacion"] . 
                "<td>" . $row["fecha_vencimiento"] .
                "<td><a href='/?ruta=main'>Volver</td></tr>";
            echo "</table>";
        } else {
            echo "0 results";
            echo "<p><a href='/?ruta=main'>volver</p>";
        }
    }
}
?>