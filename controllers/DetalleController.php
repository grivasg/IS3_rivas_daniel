<?php

namespace Controllers;

use Exception;
use Model\Operaciones; 
use MVC\Router; 

class DetalleController {

    public static function estadisticas(Router $router){
        $router->render('operaciones/estadisticas');
    }

    public static function detalleOperacionesAPI()
    {
        try {
            $sql = "SELECT dep_id AS dependencia_id,
                    dep_nombre AS dependencia_nombre,
                    COUNT(ope_id) AS total_operaciones
                    FROM Dependencias d
                    LEFT JOIN Operaciones o ON dep_id = ope_dep_id
                    GROUP BY dep_id, dep_nombre
                    ORDER BY total_operaciones DESC";


            $datos = Operaciones::fetchArray($sql);
            echo json_encode($datos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error', 
                'codigo' => 0
            ]);
        }
    }
}
