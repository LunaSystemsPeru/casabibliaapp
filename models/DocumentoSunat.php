<?php
require_once 'Conectar.php';

class DocumentoSunat
{
private $idtido;
private $descripcion;
private $codsunat;
private $abreviado;

    /**
     * DocumentoSunat constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIdtido()
    {
        return $this->idtido;
    }

    /**
     * @param mixed $idtido
     */
    public function setIdtido($idtido)
    {
        $this->idtido = $idtido;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getCodsunat()
    {
        return $this->codsunat;
    }

    /**
     * @param mixed $codsunat
     */
    public function setCodsunat($codsunat)
    {
        $this->codsunat = $codsunat;
    }

    /**
     * @return mixed
     */
    public function getAbreviado()
    {
        return $this->abreviado;
    }

    /**
     * @param mixed $abreviado
     */
    public function setAbreviado($abreviado)
    {
        $this->abreviado = $abreviado;
    }

}