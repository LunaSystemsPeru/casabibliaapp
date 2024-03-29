<?php
require_once 'Conectar.php';

class Venta
{
    private $idventa;
    private $idalmacen;
    private $fecha;
    private $idtido;
    private $serie;
    private $numero;
    private $idcliente;
    private $idusuario;
    private $total;
    private $pagado;
    private $afectoigv;
    private $tipoventa;
    private $estado;
    private $idpedido;
    private $igv;
    private $aceptadoSunat;
    private $conectar;

    /**
     * ventas constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
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
    public function setIdventa($idventa)
    {
        $this->idventa = $idventa;
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
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
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
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getPagado()
    {
        return $this->pagado;
    }

    /**
     * @param mixed $pagado
     */
    public function setPagado($pagado)
    {
        $this->pagado = $pagado;
    }

    /**
     * @return mixed
     */
    public function getAfectoigv()
    {
        return $this->afectoigv;
    }

    /**
     * @param mixed $afectoigv
     */
    public function setAfectoigv($afectoigv)
    {
        $this->afectoigv = $afectoigv;
    }

    /**
     * @return mixed
     */
    public function getTipoventa()
    {
        return $this->tipoventa;
    }

    /**
     * @param mixed $tipoventa
     */
    public function setTipoventa($tipoventa)
    {
        $this->tipoventa = $tipoventa;
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
    public function getIdpedido()
    {
        return $this->idpedido;
    }

    /**
     * @param mixed $idpedido
     */
    public function setIdpedido($idpedido)
    {
        $this->idpedido = $idpedido;
    }

    /**
     * @return mixed
     */
    public function getIgv()
    {
        return $this->igv;
    }

    /**
     * @param mixed $igv
     */
    public function setIgv($igv): void
    {
        $this->igv = $igv;
    }

    /**
     * @return mixed
     */
    public function getAceptadoSunat()
    {
        return $this->aceptadoSunat;
    }

    /**
     * @param mixed $aceptadoSunat
     */
    public function setAceptadoSunat($aceptadoSunat): void
    {
        $this->aceptadoSunat = $aceptadoSunat;
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_ventas) + 1, 1) as codigo 
            from ventas";
        $this->idventa = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into ventas 
        values ('$this->idventa', 
                '$this->idalmacen',
                '$this->fecha',
                '$this->idtido',
                '$this->serie',                
                '$this->numero',
                '$this->idcliente',
                '$this->idusuario',                           
                '$this->total',
                '$this->pagado',
                '$this->afectoigv',                           
                '$this->tipoventa',
                '$this->estado',
                '$this->idpedido',
                '$this->igv',
                '$this->aceptadoSunat')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function aceptacionSunat()
    {
        $sql = "update ventas set 
                  aceptadosunat = '$this->aceptadoSunat' 
                where id_ventas = '$this->idventa'";
        //echo $sql . "<br";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function cambiarVenta()
    {
        $sql = "update ventas set 
                  estado = '$this->estado' 
                where id_ventas = '$this->idventa'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update ventas 
        set id_almacen = '$this->idalmacen',            
            fecha = '$this->fecha',
            id_tido = '$this->idtido',            
            serie = '$this->serie',                     
            numero = '$this->numero',
            id_cliente = '$this->idcliente',            
            id_usuarios = '$this->idusuario',                 
            total = '$this->total',
            pagado = '$this->pagado',
            afecto_igv = '$this->afectoigv',
            tipo_venta = '$this->tipoventa',
            estado = '$this->estado',
            id_pedido = '$this->idpedido',
       where id_ventas = '$this->idventa'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatosJson()
    {
        $sql = "select * from ventas 
        where id_ventas = '$this->idventa'";
        return $this->conectar->get_json_rows($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from ventas 
        where id_ventas = '$this->idventa'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idventa = $fila['id_ventas'];
            $this->idalmacen = $fila['id_almacen'];
            $this->fecha = $fila['fecha'];
            $this->idtido = $fila['id_tido'];
            $this->serie = $fila['serie'];
            $this->numero = $fila['numero'];
            $this->idcliente = $fila['id_cliente'];
            $this->idusuario = $fila['id_usuarios'];
            $this->total = $fila['total'];
            $this->pagado = $fila['pagado'];
            $this->afectoigv = $fila['afecto_igv'];
            $this->tipoventa = $fila['tipo_venta'];
            $this->estado = $fila['estado'];
            $this->idpedido = $fila['id_pedido'];
            $this->igv = $fila['igv'];
            $this->aceptadoSunat = $fila['aceptadosunat'];
        }
    }

    public function verFilas($inicialserie)
    {
        $sql = "select v.fecha, v.serie, v.numero, ds.abreviado, ds.cod_sunat , c.documento, c.nombre, v.estado, v.total, a.nombre as ntienda, v.id_ventas 
                from ventas as v 
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join clientes c on v.id_cliente = c.id_cliente
                inner join almacen a on v.id_almacen = a.id_almacen
                where v.serie like '$inicialserie%' and v.fecha = '$this->fecha' and v.id_almacen = '$this->idalmacen' 
                order by v.fecha asc, v.numero desc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verNotas()
    {
        $sql = "select v.fecha, v.serie, v.numero, ds.abreviado, c.documento, c.nombre, v.estado, v.total, a.nombre as ntienda, v.id_ventas 
                from ventas as v 
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join clientes c on v.id_cliente = c.id_cliente
                inner join almacen a on v.id_almacen = a.id_almacen
                where v.id_tido = '$this->idtido' and v.fecha = '$this->fecha' and v.id_almacen = '$this->idalmacen' 
                order by v.fecha asc, v.numero desc";


        //where v.serie like '$inicialserie%' and v.fecha > '$this->fecha' and v.id_almacen = '$this->idalmacen'";
        return $this->conectar->get_Cursor($sql);
    }

    public function verBoletasActivas($inicialserie, $idempresa)
    {
        $sql = "select v.fecha, v.id_tido, v.serie, v.numero, ds.abreviado, ds.cod_sunat , c.documento, c.nombre, v.estado, v.total, v.igv, a.nombre as ntienda, v.id_ventas 
                from ventas as v 
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join clientes c on v.id_cliente = c.id_cliente
                inner join almacen a on v.id_almacen = a.id_almacen
                inner join empresa e on a.id_empresa = e.id_empresa
                where v.serie like '$inicialserie%' and v.fecha = '$this->fecha' and e.id_empresa = '$idempresa' and v.aceptadosunat = 0
                order by v.fecha asc, v.numero desc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verFechasBoletasPendientesSunat($fechainicio, $fechafin)
    {
        $sql = "select v.fecha, a.id_empresa, count(*) as cantidad 
                from ventas as v 
                inner join almacen a on v.id_almacen = a.id_almacen
                where v.fecha between '$fechainicio' and '$fechafin' and v.aceptadosunat = 0  
                group by v.fecha, a.id_empresa";
        //echo $sql;
        return $this->conectar->get_Cursor($sql);
    }

    public function verTiendas($fecha)
    {
        $sql = "select v.id_almacen, a.nombre, a.ubigeo
                from ventas as v 
                inner join almacen a on v.id_almacen = a.id_almacen
                where year(v.fecha) = year('$fecha') and month(v.fecha) = month('$fecha') and v.id_tido != 2 and v.id_tido != 9
                group by v.id_almacen
                order by a.nombre asc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verDocumentosPLE($fecha)
    {
        $sql = "select v.id_ventas, v.fecha, v.id_tido,ds.cod_sunat, ds.abreviado, v.serie, LPAD(v.numero, 4, '0') as numero, c.documento, c.nombre, v.afecto_igv, v.igv, v.total, v.estado, v.aceptadosunat, a.nombre as ntienda, e.ruc
                from ventas as v
                inner join clientes c on v.id_cliente = c.id_cliente
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join almacen a on v.id_almacen = a.id_almacen
                inner join empresa e on a.id_empresa = e.id_empresa
                where year(v.fecha) = year('$fecha') and month(v.fecha) = month('$fecha') and v.id_tido in (4,5,6,7) 
                order by v.fecha asc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verDocumentosPLExFechas($fechainicio, $fechafin)
    {
        $sql = "select e.ruc, ds.cod_sunat, v.serie, v.numero, v.fecha, v.total, v.estado, v.id_ventas, v.aceptadosunat  
                    from ventas as v 
                    inner join almacen a on v.id_almacen = a.id_almacen
                    inner join empresa as e on e.id_empresa = a.id_empresa 
                    inner join documentos_sunat ds on v.id_tido = ds.id_tido 
                    where v.fecha between '$fechainicio' and '$fechafin' and v.id_tido in (4,5,6,7) 
                    order by v.fecha";
        //echo $sql;
        return $this->conectar->get_Cursor($sql);
    }

    public function verDocumentosPLExTienda($fecha)
    {
        $sql = "select v.id_ventas, v.fecha, v.id_tido,ds.cod_sunat, ds.abreviado, v.serie, LPAD(v.numero, 4, '0') as numero, c.documento, c.nombre, v.afecto_igv, v.igv, v.total, v.estado, a.nombre as ntienda
                from ventas as v
                inner join clientes c on v.id_cliente = c.id_cliente
                inner join documentos_sunat ds on v.id_tido = ds.id_tido
                inner join almacen a on v.id_almacen = a.id_almacen
                inner join empresa e on a.id_empresa = e.id_empresa
                where year(v.fecha) = year('$fecha') and month(v.fecha) = month('$fecha') and v.id_almacen = '$this->idalmacen' and v.id_tido != 2 and v.id_tido != 9 
                order by v.fecha asc";
        return $this->conectar->get_Cursor($sql);
    }

    public function verVentasBanco($fechainicio, $fechafinal)
    {
        $sql = "select v.fecha, ds.abreviado, v.serie, v.numero, c.documento, c.nombre as ncliente, p.descripcion, pv.cantidad, pv.precio, a.nombre as ntienda
                from productos_ventas as pv
                         inner join productos p on pv.id_producto = p.id_producto
                         inner join ventas v on pv.id_ventas = v.id_ventas
                         inner join documentos_sunat ds on v.id_tido = ds.id_tido
                         inner join clientes c on v.id_cliente = c.id_cliente
                         inner join almacen a on v.id_almacen = a.id_almacen
                where v.fecha between '$fechainicio' and '$fechafinal'  and v.estado = 1
                order by v.fecha asc, v.numero asc";
        return $this->conectar->get_Cursor($sql);
    }

    public function consultaCPE()
    {
        $sql = "select id_ventas
                from ventas as v
                where v.fecha = '$this->fecha' and v.id_tido = '$this->idtido' and v.serie = '$this->serie' and v.numero = '$this->numero' and v.total = '$this->total'";
        $this->idventa = $this->conectar->get_valor_query($sql, 'id_ventas');
    }
}