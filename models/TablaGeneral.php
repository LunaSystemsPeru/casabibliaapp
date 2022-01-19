<?php
require_once 'Conectar.php';

class TablaGeneral
{
private $id;
private $nombre;
private $conectar;

    /**
     * TablaGeneral constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
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

    public function insertar()
    {
        $sql = "insert into tabla_general 
        values ('$this->id', 
                '$this->nombre')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update tabla_general 
        set nombre = '$this->nombre' 
        where id = '$this->id'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from tabla_general";
        $this->id = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from tabla_general 
        where id = '$this->id'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->nombre = $fila['nombre'];
        }

    }

    public function verFilasPublicas () {
        $sql= "select * from tabla_general order by nombre asc ";
        return $this->conectar->get_Cursor($sql);
    }

}