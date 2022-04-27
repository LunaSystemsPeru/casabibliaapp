<?php
require '../fixed/SessionActiva.php';
require '../../models/MovimientoDinero.php';

$Movimiento = new MovimientoDinero();

$Movimiento->setMotivo(filter_input(INPUT_POST, 'inputDescripcion'));
$tipo = filter_input(INPUT_POST, 'optradio');
$monto = filter_input(INPUT_POST, 'inputMonto');
$Movimiento->setFecha(date("Y-m-d"));
$Movimiento->setIdalmacen($_SESSION['tiendaid']);
$Movimiento->setIdusuario($_SESSION['usuarioid']);

if ($tipo == 1) {
    $Movimiento->setIngresa($monto);
    $Movimiento->setRetira(0);
}

if ($tipo == 2) {
    $Movimiento->setIngresa(0);
    $Movimiento->setRetira($monto);
}

$Movimiento->obtenerId();
$Movimiento->insertar();

header("Location: ../contents/lista-caja-diaria.php");