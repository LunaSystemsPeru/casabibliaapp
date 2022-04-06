<?php
require_once 'Conectar.php';

class VentaPago
{
    private $idventa;
    private $idcobro;
    private $fecha;
    private $monto;
    private $tipopago;
    private $conectar;

    /**
     * VentaPago constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdventa()
    {
        return $this->idventa;
    }

    /**
     * @param mixed $idventa
     */
    public function setIdventa($idventa)
    {
        $this->idventa = $idventa;
    }

    /**
     * @return mixed
     */
    public function getIdcobro()
    {
        return $this->idcobro;
    }

    /**
     * @param mixed $idcobro
     */
    public function setIdcobro($idcobro)
    {
        $this->idcobro = $idcobro;
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
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getMonto()
    {
        return $this->monto;
    }

    /**
     * @param mixed $monto
     */
    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    /**
     * @return mixed
     */
    public function getTipopago()
    {
        return $this->tipopago;
    }

    /**
     * @param mixed $tipopago
     */
    public function setTipopago($tipopago)
    {
        $this->tipopago = $tipopago;
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_cobro) + 1, 1) as codigo 
            from ventas_cobros";
        $this->idcobro = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into ventas_cobros
        values ('$this->idventa', 
                '$this->idcobro',
                '$this->fecha',
                '$this->monto',   
                '$this->tipopago')";
        return $this->conectar->ejecutar_idu($sql);
    }

}