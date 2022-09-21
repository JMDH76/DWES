<?php
namespace App\Core;

//para poder acceder a las clases y funciones
use App\Core\Request;           //ruta del navegador
use App\Core\RouteCollection;   //rutas de lña aplicación

class Dispatcher{

    private $routeList;
    private Request $currentRequest;

    /* Para poder crear un objeto Dispatcher debemos enviar las rutas de la aplicación y la ruta del navegador
    para que el dispatcher pueda redirigir al lugar controller correcto con los parametros adecuados.  */
    public function __construct(RouteCollection $routeCollection, Request $request){
        $this->routeList = $routeCollection->getRoutes(); //llama a la funcion de la clase RouteCollections para obtener la lista
        $this->currentRequest = $request;
        $this->dispatch();  //llama a la función
    }

    //redirige la funcion al controlador adecuado
    private function dispatch(){
        
        //Verificamos que la ruta que hemos recibido esta dentro de las rutas de la aplicación
        if(isset($this->routeList[$this -> currentRequest -> getRoute()])){     //Si valor obtenido con getRoute() está en la lista...
            $controllerClass = "App\\Controllers\\".$this->routeList[$this->currentRequest->getRoute()]["controller"];
            $controller = new $controllerClass;
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];

            //Si no es nula (e.d. hay parámetros en la dirección), le da a vble action el valor del .json
            if(!is_null($this->currentRequest->getParams())){
                $controller->$action(...$this->currentRequest->getParams());
            } else {
                $controller->$action();
            }
        } else {
            echo "La ruta no está definida";
        }
    }     
}
?>