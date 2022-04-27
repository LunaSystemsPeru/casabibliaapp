<?php
require_once 'Conectar.php';

class Caja
{
    private $idalmacen;
    private $fecha;
    private $mapertura;
    private $conectar;

    /**
     * Caja constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
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
    public function getMapertura()
    {
        return $this->mapertura;
    }

    /**
     * @param mixed $mapertura
     */
    public function setMapertura($mapertura): void
    {
        $this->mapertura = $mapertura;
    }

    public function insertar()
    {
        $sql = "insert into cajas 
        values ('$this->idalmacen', 
                '$this->fecha',
                '0',
                '0',   
                '0',
                '0',
                '0', 
                '0',
                '0',
                '$this->mapertura',
                '0',
                '0')";
        //echo $sql;
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from cajas 
        where id_almacen = '$this->idalmacen' and fecha = '$this->fecha'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->mapertura = $fila['m_apertura'];
        }
    }
}