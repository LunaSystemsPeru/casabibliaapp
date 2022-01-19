<?php
require_once 'Conectar.php';

class TablaGeneralDetalle
{
    private $id;
    private $descripcion;
    private $valor;
    private $idtabla;
    private $conectar;

    /**
     * TablaGeneralDetalle constructor.
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = strtoupper($descripcion);
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @return mixed
     */
    public function getIdtabla()
    {
        return $this->idtabla;
    }

    /**
     * @param mixed $idtabla
     */
    public function setIdtabla($idtabla)
    {
        $this->idtabla = $idtabla;
    }

    public function insertar()
    {
        $sql = "insert into tabla_detalle
        values ('$this->id', 
                '$this->descripcion', 
                '$this->valor',
                '$this->idtabla')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update tabla_detalle 
        set descripcion = '$this->descripcion', valor = '$this->valor' 
        where id = '$this->id'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from tabla_detalle";
        $this->id = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from tabla_detalle 
        where id = '$this->id'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->descripcion = $fila['datos'];
            $this->valor = $fila['valor'];
        }
    }

    public function obtenerDatosJson()
    {
        $sql = "select * 
        from tabla_detalle 
        where id = '$this->id'";
        return $this->conectar->get_json_row($sql);
    }

    public function verFilas()
    {
        $sql = "select * from tabla_detalle 
            where id_tabla_general = '$this->idtabla' 
            order by descripcion asc";
        return $this->conectar->get_Cursor($sql);
    }

}