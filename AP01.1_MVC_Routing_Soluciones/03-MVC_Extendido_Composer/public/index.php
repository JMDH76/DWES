<?php
require_once "../vendor/autoload.php";

use App\Core\Dispatcher;
use App\Core\RouteCollection;
use App\Core\Request;

//Creamos un objeto que contenga todas las rutas de la aplicación.
$routes = new RouteCollection();
//Creamos un objeto que contenga la ruta que hemos recibido desde el navegador.
$request = new Request();
//Ahora creamos un objeto que se encarga de redirigir al controller que corresponda la aplicación
$dispacher = new Dispatcher($routes,$request);