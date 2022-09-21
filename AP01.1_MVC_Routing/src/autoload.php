<?php
    //obtenemos la ruta de la carpeta /src
    $rutaActual = dirname(__FILE__);  
    //echo $rutaActual,  "<br>";
    
    //Incluimos la ruta como parte de include_path, desde src.
    set_include_path(get_include_path().PATH_SEPARATOR.$rutaActual); 
    
    function autoload(string $rutaclase){
        //Remplazamos App por "" y \ por /
        $rutaclase = str_replace(["App\\", "\\"],["", "/"],$rutaclase);
        
        $rutaclase .= ".php";   //añade al final del string
       
        include_once $rutaclase;
       //echo $rutaclase;
    }
    //Registramos la función
    spl_autoload_register("autoload");
?>

