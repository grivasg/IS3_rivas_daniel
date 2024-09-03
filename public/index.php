<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\DetalleController;
use Controllers\MapaController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//operaciones
$router->get('/operaciones/estadisticas', [DetalleController::class,'estadisticas']);
$router->get('/API/detalle/estadistica', [DetalleController::class,'detalleOperacionesAPI']);


//MAPA
$router->get('/mapa', [MapaController::class,'index']);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
