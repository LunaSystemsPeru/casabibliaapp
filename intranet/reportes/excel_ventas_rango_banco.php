<?php
require '../../models/Venta.php';
require '../../models/Empresa.php';
require '../../tools/SimpleXLSXGen.php';

$Venta = new Venta();
$Empresa = new Empresa();

$fechainicio = filter_input(INPUT_GET, 'fechainicio');
$fechafinal = filter_input(INPUT_GET, 'fechafinal');
$arrayVentas = $Venta->verVentasBanco($fechainicio, $fechafinal);

$Empresa->setIdempresa(1);
$Empresa->obtenerDatos();

//estructura titulos tabla
$books = array();

$fila = [
    'RUC',
    "",
    "",
    "",
    "",
    $Empresa->getRuc()
];
$books[] = $fila;

$fila = [
    'Razon Social',
    "",
    "",
    "",
    "",
    $Empresa->getRazon()
];
$books[] = $fila;


$fila = ['Item',
    'Fecha Venta',
    'Tienda',
    'Doc Venta',
    'Doc Cliente',
    'Nombre Cliente',
    'Producto',
    'Precio Unit ',
    'Cantidad',
    'Parcial Venta'];
$books[] = $fila;

$nrofila = 0;
$totalbase = 0;
$totaligv = 0;
$totalexonerado = 0;
$totalgeneral = 0;
foreach ($arrayVentas as $fila) {
    $nrofila++;
    $fila = [
        $nrofila,
        $fila['fecha'],
        $fila['ntienda'],
        $fila['abreviado'] . " | " . $fila['serie'] . " - " . $fila['numero'],
        $fila['documento'],
        $fila['ncliente'],
        $fila['descripcion'],
        number_format($fila['precio'], 2),
        $fila['cantidad'],
        number_format($fila['precio'] * $fila['cantidad'], 2)
    ];
    $books[] = $fila;
}
/*
$fila = [
    "",
    "",
    "",
    "",
    "",
    "",
    "",
    "",
    "",
    number_format($totalbase, 2),
    number_format($totalexonerado, 2),
    number_format($totaligv, 2),
    number_format($totalgeneral, 2),
    ""
];
$books[] = $fila;*/


$xlsx = SimpleXLSXGen::fromArray($books);
$xlsx->saveAs('reporte_banco_' . $fechainicio . "_" . $fechafinal . '.xlsx');

echo json_encode(['name' => 'reporte_banco_' . $fechainicio . "_" . $fechafinal . '.xlsx']);
