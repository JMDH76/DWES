<?php

namespace App\Views;

/**
 * Lista todas las tareas en una tabla con los datos de la BB.DD.
 */
class ListadoTareas
{
  public function __construct($result)
  {
    if (count($result) > 0) {
      echo "<table border='1'>";
      echo "<tr><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td></tr>";
      foreach ($result as $row) {
        echo "<tr><td><a href='/detalle/".$row["id"]."'>" . $row["titulo"] .
          "</a><td>" . $row["descripcion"] . "</td><td>" . $row["fecha_creacion"] . "</td><td>" . $row["fecha_vencimiento"] . "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
  }
}