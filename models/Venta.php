<?php
require_once 'Conectar.php';

class venta
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
                '$this->idpedido')";
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
        }
    }

    public function verFilas()
    {
        $sql = "select * from ventas 
                where id_ventas = '$this->idventa' ";
        return $this->conectar->get_Cursor($sql);
    }



}