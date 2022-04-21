<?php
require_once 'Conectar.php';

class SunatResumen
{
    private $id;
    private $fechaenvio;
    private $tikect;
    private $nombre;
    private $cantidad;
    private $tipo;
    private $idempresa;
    private $estado;
    private $conectar;

    /**
     * SunatResumen constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFechaenvio()
    {
        return $this->fechaenvio;
    }

    /**
     * @param mixed $fechaenvio
     */
    public function setFechaenvio($fechaenvio): void
    {
        $this->fechaenvio = $fechaenvio;
    }

    /**
     * @return mixed
     */
    public function getTikect()
    {
        return $this->tikect;
    }

    /**
     * @param mixed $tikect
     */
    public function setTikect($tikect): void
    {
        $this->tikect = $tikect;
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
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
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
    public function setCantidad($cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
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
    public function setIdempresa($idempresa): void
    {
        $this->idempresa = $idempresa;
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
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from sunat_resumen";
        $this->id = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into sunat_resumen 
        values ('$this->id', 
                '$this->fechaenvio',
                '$this->tikect',
                '$this->nombre',   
                '$this->cantidad',
                '$this->tipo',
                '$this->idempresa',
                '$this->estado')";
        echo $sql;
        return $this->conectar->ejecutar_idu($sql);
    }

    public function verEnvios()
    {
        $sql = "select sr.id, sr.fecha_envio, sr.ticket, sr.nombre, sr.cantidad, sr.tipo, e.razon, sr.estado
                from sunat_resumen as sr
                inner join empresa e on sr.id_empresa = e.id_empresa
                where fecha_envio> date_sub(current_date(), interval 40 day) and sr.id_empresa = '$this->idempresa'";
        return $this->conectar->get_Cursor($sql);
    }
}