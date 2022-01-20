<?php
require_once 'Conectar.php';

class producto
{
private $idproducto;
private $descripcion;
private $codexterno;
private $costo;
private $precio;
private $ctotal;
private $tipoproducto;
private $afectoigv;
private $idsubclasificacion;
private $imagen;
private $estado;
private $idproveedor;

    /**
     * producto constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * @param mixed $idproducto
     */
    public function setIdproducto($idproducto)
    {
        $this->idproducto = $idproducto;
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
    public function getCodexterno()
    {
        return $this->codexterno;
    }

    /**
     * @param mixed $codexterno
     */
    public function setCodexterno($codexterno)
    {
        $this->codexterno = $codexterno;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getCtotal()
    {
        return $this->ctotal;
    }

    /**
     * @param mixed $ctotal
     */
    public function setCtotal($ctotal)
    {
        $this->ctotal = $ctotal;
    }

    /**
     * @return mixed
     */
    public function getTipoproducto()
    {
        return $this->tipoproducto;
    }

    /**
     * @param mixed $tipoproducto
     */
    public function setTipoproducto($tipoproducto)
    {
        $this->tipoproducto = $tipoproducto;
    }

    /**
     * @return mixed
     */
    public function getAfectoigv()
    {
        return $this->afectoigv;
    }

    /**
     * @param mixed $afectoigv
     */
    public function setAfectoigv($afectoigv)
    {
        $this->afectoigv = $afectoigv;
    }

    /**
     * @return mixed
     */
    public function getIdsubclasificacion()
    {
        return $this->idsubclasificacion;
    }

    /**
     * @param mixed $idsubclasificacion
     */
    public function setIdsubclasificacion($idsubclasificacion)
    {
        $this->idsubclasificacion = $idsubclasificacion;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getIdproveedor()
    {
        return $this->idproveedor;
    }

    /**
     * @param mixed $idproveedor
     */
    public function setIdproveedor($idproveedor)
    {
        $this->idproveedor = $idproveedor;
    }

}