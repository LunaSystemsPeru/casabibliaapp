<?php
require '../../models/Venta.php';
$Venta = new Venta();

$Venta->setFecha(filter_input(INPUT_POST, 'inputfecha'));
$Venta->setIdtido(filter_input(INPUT_POST, 'selectdocumento'));
$Venta->setSerie(filter_input(INPUT_POST, 'inputserie'));
$Venta->setNumero(filter_input(INPUT_POST, 'inputnumero'));
$Venta->setTotal(filter_input(INPUT_POST, 'inputtotal'));

$Venta->consultaCPE();

if ($Venta->getIdventa()) {
    echo json_encode(["idventa" => $Venta->getIdventa()]);
} else {
    echo json_encode(["idventa" => 0]);
}
