<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $idTabla = 'usu_id';
    protected static $columnasDB = ['usu_nombre', 'usu_catalogo', 'usu_password', 'usu_rol_id', 'usu_dep_id', 'usu_situacion'];

    public $usu_id;
    public $usu_nombre;
    public $usu_catalogo;
    public $usu_password;
    public $usu_rol_id;
    public $usu_dep_id;
    public $usu_situacion;


    public function __construct($args = [])
    {
        $this->usu_id = $args['usu_id'] ?? null;
        $this->usu_nombre = $args['usu_nombre'] ?? '';
        $this->usu_catalogo = $args['usu_catalogo'] ?? '';
        $this->usu_password = $args['usu_password'] ?? '';
        $this->usu_rol_id = $args['usu_rol_id'] ?? '';
        $this->usu_dep_id = $args['usu_dep_id'] ?? '';
        $this->usu_situacion = $args['usu_situacion'] ?? 1;
    }

    public function validarUsuarioExistente(): bool
    {
        $sql = "SELECT * FROM usuarios where usu_catalogo = $this->usu_catalogo";
        $resultado = static::fetchArray($sql);
        return $resultado ? true : false;
    }

    // public function getUsuarioExistente(): array
    // {
    //     $sql = "SELECT usu_id, usu_nombre, usu_password, usu_catalogo, usu_rol_id, usu_dep_id from permisos inner join usuarios on permiso_usuario = usu_id inner join rol on rol_id = permiso_rol inner join aplicacion on rol_app = app_id where usu_catalogo = $this->usu_catalogo";
    //     $resultado = static::fetchFirst($sql);
    //     return $resultado;
    // }
}
