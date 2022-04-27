<?php
require '../../models/Caja.php';
require '../fixed/SessionActiva.php';

$Caja  = new Caja();

$Caja->setIdalmacen($_SESSION['tiendaid']);
$Caja->setFecha(filter_input(INPUT_POST, 'inputfecha'));
$Caja->setMapertura(filter_input(INPUT_POST, 'inputMonto'));
$Caja->insertar();


header("Location: ../contents/lista-caja-diaria.php");