<?php
require '../models/Venta.php';

$Venta = new Venta();

$Venta->setIdventa(filter_input(INPUT_POST, 'id'));
echo $Venta->obtenerDatosJson();