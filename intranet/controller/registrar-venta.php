<?php
require '../fixed/SessionActiva.php';
require '../../models/Venta.php';
require '../../models/ProductoVenta.php';
require '../../models/DocumentoTienda.php';

$Venta = new Venta();
$ProductoVenta = new ProductoVenta();
$DocumentoTienda = new DocumentoTienda();

$Venta->setFecha(filter_input(INPUT_POST,'inputFecha'));
$Venta->setIdalmacen($_SESSION['tiendaid']);
$Venta->setIdusuario($_SESSION['usuarioid']);
$Venta->setIdtido(filter_input(INPUT_POST, 'inputTido'));

//get serie y numero
$DocumentoTienda->setIdtienda($Venta->getIdalmacen());
$DocumentoTienda->setIddocumento($Venta->getIdtido());
$DocumentoTienda->obtenerDatos();
$Venta->setSerie($DocumentoTienda->getSerie());
$Venta->setNumero($DocumentoTienda->getNumero());

$Venta->setIdcliente(filter_input(INPUT_POST, 'inputClienteId'));
$Venta->setTotal(0); //llenar por trigger en producto venta
$Venta->setPagado(0);
$Venta->setAfectoigv(0);
$Venta->setTipoventa(1);
$Venta->setEstado(0);
$Venta->setIdpedido(0);

$Venta->obtenerId();
$Venta->insertar();

$jsonProductos = filter_input(INPUT_POST, 'arrayProductos');
$arrayProductos = json_decode($jsonProductos, false);

foreach ($arrayProductos as $item) {

}

echo json_encode(["id" => $Venta->getIdventa()]);