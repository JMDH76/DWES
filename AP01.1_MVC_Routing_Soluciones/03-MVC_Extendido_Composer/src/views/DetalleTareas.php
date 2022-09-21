<?php

namespace App\Views;

/**
 * Nos devuelve únicamente el dato de una tarea
 */
class DetalleTareas
{
    public function __construct(array $row)
    {
        if (count($row)>0) {
            echo "<table border='1'>";
            echo "<tr><td>Id</td><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td><td></td></tr>";
            echo "<tr><td>" . $row["id"] .
                "<td>" . $row["titulo"] ."<td>" . $row["descripcion"] .
                "<td>" . $row["fecha_creacion"] .
                "<td>" . $row["fecha_vencimiento"] .
                "<td><a href='/'>volver</td></tr>";
            echo "</table>";
        } else {
            echo "0 results";
            echo "<p><a href='/'>volver</p>";
        }
    }
}
