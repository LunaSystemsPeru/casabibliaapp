<?php
require_once 'Conectar.php';

class Inicio
{
    private $fechainicio;
    private $fechafinal;
    private $empresaid;
    private $tiendaid;
    private $conectar;

    /**
     * Inicio constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
    }


    /**
     * @return mixed
     */
    public function getFechainicio()
    {
        return $this->fechainicio;
    }

    /**
     * @param mixed $fechainicio
     */
    public function setFechainicio($fechainicio): void
    {
        $this->fechainicio = $fechainicio;
    }

    /**
     * @return mixed
     */
    public function getFechafinal()
    {
        return $this->fechafinal;
    }

    /**
     * @param mixed $fechafinal
     */
    public function setFechafinal($fechafinal): void
    {
        $this->fechafinal = $fechafinal;
    }

    /**
     * @return mixed
     */
    public function getEmpresaid()
    {
        return $this->empresaid;
    }

    /**
     * @param mixed $empresaid
     */
    public function setEmpresaid($empresaid): void
    {
        $this->empresaid = $empresaid;
    }

    /**
     * @return mixed
     */
    public function getTiendaid()
    {
        return $this->tiendaid;
    }

    /**
     * @param mixed $tiendaid
     */
    public function setTiendaid($tiendaid): void
    {
        $this->tiendaid = $tiendaid;
    }


    public function verVentasClasificacionTienda()
    {
        $sql = "select v.id_almacen, p.id_subclasificacion, psc.nombre, sum(pv.cantidad * pv.precio) as vendido
                from productos_ventas as pv
                inner join ventas v on pv.id_ventas = v.id_ventas
                inner join productos p on pv.id_producto = p.id_producto
                inner join productos_sub_clasificacion psc on p.id_subclasificacion = psc.id_subclasificacion
                where year(v.fecha) = year(current_date()) and month(v.fecha) = month(current_date()) and v.estado = 1 and v.id_almacen = '$this->tiendaid'
                group by p.id_subclasificacion
                order by vendido asc";
        return $this->conectar->get_Cursor($sql);
    }
}