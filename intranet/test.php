<?php
require '../models/Cliente.php';
$Cliente = new Cliente();

$Cliente->setIdcliente(5);
$Cliente->obtenerDatos();

var_dump($Cliente);