<?php
require_once 'Conectar.php';

class Producto
{
    private $idproducto;
    private $descripcion;
    private $codexterno;
    private $costo;
    private $precio;
    private $ctotal;
    private $tipoproducto;
    private $afectoigv;
    private $idsubclasificacion;
    private $imagen;
    private $estado;
    private $idproveedor;

    /**
     * producto constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * @param mixed $idproducto
     */
    public function setIdproducto($idproducto)
    {
        $this->idproducto = $idproducto;
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
    public function getCodexterno()
    {
        return $this->codexterno;
    }

    /**
     * @param mixed $codexterno
     */
    public function setCodexterno($codexterno)
    {
        $this->codexterno = $codexterno;
    }

    /**
     * @return mixed
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * @param mixed $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getCtotal()
    {
        return $this->ctotal;
    }

    /**
     * @param mixed $ctotal
     */
    public function setCtotal($ctotal)
    {
        $this->ctotal = $ctotal;
    }

    /**
     * @return mixed
     */
    public function getTipoproducto()
    {
        return $this->tipoproducto;
    }

    /**
     * @param mixed $tipoproducto
     */
    public function setTipoproducto($tipoproducto)
    {
        $this->tipoproducto = $tipoproducto;
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
    public function getIdsubclasificacion()
    {
        return $this->idsubclasificacion;
    }

    /**
     * @param mixed $idsubclasificacion
     */
    public function setIdsubclasificacion($idsubclasificacion)
    {
        $this->idsubclasificacion = $idsubclasificacion;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
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
    public function getIdproveedor()
    {
        return $this->idproveedor;
    }

    /**
     * @param mixed $idproveedor
     */
    public function setIdproveedor($idproveedor)
    {
        $this->idproveedor = $idproveedor;
    }
    public function obtenerId()
    {
        $sql = "select ifnull(max(id_producto) + 1, 1) as codigo 
            from productos";
        $this->idproducto = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into productos
        values ('$this->idproducto', 
                '$this->descripcion',
                '$this->codexterno',
                '$this->costo',   
                '$this->precio',
                '$this->ctotal',
                '$this->tipoproducto',
                '$this->afectoigv',   
                '$this->idsubclasificacion',
                '$this->imagen',
                '$this->estado',
                '$this->idproveedor')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update productos 
        set descripcion = '$this->descripcion',
            cod_externo = '$this->codexterno', 
            costo = '$this->costo'
            precio = '$this->precio'
            ctotal = '$this->ctotal'
            tipo_producto = '$this->tipoproducto'
            afecto_igv = '$this->afectoigv', 
            id_subclasificacion = '$this->idsubclasificacion'
            imagen = '$this->imagen'
            estado = '$this->estado'
            id_proveedor = '$this->idproveedor'
        where id = '$this->idproducto'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from productos
        where id = '$this->idproducto'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idproducto = $fila['id_producto'];
            $this->descripcion = $fila['descripcion'];
            $this->codexterno = $fila['cod_externo'];
            $this->costo = $fila['costo'];
            $this->precio = $fila['precio'];
            $this->ctotal = $fila['ctotal'];
            $this->tipoproducto = $fila['tipo_producto'];
            $this->afectoigv = $fila['afecto_igv'];
            $this->idsubclasificacion = $fila['id_subclasificacion'];
            $this->imagen = $fila['imagen'];
            $this->estado = $fila['estado'];
            $this->idproveedor = $fila['id_proveedor'];
        }
    }

    public function verFilas()
    {
        $sql = "select * from productos 
                where id = '$this->idproducto' ";
        return $this->conectar->get_Cursor($sql);
    }

    public function buscarProductos($termino)
    {
        $sql = "select id_producto, descripcion, cod_externo, precio, afecto_igv
                from productos
                where descripcion like '%$termino%' or cod_externo like '%$termino%' 
                order by descripcion asc 
                limit 50";
        return $this->conectar->get_Cursor($sql);
    }

}