<?php
require_once 'Conectar.php';

class DocumentoSunat
{
    private $idtido;
    private $descripcion;
    private $codsunat;
    private $abreviado;
    private $conectar;


    /**
     * DocumentoSunat constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_tido) + 1, 1) as codigo 
            from documentos_sunat";
        $this->idtido = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into documentos_sunat 
        values ('$this->idtido', 
                '$this->descripcion',
                '$this->codsunat',
                '$this->abreviado')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update documentos_sunat 
        set descripcion = '$this->descripcion',            
            cod_sunat = '$this->codsunat',
            abreviado = '$this->abreviado,' ||
       where id_tido = '$this->idtido'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from documentos_sunat 
        where id_tido = '$this->idtido'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idtido = $fila['id_tido'];
            $this->descripcion = $fila['descripcion'];
            $this->codsunat = $fila['cod_sunat'];
            $this->abreviado = $fila['abreviado'];
        }
    }

    public function verFilas()
    {
        $sql = "select * from documentos_sunat 
                where id_tido = '$this->idtido' ";
        return $this->conectar->get_Cursor($sql);
    }

    public function ventasDia($fecha)
    {
        $sql = "select ds.descripcion, ifnull(sum(v.total),0) as monto
                from documentos_sunat as ds
                left join ventas v on ds.id_tido = v.id_tido
                and v.fecha = '$fecha'
                group by ds.id_tido";
        return $this->conectar->get_Cursor($sql);
    }
}