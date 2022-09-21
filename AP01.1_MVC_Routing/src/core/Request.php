<?php
namespace App\Core;

//Clase que nos da la ruta en la que se encuentra el navegador
class Request{

    private $route;
    private $params;

    //Constructor
    public function __construct(){
        //Lo primero que hacemos es confirmar que hemos recibido por GET un controller si no fuera así saldremos por la ruta por defecto.
        if(isset($_GET["ruta"])){
            $this->route = $_GET["ruta"];
           
            //Si la ruta lleva parámetros lo metemos en la vble, si no lo ponemos a null
            if(isset($_GET["params"])){
                $this -> params = explode(",", $_GET["params"]);
            } else {
                $this -> params = null;
            }

        //Si no se ha pasado ninguna ruta reconducimos a 'main' (por defecto).        
        } else {
            $this -> route = "main";
            $this -> params = null; 
        }
    }


    //Getters: devuelve ruta y parámetro del navegador
    public function getRoute(){
        return $this->route;
    }

    public function getParams(){
        return $this->params;
    }
}

?>
