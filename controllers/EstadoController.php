<?php

namespace Controllers;

use MVC\Router; 

class EstadoController {

    public static function index(Router $router){
        $router->render('estado/index', []);
    }
}