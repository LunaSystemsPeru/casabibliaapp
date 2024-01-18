<?php
date_default_timezone_set('America/Lima');

require '../../models/Venta.php';
require '../../tools/Util.php';
require 'consultaCPE.php';

$Venta = new Venta();
$Util = new Util();
$ConsultaCPE = new consultaCPE();

//fechas entre rango de 5 dias a la fecha
//$fecha_fin = date('Y-m-d');
//$fecha_inicio = date("Y-m-d", strtotime($fecha_fin . "- 5 days"));

echo date('H:i:s') . PHP_EOL;

//mostrar todos los comprobantes
$fecha_inicio = '2024-01-01';
$fecha_fin = '2024-01-16';

$lista_cpes = $Venta->verDocumentosPLExFechas($fecha_inicio, $fecha_fin);

foreach ($lista_cpes as $item) {

    //e.ruc, ds.cod_sunat, v.serie, v.numero, v.fecha, v.total, v.estado, v.id_ventas, v.aceptadosunat
    $array_CPE = [
        "numRuc" => $item['ruc'],
        "codComp" => $Util->zerofill($item['cod_sunat'], 2),
        "numeroSerie" => $item['serie'],
        "numero" => $item['numero'],
        "fechaEmision" => $Util->fecha_mysql_web($item['fecha']),
        "monto" => number_format($item['total'], 2)
    ];

    $jsoncpe = json_encode($array_CPE);

    $valor_respuesta = "";

    $estadoCP = $ConsultaCPE->consultaDirecta($jsoncpe);

    $estadocomprobante = 0;

    if ($estadoCP == "0") {
        $estadocomprobante = 0;
        if ($item['estado'] != 1) {
            $estadocomprobante = 1;
        } else {
            $valor_respuesta = " Comprobante no existe en sunat ";
        }
    }
    if ($estadoCP == "1" || $estadoCP == "2") {
        $estadocomprobante = 1;
        if ($estadoCP == "1" && $item['estado'] == 2) {
            $estadocomprobante = 2;
            $valor_respuesta = " Comprobante no esta anulado en sunat ";
        }
    }

    echo $jsoncpe . $valor_respuesta . PHP_EOL;

    $Venta->setIdventa($item['id_ventas']);
    $Venta->setAceptadoSunat($estadocomprobante);
    $Venta->aceptacionSunat();

}

echo date('H:i:s');