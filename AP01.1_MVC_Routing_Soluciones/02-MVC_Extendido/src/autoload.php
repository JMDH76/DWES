<?php
//Nos devuelve la ruta de la carpeta del proyecto/src;
$rutaActual = dirname(__FILE__);
//Incluimos la ruta como parte de include_path, desde src.
set_include_path(get_include_path().PATH_SEPARATOR.$rutaActual);

function autoload(string $rutaclase){
    //Remplazamos App por "" y \ por /
    $rutaclase = str_replace(["App\\","\\"],["","/"],$rutaclase);
    //Le añadimos la extensión al archivo
    $rutaclase .= ".php";
    //Y la incluimos
    include_once $rutaclase;
}
//Registramos la función
spl_autoload_register("autoload");
?>