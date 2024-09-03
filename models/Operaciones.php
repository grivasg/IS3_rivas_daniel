<?php

namespace Model;

class Operaciones extends ActiveRecord
{
    protected static $tabla = 'operaciones';
    protected static $idTabla = 'ope_id';
    protected static $columnasDB = ['ope_fecha', 'ope_origen', 'ope_destino', 'ope_estado', 'ope_dep_id' ];

    public $ope_id;
    public $ope_fecha;
    public $ope_origen;
    public $ope_destino;
    public $ope_estado;
    public $ope_dep_id;


    public function __construct($args = [])
    {
        $this->ope_id = $args['ope_id'] ?? null;
        $this->ope_fecha = $args['ope_fecha'] ?? '';
        $this->ope_origen = $args['ope_origen'] ?? '';
        $this->ope_destino = $args['ope_destino'] ?? '';
        $this->ope_estado = $args['ope_estado'] ?? '';
        $this->ope_dep_id = $args['ope_dep_id'] ?? '';
    }
}
