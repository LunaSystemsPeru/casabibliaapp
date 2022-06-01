<?php
require '../models/Cliente.php';
require '../models/DocumentoInternet.php';

$c_cliente = new Cliente();
$c_internet = new DocumentoInternet();

$documento = filter_input(INPUT_POST, 'documento');
$resultado = [];

$c_cliente->setDocumento($documento);
//$c_cliente->setIdEmpresa($_SESSION['id_empresa']);
/*
if ($c_cliente->verificarDocumento()) {
    $c_cliente->obtenerDatos();
    $resultado["success"] = "existe";
    $resultado["documento"] = $c_cliente->getDocumento();
    $resultado["datos"] = $c_cliente->getDatos();
    $resultado["direccion"] = $c_cliente->getDireccion();
} else {
*/
if (strlen($documento) == 8) {
    $c_internet->setTipoDocumento(2);
}
if (strlen($documento) == 11) {
    $c_internet->setTipoDocumento(1);
}
$c_internet->setNroDocumento($documento);
$respuesta = json_decode($c_internet->validar(), true);

if ($c_internet->getTipoDocumento() == 2) {
    if (!$respuesta) {
        $resultado["success"] = "error";
        $resultado["documento"] = $documento;
        $resultado["datos"] = "error de documento";
        $resultado["direccion"] = "";
    } else {
        $resultado["success"] = "nuevo";
        $resultado["documento"] = $respuesta["dni"];
        //$resultado["datos"] = $respuesta["apellidoPaterno"] . " " . $respuesta["apellidoMaterno"] . " " . $respuesta["nombres"];
        $resultado["datos"] = $respuesta["nombre"];
        $resultado["direccion"] = "-";
    }
}

if ($c_internet->getTipoDocumento() == 1) {
    if (!$respuesta) {
        $resultado["success"] = "error";
        $resultado["documento"] = $documento;
        $resultado["datos"] = "error de documento";
        $resultado["direccion"] = "";
    } else {
        $resultado["success"] = "nuevo";
        $resultado["documento"] = $respuesta["ruc"];
        $resultado["datos"] = $respuesta["razonSocial"];
        $resultado["direccion"] = $respuesta["direccion"];
    }
}
echo json_encode($resultado);
