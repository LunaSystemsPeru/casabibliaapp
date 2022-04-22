<?php
require '../../models/Venta.php';
require '../../models/Empresa.php';
require '../../tools/SimpleXLSXGen.php';

$Venta = new Venta();
$Empresa = new Empresa();

$fecha = filter_input(INPUT_GET, 'fecha');
$fecha = date("Y-m-d");
$arrayVentas = $Venta->verDocumentosPLE($fecha);

$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);

$periodo = $anio.$mes;

$Empresa->setIdempresa(1);
$Empresa->obtenerDatos();

//estructura titulos tabla
$books = array();

$fila = [
  'RUC',
  $Empresa->getRuc()
];
$books[] = $fila;

$fila = [
    'Razon Social',
    $Empresa->getRazon()
];
$books[] = $fila;

$fila = [
    'Periodo:',
    '202204'
];
$books[] = $fila;

$fila = ['Item',
    'Fecha Doc',
    'Doc Venta (COD SUNAT)',
    'Doc Venta (Abreviado)',
    'Serie',
    'Numero',
    'Tipo Cliente (SUNAT)',
    'DNI o RUC',
    'Apellidos y Nombres o Razon Social',
    'Base Gravado',
    'Total Exonerado',
    'IGV',
    'Total',
    'Tipo Cambio',
    'Fecha Doc Ref',
    'Tipo Doc Ref',
    'Serie Doc Ref',
    'Numero Doc Ref'];
$books[] = $fila;

$nrofila = 0;
foreach ($arrayVentas as $fila) {
    $clientesunat = "0";
    if (strlen($fila['documento']) == 11) {
        $clientesunat = '6';
    }
    if (strlen($fila['documento']) == 8) {
        $clientesunat = '1';
    }
    $doccliente = $fila['documento'];
    $nomcliente = $fila['nombre'];
    $total = $fila['total'];
    $igv = $fila['igv'];
    $basegravado = $igv / 0.18;
    $exonerado = $total - $igv - $basegravado;

    if ($fila['estado'] == 2) {
        $doccliente = "00000000000";
        $nomcliente = "**** DOCUMENTO ANULADO ****";
        $total = 0;
        $igv = 0;
        $basegravado = 0;
        $exonerado = 0;
    }
    //echo "<pre>";
    //print_r($fila);
    //echo "</pre>";
    $nrofila++;
    $fila = [
        $nrofila,
        $fila['fecha'],
        $fila['cod_sunat'],
        $fila['abreviado'],
        $fila['serie'],
        $fila['numero'],
        $clientesunat,
        $doccliente,
        $nomcliente,
        number_format($basegravado, 2),
        number_format($exonerado, 2),
        number_format($igv, 2),
        number_format($total, 2),
        number_format(1.000, 3)
    ];
    $books[] = $fila;
}
$xlsx = SimpleXLSXGen::fromArray($books);
$xlsx->saveAs($Empresa->getRuc()."-".$periodo.'.xlsx');

echo "archivo generado";
