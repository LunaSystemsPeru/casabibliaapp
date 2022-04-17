<?php
require '../fixed/SessionActiva.php';
require '../../models/VentaNota.php';
require '../../models/DocumentoTienda.php';
require '../../models/Venta.php';

$Nota = new VentaNota();
$VReferencia = new Venta();
$Venta = new Venta();
$Documento = new DocumentoTienda();

$VReferencia->setIdventa(filter_input(INPUT_POST, 'inputId'));
$VReferencia->obtenerDatos();

//var_dump($_REQUEST);

$Venta->setIdusuario($_SESSION['usuarioid']);
$Venta->setIdalmacen($VReferencia->getIdalmacen());
$Venta->setIdcliente($VReferencia->getIdcliente());
$Venta->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$Venta->setIdcliente($VReferencia->getIdcliente());
$Venta->setIdtido(6);
$Venta->setSerie($VReferencia->getSerie());
//obtener nro de documento
$Documento->setIddocumento($Venta->getIdtido());
$Documento->setIdtienda($Venta->getIdalmacen());
$Documento->setSerie($VReferencia->getSerie());
$Documento->obtenerNumero();
$Venta->setNumero($Documento->getNumero());
$Venta->setTotal($VReferencia->getTotal());
$Venta->setPagado($VReferencia->getTotal() * -1);
$Venta->setAfectoigv($VReferencia->getAfectoigv());
$Venta->setTipoventa($VReferencia->getTipoventa());
$Venta->setEstado(1);
$Venta->setIdpedido(0);
$Venta->setIgv($VReferencia->getIgv());
$Venta->setAceptadoSunat(0);
$Venta->obtenerId();
$Venta->insertar();

$Nota->setNotaid($Venta->getIdventa());
$Nota->setReferenciaid($VReferencia->getIdventa());
$Nota->setFecha($VReferencia->getFecha());
$Nota->insertar();

//generar xml
$url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
$rutabase = dirname(dirname(dirname($url))) . DIRECTORY_SEPARATOR;
$respuestaCurl = "";
$nombreXML = "nota-credito";
$ch = curl_init($rutabase . "composer/generateXML/" . $nombreXML . ".php?id=" . $Venta->getIdventa());

curl_setopt($ch, CURLOPT_HEADER, 0);
$result = curl_exec($ch);
$errorcurl = "";

if ($result === false) {
    $erroremail = 'Curl error: ' . curl_error($ch);
} else {
    $respuestaCurl = $result;
}
curl_close($ch);

header("Location: ../contents/reporte-pdf-documento-venta.php?ventaid=" . $Venta->getIdventa());
