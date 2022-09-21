<?php
namespace App\Core;

/**
 * Clase que se encarga de darnos la ruta en la que estamos en el navegador
 */
class Request{
    private $route;
    private $params;

    public function __construct()
    {
        /**
         * Lo primero que hacemos es confirmar que hemos recibido por GET un controller
         * si no fuera así saldremos por la ruta por defecto.
         */
        if(isset($_GET["ruta"])){
            $this->route = $_GET["ruta"];
            if(isset($_GET["params"])){
                //En este caso estamos usando las , como separador de los parametros.
                $this->params = explode(",",$_GET["params"]);

            }else{
                $this->params = null;
            }
        }else{
            $this->route = "main";
            $this->params = null;
        }
        
    }

    /**
     * Get the value of route
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the value of parms
     */
    public function getParams()
    {
        return $this->params;
    }
}
?>