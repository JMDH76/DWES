<?php
    namespace App\Core;

    //Esta clase obtiene las rutas por defecto del fichero rutas.json
    class RouteCollection{

        //Creamos variable donde introducimos las resourcebundle_get_error_message
        private $routes;  

        //Importa y transforma el json y lo mete en la variable
        function __construct(){
            $this-> routes = json_decode(file_get_contents(__DIR__."/../../config/rutas.json"), true);
        }

        //Función pública que nos devuelve el listado de rutas cuando es invocado
        public function getRoutes(){
            return $this->routes;
        }
    }
?>