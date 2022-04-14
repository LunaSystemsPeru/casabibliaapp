<?php
require_once 'Conectar.php';

class VentaAnulada
{
    private $idventa;
    private $fechaanulada;
    private $idusuario;
    private $enviadosunat;
    private $aceptadosunat;
    private $conectar;

    /**
     * VentaAnulada constructor.
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
    public function setIdventa($idventa): void
    {
        $this->idventa = $idventa;
    }

    /**
     * @return mixed
     */
    public function getFechaanulada()
    {
        return $this->fechaanulada;
    }

    /**
     * @param mixed $fechaanulada
     */
    public function setFechaanulada($fechaanulada): void
    {
        $this->fechaanulada = $fechaanulada;
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

    /**
     * @return mixed
     */
    public function getEnviadosunat()
    {
        return $this->enviadosunat;
    }

    /**
     * @param mixed $enviadosunat
     */
    public function setEnviadosunat($enviadosunat): void
    {
        $this->enviadosunat = $enviadosunat;
    }

    /**
     * @return mixed
     */
    public function getAceptadosunat()
    {
        return $this->aceptadosunat;
    }

    /**
     * @param mixed $aceptadosunat
     */
    public function setAceptadosunat($aceptadosunat): void
    {
        $this->aceptadosunat = $aceptadosunat;
    }


    public function insertar()
    {
        $sql = "insert into ventas_anuladas
        values ('$this->idventa', 
                '$this->fechaanulada',
                '$this->idusuario',
                '$this->enviadosunat',   
                '$this->aceptadosunat')";
        return $this->conectar->ejecutar_idu($sql);
    }
}