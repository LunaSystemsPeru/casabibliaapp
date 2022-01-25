<?php
require_once 'Conectar.php';

class Cliente
{
private $idcliente;
private $documento;
private $nombre;
private $direccion;
private $telefono;
private $celular;
private $venta;
private $pago;
private $ultimaventa;

    /**
     * Cliente constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * @param mixed $idcliente
     */
    public function setIdcliente($idcliente)
    {
        $this->idcliente = $idcliente;
    }

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * @param mixed $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getVenta()
    {
        return $this->venta;
    }

    /**
     * @param mixed $venta
     */
    public function setVenta($venta)
    {
        $this->venta = $venta;
    }

    /**
     * @return mixed
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * @param mixed $pago
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
    }

    /**
     * @return mixed
     */
    public function getUltimaventa()
    {
        return $this->ultimaventa;
    }

    /**
     * @param mixed $ultimaventa
     */
    public function setUltimaventa($ultimaventa)
    {
        $this->ultimaventa = $ultimaventa;
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from cliente";
        $this->id = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into cliente 
        values ('$this->idcliente', 
                '$this->documento',
                '$this->nombre',
                '$this->direccion',   
                '$this->telefono',
                '$this->celular',
                '$this->venta',     
                '$this->pago',  
                '$this->ultimaventa')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update cliente 
        set documento = '$this->documento',
            nombre = '$this->nombre', 
            direccion = '$this->direccion'
            telefono = '$this->telefono'
            celular = '$this->celular'
            venta = '$this->venta'
            pago = '$this->pago'
            ultima_venta = '$this->ultimaventa'
        where id = '$this->id'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from cliente 
        where id = '$this->id'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->id = $fila['id_cliente'];
            $this->documento = $fila['documento'];
            $this->nombre = $fila['nombre'];
            $this->direccion = $fila['direccion'];
            $this->telefono = $fila['telefono'];
            $this->celular = $fila['celular'];
            $this->venta = $fila['venta'];
            $this->pago = $fila['pago'];
            $this->ultimaventa = $fila['ultima_venta'];
        }
    }

    public function verFilas()
    {
        $sql = "select * 
                from cliente 
                where id = '$this->id' ";
        return $this->conectar->get_Cursor($sql);
    }

}