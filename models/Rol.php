<?php

namespace Model;

class Rol extends ActiveRecord
{
    protected static $tabla = 'roles';
    protected static $idTabla = 'rol_id';
    protected static $columnasDB = ['rol_id', 'rol_nombre', 'rol_descripcion', 'rol_situacion'];

    public $rol_id;
    public $rol_nombre;
    public $rol_descripcion;
    public $rol_situacion;


    public function __construct($args = [])
    {
        $this->rol_id = $args['rol_id'] ?? null;
        $this->rol_nombre = $args['rol_nombre'] ?? '';
        $this->rol_descripcion = $args['rol_descripcion'] ?? '';
        $this->rol_situacion = $args['rol_situacion'] ?? 1;
    }

    public static function obtenerRolconQuery()
    {
        $sql = "SELECT * FROM roles where rol_situacion = 1";
        return self::fetchArray($sql);
    }
}
