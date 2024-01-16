<?php
require_once 'Conectar.php';

class MovimientoDinero
{
    private $fecha;
    private $idalmacen;
    private $idmovimiento;
    private $ingresa;
    private $retira;
    private $motivo;
    private $idusuario;
    private $conectar;

    /**
     * MovimientoDinero constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdalmacen()
    {
        return $this->idalmacen;
    }

    /**
     * @param mixed $idalmacen
     */
    public function setIdalmacen($idalmacen): void
    {
        $this->idalmacen = $idalmacen;
    }

    /**
     * @return mixed
     */
    public function getIdmovimiento()
    {
        return $this->idmovimiento;
    }

    /**
     * @param mixed $idmovimiento
     */
    public function setIdmovimiento($idmovimiento): void
    {
        $this->idmovimiento = $idmovimiento;
    }

    /**
     * @return mixed
     */
    public function getIngresa()
    {
        return $this->ingresa;
    }

    /**
     * @param mixed $ingresa
     */
    public function setIngresa($ingresa): void
    {
        $this->ingresa = $ingresa;
    }

    /**
     * @return mixed
     */
    public function getRetira()
    {
        return $this->retira;
    }

    /**
     * @param mixed $retira
     */
    public function setRetira($retira): void
    {
        $this->retira = $retira;
    }

    /**
     * @return mixed
     */
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo): void
    {
        $this->motivo = $motivo;
    }

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario): void
    {
        $this->idusuario = $idusuario;
    }

    public function verFilas()
    {
        $sql = "select * from cajas_movimientos as cj 
                where cj.fecha = '$this->fecha' and cj.id_almacen = '$this->idalmacen'";
        return $this->conectar->get_Cursor($sql);
    }

    public function obtenerTotalDia($tipo)
    {
        $campo = "ingresa";
        if ($tipo == 1) {
            $campo = "ingresa";
        } else {
            $campo = "retira";
        }
        $sql = "select ifnull(sum($campo), 0) as total from cajas_movimientos as cj 
                where cj.fecha = '$this->fecha' and cj.id_almacen = '$this->idalmacen'";
        return $this->conectar->get_valor_query($sql, 'total');
    }

    public function insertar()
    {
        $sql = "insert into cajas_movimientos 
        values ('$this->fecha', 
                '$this->idalmacen',
                '$this->idmovimiento',
                '$this->ingresa',   
                '$this->retira',
                '$this->motivo',
                '$this->idusuario')";
        //echo $sql;
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_movimiento) + 1, 1) as codigo 
            from cajas_movimientos";
        $this->idmovimiento = $this->conectar->get_valor_query($sql, 'codigo');
    }

}