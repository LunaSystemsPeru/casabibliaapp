<?php
require_once 'Conectar.php';

class ColaboradorCuenta
{
    private $id;
    private $idtipodocumento;
    private $nrodocumento;
    private $nombretitular;
    private $nrocuenta;
    private $idcolaborador;
    private $conectar;

    /**
     * ColaboradorCuenta constructor.
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
    public function getIdtipodocumento()
    {
        return $this->idtipodocumento;
    }

    /**
     * @param mixed $idtipodocumento
     */
    public function setIdtipodocumento($idtipodocumento)
    {
        $this->idtipodocumento = $idtipodocumento;
    }

    /**
     * @return mixed
     */
    public function getNrocuenta()
    {
        return $this->nrocuenta;
    }

    /**
     * @param mixed $nrocuenta
     */
    public function setNrocuenta($nrocuenta)
    {
        $this->nrocuenta = $nrocuenta;
    }

    /**
     * @return mixed
     */
    public function getIdcolaborador()
    {
        return $this->idcolaborador;
    }

    /**
     * @param mixed $idcolaborador
     */
    public function setIdcolaborador($idcolaborador)
    {
        $this->idcolaborador = $idcolaborador;
    }

    /**
     * @return mixed
     */
    public function getNrodocumento()
    {
        return $this->nrodocumento;
    }

    /**
     * @param mixed $nrodocumento
     */
    public function setNrodocumento($nrodocumento)
    {
        $this->nrodocumento = $nrodocumento;
    }

    /**
     * @return mixed
     */
    public function getNombretitular()
    {
        return $this->nombretitular;
    }

    /**
     * @param mixed $nombretitular
     */
    public function setNombretitular($nombretitular)
    {
        $this->nombretitular = $nombretitular;
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from colaborador_cuenta";
        $this->id = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into colaborador_cuenta 
        values ('$this->id', 
                '$this->idtipodocumento',
                '$this->nrocuenta',
                '$this->nrodocumento', 
                '$this->idcolaborador',
                '$this->nombretitular')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update colaborador_cuenta 
        set nrocuenta = '$this->nrocuenta',
            nro_documento = '$this->nrodocumento',
            id_tipo_documento = '$this->idtipodocumento', 
            nombre_titular = '$this->idcolaborador'
        where id = '$this->id'";
        return $this->conectar->ejecutar_idu($sql);
    }


    public function obtenerDatos()
    {
        $sql = "select * 
        from colaborador_cuenta 
        where id = '$this->id'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idtipodocumento = $fila['id_tipo_documento'];
            $this->nrodocumento = $fila['nro_documento'];
            $this->nrocuenta = $fila['nrocuenta'];
            $this->idcolaborador = $fila['id_colaborador'];
            $this->nombretitular = $fila['nombre_titular'];
        }

    }

    public function verFilas()
    {
        $sql = "select * 
                from colaborador_cuenta 
                where id_colaborador = '$this->idcolaborador' ";
        return $this->conectar->get_Cursor($sql);
    }


}