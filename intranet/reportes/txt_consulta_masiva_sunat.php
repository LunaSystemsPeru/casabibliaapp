<?php
require '../../models/Venta.php';
require '../../tools/Util.php';

array_map('unlink', glob("*.txt"));
array_map('unlink', glob("*.xls*"));

$Venta = new Venta();
$Util = new Util();

$fecha_inicio = '2023-11-01';
$fecha_fin = '2023-11-30';

$lista_cpes = $Venta->verDocumentosPLExFechas($fecha_inicio, $fecha_fin);

$nroitems = $Venta->verDocumentosPLExFechas($fecha_inicio, $fecha_fin)->num_rows;

$file_txt = "CONSULTA_" . $fecha_inicio . "_" . $fecha_fin;
$archivo = fopen($file_txt . ".txt", "w");

foreach ($lista_cpes as $item) {
    $contenido = $item['ruc'] . "|" .
        $Util->zerofill($item['cod_sunat'],2) . "|" .
        $item['serie'] . "|" .
        $item['numero'] . "|" .
        $Util->fecha_mysql_web($item['fecha']) . "|" .
        number_format($item['total'], 2);
    fwrite($archivo, $contenido . PHP_EOL);
}

fclose($archivo);

echo json_encode(["archivos" => $file_txt]);
