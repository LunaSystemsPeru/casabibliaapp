<?php
require '../fixed/SessionActiva.php';
require '../../models/VentaAnulada.php';
require '../../models/VentaProducto.php';

$VentaAnulada = new VentaAnulada();
$ProductoVenta = new VentaProducto();

$VentaAnulada->setIdventa(filter_input(INPUT_GET, 'id'));
$VentaAnulada->setFechaanulada(date("Y-m-d"));
$VentaAnulada->setIdusuario($_SESSION['usuarioid']);
$VentaAnulada->setAceptadosunat(0);
$VentaAnulada->setEnviadosunat(0);

$VentaAnulada->insertar();

$ProductoVenta->setIdventa($VentaAnulada->getIdventa());
$ProductoVenta->eliminar();

$tipo = filter_input(INPUT_GET, 'tipo');
if ($tipo == "b") {
    header("Location: ../contents/lista-boleta.php");
} else {
    header("Location: ../contents/lista-factura.php");
}
