<?php
require_once 'Conectar.php';

class VentaNota
{
    private $notaid; //id de la nota de credito
    private $referenciaid; //id de la venta anulada
    private $fecha;
    private $conectar;

    /**
     * VentaNota constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getNotaid()
    {
        return $this->notaid;
    }

    /**
     * @param mixed $notaid
     */
    public function setNotaid($notaid): void
    {
        $this->notaid = $notaid;
    }

    /**
     * @return mixed
     */
    public function getReferenciaid()
    {
        return $this->referenciaid;
    }

    /**
     * @param mixed $referenciaid
     */
    public function setReferenciaid($referenciaid): void
    {
        $this->referenciaid = $referenciaid;
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

    public function insertar()
    {
        $sql = "insert into ventas_notas 
        values ('$this->notaid', 
                '$this->referenciaid',
                '$this->fecha')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from ventas_notas
        where id_venta = '$this->notaid'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->referenciaid = $fila['id_referencia'];
            $this->fecha = $fila['fecha'];
        }
    }

}