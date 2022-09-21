<?php
namespace App\Core;

use App\Core\Interfaces\IRequest;
use App\Core\Interfaces\IRoute;

/**
 * Para que funciones el Dispacher debemos lanzar rutas con la forma: localhost:8000/?ruta=detalle&params=1 y para que tengamos más de un parametro usaremos la ,
 * localhost:8000/detalle/1
 */
class Dispatcher{
    private $routeList;
    private IRequest $currentRequest;
    /**
     * Para poder crear un objeto Dispatcher debemos enviar las rutas de la aplicación y la ruta del navegador
     * para que el dispatcher pueda redirigir al lugar controller correcto con los parametros adecuados.
     */
    public function __construct(IRoute $routeCollection, IRequest $request)
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
            //Creamos un nuevo controlador mediante el contenido del nombre del controlador en la variable
            $controller = new $controllerClass;
            $action = $this->routeList[$this->currentRequest->getRoute()]["action"];
            //lanzamos la acción que vamos a realizar del controlador pertinene
            $controller->$action(...$this->currentRequest->getParams());
        }else{
            echo "La ruta no esta definda";
        }
    }
}
?>