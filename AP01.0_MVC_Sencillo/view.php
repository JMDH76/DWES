<?php
    /*VISTA: Cargamos la plantilla y sustituimos los datos proporcionados 
    por "model" en ella recorriendo el array con un foreach*/
    
    $template = file_get_contents('templates/template.html');
    
    foreach ($diccionario as $clave => $valor) {
        $template = str_replace('{'.$clave.'}', $valor, $template); 
    };

    //Presentamos la plantilla
    echo $template;   
?>