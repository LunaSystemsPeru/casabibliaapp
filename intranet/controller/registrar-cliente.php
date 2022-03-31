<?php
require '../../models/Cliente.php';

$Cliente = new Cliente();

$Cliente->setDocumento(filter_input(INPUT_POST, "nrodocumento"));
$Cliente->setNombre(filter_input(INPUT_POST, "nombrecliente"));
$Cliente->setDireccion(filter_input(INPUT_POST, "direccioncliente"));
$Cliente->setTelefono(filter_input(INPUT_POST, "telefonocliente"));
$Cliente->obtenerId();
$Cliente->insertar();

echo json_encode(["id" => $Cliente->getIdcliente()]);

