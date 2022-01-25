<?php
require_once 'Conectar.php';

class ProductoVenta
{
private $idproducto;
private $idventa;
private $cantidad;
private $costo;
private $precio;

    /**
     * ProductoVenta constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * @param mixed $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
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

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from productos_ventas";
        $this->idproducto = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into productos_ventas 
        values ('$this->idproducto', 
                '$this->idventa',
                '$this->cantidad',
                '$this->costo',
                '$this->precio')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update productos_ventas 
        set id_ventas = '$this->idventa',
            cantidad = '$this->cantidad',            
            costo = '$this->costo',
            precio = '$this->precio',      
       where id = '$this->idproducto'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from productos_ventas 
        where id = '$this->idproducto'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idproducto = $fila['id_producto'];
            $this->idventa = $fila['id_ventas'];
            $this->cantidad = $fila['cantidad'];
            $this->costo = $fila['costo'];
            $this->precio = $fila['precio'];
        }
    }

    public function verFilas()
    {
        $sql = "select * from productos_ventas 
                where id = '$this->idproducto' ";
        return $this->conectar->get_Cursor($sql);
    }

}