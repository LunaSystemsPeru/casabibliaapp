<?php
require_once 'Conectar.php';

class Colaborador
{
    private $id;
    private $idtipodocumento;
    private $nrodocumento;
    private $datos;
    private $direccion;
    private $zona;
    private $fechanacimiento;
    private $nrocelular;
    private $idtipotrabajo;
    private $idturno;
    private $estadocuenta;
    private $conectar;

    /**
     * Colaborador constructor.
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
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = strtoupper(trim($datos));
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
        $this->direccion = strtoupper(trim($direccion));
    }

    /**
     * @return mixed
     */
    public function getZona()
    {
        return $this->zona;
    }

    /**
     * @param mixed $zona
     */
    public function setZona($zona)
    {
        $this->zona = strtoupper($zona);
    }

    /**
     * @return mixed
     */
    public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * @param mixed $fechanacimiento
     */
    public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;
    }

    /**
     * @return mixed
     */
    public function getNrocelular()
    {
        return $this->nrocelular;
    }

    /**
     * @param mixed $nrocelular
     */
    public function setNrocelular($nrocelular)
    {
        $this->nrocelular = $nrocelular;
    }

    /**
     * @return mixed
     */
    public function getIdtipotrabajo()
    {
        return $this->idtipotrabajo;
    }

    /**
     * @param mixed $idtipotrabajo
     */
    public function setIdtipotrabajo($idtipotrabajo)
    {
        $this->idtipotrabajo = $idtipotrabajo;
    }

    /**
     * @return mixed
     */
    public function getIdturno()
    {
        return $this->idturno;
    }

    /**
     * @param mixed $idturno
     */
    public function setIdturno($idturno)
    {
        $this->idturno = $idturno;
    }

    /**
     * @return mixed
     */
    public function getEstadocuenta()
    {
        return $this->estadocuenta;
    }

    /**
     * @param mixed $estadocuenta
     */
    public function setEstadocuenta($estadocuenta)
    {
        $this->estadocuenta = $estadocuenta;
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id) + 1, 1) as codigo 
            from colaborador";
        $this->id = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function validarDocumento()
    {
        $sql = "select * 
        from colaborador 
        where id_tipo_documento = '$this->idtipodocumento' and nro_documento = '$this->nrodocumento'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->id = $fila['id'];
            return true;
        } else {
            return false;
        }
    }

    public function obtenerDatos()
    {
        $sql = "select * 
        from colaborador 
        where id = '$this->id'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idtipodocumento = $fila['id_tipo_documento'];
            $this->nrodocumento = $fila['nro_documento'];
            $this->datos = $fila['datos'];
            $this->direccion = $fila['direccion'];
            $this->zona = $fila['zona'];
            $this->fechanacimiento = $fila['fecha_nacimiento'];
            $this->nrocelular = $fila['nro_celular'];
            $this->idtipotrabajo = $fila['id_tipo_trabajo'];
            $this->idturno = $fila['id_turno'];
            $this->estadocuenta = $fila['estado_cuenta'];
        }
    }

    public function insertar()
    {
        $sql = "insert into colaborador
        values ('$this->id',
                '$this->idtipodocumento', 
                '$this->nrodocumento',
                '$this->datos', 
                '$this->direccion', 
                '$this->zona', 
                '$this->fechanacimiento', 
                '$this->nrocelular', 
                '$this->idtipotrabajo', 
                '$this->idturno', 
                '$this->estadocuenta')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update colaborador 
        set datos = '$this->datos', 
            direccion = '$this->direccion',
            zona = '$this->zona',
            fecha_nacimiento = '$this->fechanacimiento',
            nro_celular = '$this->nrocelular'
        where id = '$this->id'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function verFilas()
    {
        $sql = "select c.id, tdd.descripcion as tipodocumento, tdt.descripcion as turno, tdtt.descripcion as tipotrabajo, c.nro_documento, c.datos, c.direccion, c.fecha_nacimiento, (year(now()) - year(c.fecha_nacimiento)) as edad,c.zona, c.nro_celular, c.estado_cuenta 
                from colaborador as c 
                    inner join tabla_detalle tdd on c.id_tipo_documento = tdd.id
                    inner join tabla_detalle tdt on c.id_turno = tdt.id
                    inner join tabla_detalle tdtt on c.id_tipo_trabajo = tdtt.id
                order by datos asc";
        return $this->conectar->get_Cursor($sql);
    }

}