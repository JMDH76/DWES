<?php
namespace App\Core;

use App\Core\Request;
use App\Core\RouteCollection;

/**
 * Para que funciones el Dispacher debemos lanzar rutas con la forma: localhost:8000/?ruta=detalle&params=1 y para que tengamos más de un parametro usaremos la ,
 * localhost:8000/?ruta=detalle&params=1,3,56
 */
class Dispatcher{
    private $routeList;
    private Request $currentRequest;
    /**
     * Para poder crear un objeto Dispatcher debemos enviar las rutas de la aplicación y la ruta del navegador
     * para que el dispatcher pueda redirigir al lugar controller correcto con los parametros adecuados.
     */
    public function __construct(RouteCollection $routeCollection, Request $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->currentRequest = $request;
        $this->dispatch();
    }

    /**
     * Redirigimos la aplicación al controlador adecuado.
     */
    private function dispatch(){
        //Verificamos que la ruta que hemos recibido esta dentro de las rutas de la aplicación
        if(isset($this->routeList[$this->currentRequest->getRoute()])){
            $controllerClass = "App\\Controllers\\".$this->routeList[$this->currentRequest->getRoute()]["controller"];
            $controller = new $controllerClass;
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            //Comprobamos que se han enviado o no parametros por la ruta y lanzamos la acción del controller
            if(!is_null($this->currentRequest->getParams())){
                //Como visual Studio no sabe si los paramtros son o no un array da un fallo de iteración, pero realmente funciona adecuadamente
                $controller->$action(...$this->currentRequest->getParams());
            }else{
                $controller->$action();
            }
        }else{
            echo "La ruta no esta definda";
        }
    }
}
?>