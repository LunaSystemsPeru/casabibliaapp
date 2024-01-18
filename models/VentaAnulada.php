<?php
require_once 'Conectar.php';

class VentaAnulada
{
    private $idventa;
    private $fechaanulada;
    private $idusuario;
    private $enviadosunat;
    private $aceptadosunat;
    private $conectar;

    /**
     * VentaAnulada constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
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
    public function setIdventa($idventa): void
    {
        $this->idventa = $idventa;
    }

    /**
     * @return mixed
     */
    public function getFechaanulada()
    {
        return $this->fechaanulada;
    }

    /**
     * @param mixed $fechaanulada
     */
    public function setFechaanulada($fechaanulada): void
    {
        $this->fechaanulada = $fechaanulada;
    }

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario): void
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return mixed
     */
    public function getEnviadosunat()
    {
        return $this->enviadosunat;
    }

    /**
     * @param mixed $enviadosunat
     */
    public function setEnviadosunat($enviadosunat): void
    {
        $this->enviadosunat = $enviadosunat;
    }

    /**
     * @return mixed
     */
    public function getAceptadosunat()
    {
        return $this->aceptadosunat;
    }

    /**
     * @param mixed $aceptadosunat
     */
    public function setAceptadosunat($aceptadosunat): void
    {
        $this->aceptadosunat = $aceptadosunat;
    }


    public function insertar()
    {
        $sql = "insert into ventas_anuladas
        values ('$this->idventa', 
                '$this->fechaanulada',
                '$this->idusuario',
                '$this->enviadosunat',   
                '$this->aceptadosunat')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function verVentasAnuladasFechas ($seriecomprobante, $fecha_inicio, $fecha_fin) {
        $sql = "select va.fecha_anulada as fecha, v.fecha as fechadoc, a.id_empresa, count(*) as cantidad 
                from ventas_anuladas as va 
                inner join ventas v on va.id_ventas = v.id_ventas 
                inner join almacen a on v.id_almacen = a.id_almacen 
                where v.serie like '$seriecomprobante%' and va.fecha_anulada between  '$fecha_inicio' and '$fecha_fin'
                group by va.fecha_anulada ";
        return $this->conectar->get_Cursor($sql);
    }

    public function verVentasAnuladas($inicialserie, $idempresa, $fecha)
    {
        $sql = "select v.fecha, v.id_tido, v.serie, v.numero, ds.abreviado, ds.cod_sunat , c.documento, c.nombre, v.estado, v.total, v.igv, a.nombre as ntienda, v.id_ventas 
                from ventas_anuladas as va
                inner join ventas v on va.id_ventas = v.id_ventas
                inner join clientes c on v.id_cliente = c.id_cliente
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join almacen a on v.id_almacen = a.id_almacen
                inner join empresa e on a.id_empresa = e.id_empresa
                where v.serie like '$inicialserie%' and va.fecha_anulada = '$fecha' and e.id_empresa = '$idempresa' 
                order by v.fecha asc, v.numero desc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verAnuladasTienda($idtienda)
    {
        $sql = "select va.fecha_anulada, va.id_ventas, va.enviado_sunat, va.aceptado_sunat, v.serie, v.numero, ds.abreviado, u.username
                from ventas_anuladas as va
                inner join ventas v on va.id_ventas = v.id_ventas
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join usuarios u on v.id_usuarios = u.id_usuarios
                where va.fecha_anulada > date_sub(current_date(), interval 7 day) and v.id_almacen = '$idtienda' 
                order by va.fecha_anulada desc";
        return $this->conectar->get_Cursor($sql);
    }

    public function aceptacionSUNAT () {
        $sql ="update ventas_anuladas set aceptado_sunat = '$this->aceptadosunat' where id_ventas = '$this->idventa'";
        return $this->conectar->ejecutar_idu($sql);
    }
}