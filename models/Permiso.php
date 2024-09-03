<?php

namespace Model;

class Permiso extends ActiveRecord
{
    protected static $tabla = 'permisos';
    protected static $idTabla = 'permiso_id';
    protected static $columnasDB = ['permiso_rol', 'permiso_tipo', 'permiso_situacion'];

    public $permiso_id;
    public $permiso_rol;
    public $permiso_tipo;
    public $permiso_situacion;


    public function __construct($args = [])
    {
        $this->permiso_id = $args['permiso_id'] ?? null;
        $this->permiso_rol = $args['permiso_rol'] ?? '';
        $this->permiso_tipo = $args['permiso_tipo'] ?? '';
        $this->permiso_situacion = $args['permiso_situacion'] ?? 1;
    }
}
