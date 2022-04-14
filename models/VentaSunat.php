<?php
require_once 'Conectar.php';

class VentaSunat
{
private $ventaid;
private $fechaEnvio;
private $respuesta;
private $estadoAceptado;
private $nombreDocumento;
private $codigoSunat;
private $hash;
private $conectar;

    /**
     * VentaSunat constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getVentaid()
    {
        return $this->ventaid;
    }

    /**
     * @param mixed $ventaid
     */
    public function setVentaid($ventaid)
    {
        $this->ventaid = $ventaid;
    }

    /**
     * @return mixed
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * @param mixed $fechaEnvio
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;
    }

    /**
     * @return mixed
     */
    public function getRespuesta()
    {
        return $this->respuesta;
    }

    /**
     * @param mixed $respuesta
     */
    public function setRespuesta($respuesta)
    {
        $this->respuesta = $respuesta;
    }

    /**
     * @return mixed
     */
    public function getEstadoAceptado()
    {
        return $this->estadoAceptado;
    }

    /**
     * @param mixed $estadoAceptado
     */
    public function setEstadoAceptado($estadoAceptado)
    {
        $this->estadoAceptado = $estadoAceptado;
    }

    /**
     * @return mixed
     */
    public function getNombreDocumento()
    {
        return $this->nombreDocumento;
    }

    /**
     * @param mixed $nombreDocumento
     */
    public function setNombreDocumento($nombreDocumento)
    {
        $this->nombreDocumento = $nombreDocumento;
    }

    /**
     * @return mixed
     */
    public function getCodigoSunat()
    {
        return $this->codigoSunat;
    }

    /**
     * @param mixed $codigoSunat
     */
    public function setCodigoSunat($codigoSunat)
    {
        $this->codigoSunat = $codigoSunat;
    }

    /**
     * @return mixed
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @param mixed $hash
     */
    public function setHash($hash): void
    {
        $this->hash = $hash;
    }

    public function insertar()
    {
        $sql = "insert into ventas_sunat 
        values ('$this->ventaid', 
                '$this->fechaEnvio',
                '$this->respuesta',
                '$this->estadoAceptado',   
                '$this->nombreDocumento',
                '$this->codigoSunat',
                '$this->hash')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from ventas_sunat 
        where id_venta = '$this->ventaid'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->fechaEnvio = $fila['fecha_envio'];
            $this->respuesta = $fila['respuesta'];
            $this->estadoAceptado = $fila['estado_aceptado'];
            $this->nombreDocumento = $fila['nombre_documento'];
            $this->codigoSunat = $fila['codigo_sunat'];
            $this->hash = $fila['hash'];
        }
    }

}