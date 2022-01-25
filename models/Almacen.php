<?php
require_once 'Conectar.php';

class Almacen
{
private $idalmacen;
private $idempresa;
private $nombre;
private $direccion;
private $ciudad;
private $ticketera;
private $telefono;
private $estado;

    /**
     * Almacen constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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
    public function setIdalmacen($idalmacen)
    {
        $this->idalmacen = $idalmacen;
    }

    /**
     * @return mixed
     */
    public function getIdempresa()
    {
        return $this->idempresa;
    }

    /**
     * @param mixed $idempresa
     */
    public function setIdempresa($idempresa)
    {
        $this->idempresa = $idempresa;
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
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @return mixed
     */
    public function getTicketera()
    {
        return $this->ticketera;
    }

    /**
     * @param mixed $ticketera
     */
    public function setTicketera($ticketera)
    {
        $this->ticketera = $ticketera;
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
    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from almacen";
        $this->idalmacen = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into almacen 
        values ('$this->idalmacen', 
                '$this->idempresa',
                '$this->nombre',
                '$this->direccion',   
                '$this->ciudad',
                '$this->ticketera',
                '$this->telefono',                
                '$this->estado')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update almacen 
        set id_empresa = '$this->idempresa',
            nombre = '$this->nombre', 
            direccion = '$this->direccion'
            ciudad = '$this->ciudad'
            ticketera = '$this->ticketera'
            telefono = '$this->telefono'
            estado = '$this->estado'
        where id = '$this->id'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from almacen 
        where id = '$this->id'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idalmacen = $fila['id_almacen'];
            $this->idempresa = $fila['id_empresa'];
            $this->nombre = $fila['nombre'];
            $this->direccion = $fila['direccion'];
            $this->ciudad = $fila['ciudad'];
            $this->ticketera = $fila['ticketera'];
            $this->telefono = $fila['telefono'];
            $this->estado = $fila['estado'];
        }
    }

    public function verFilas()
    {
        $sql = "select * 
                from almacen 
                where id = '$this->id' ";
        return $this->conectar->get_Cursor($sql);
    }

}