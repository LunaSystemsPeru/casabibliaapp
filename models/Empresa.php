<?php
require_once 'Conectar.php';

class Empresa
{
private $idempresa;
private $ruc;
private $razon;
private $direccion;
private $estado;
private $condicion;
private $conectar;

    /**
     * Empresa constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * @param mixed $ruc
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;
    }

    /**
     * @return mixed
     */
    public function getRazon()
    {
        return $this->razon;
    }

    /**
     * @param mixed $razon
     */
    public function setRazon($razon)
    {
        $this->razon = $razon;
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
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * @param mixed $condicion
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;
    }
    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from empresa";
        $this->idempresa = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into empresa 
        values ('$this->idempresa', 
                '$this->ruc',
                '$this->razon',
                '$this->direccion',
                '$this->estado',
                '$this->condicion')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update empresa 
        set ruc = '$this->ruc',
            razon = '$this->razon',            
            direccion = '$this->direccion',
            estado = '$this->estado',            
            condicion = '$this->condicion',
       where id_empresa = '$this->idempresa'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from empresa 
        where id_empresa = '$this->idempresa'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idempresa = $fila['id_empresa'];
            $this->ruc = $fila['ruc'];
            $this->razon = $fila['razon'];
            $this->direccion = $fila['direccion'];
            $this->estado = $fila['estado'];
            $this->condicion = $fila['condicion'];
        }
    }

    public function verFilas()
    {
        $sql = "select * from empresa 
                where id_empresa = '$this->idempresa' ";
        return $this->conectar->get_Cursor($sql);
    }

}
