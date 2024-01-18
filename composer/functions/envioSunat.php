<?php
date_default_timezone_set('America/Lima');

require '../../models/Venta.php';
require '../../models/VentaAnulada.php';
require '../../tools/Util.php';
require 'consultaCPE.php';

$Venta = new Venta();
$VentaAnulada = new VentaAnulada();
$Util = new Util();
$ConsultaCPE = new consultaCPE();

//establecer fecha de 5 dias
$fecha_fin = date('Y-m-d');
$fecha_inicio = date("Y-m-d", strtotime($fecha_fin . "- 7 days"));

//echo $fecha_fin . " - " . $fecha_inicio . PHP_EOL;

//enviar validar cpes
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

//enviar resumen de activos segun fechas
$lista_fechas_activos = $Venta->verFechasBoletasPendientesSunat($fecha_inicio, $fecha_fin);

foreach ($lista_fechas_activos as $item) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://174.138.2.254/casabiblia/composer/generateXML/resumen-activos.php?empresaid=' . $item['id_empresa'] . "&fecha=" . $item['fecha']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);

    print_r($data) . PHP_EOL;
}

//enviar resumen de anulados segun fechas
$lista_fechas_anulados_B = $VentaAnulada->verVentasAnuladasFechas('B', $fecha_inicio, $fecha_fin);

foreach ($lista_fechas_anulados_B as $item) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://174.138.2.254/casabiblia/composer/generateXML/resumen-anulados.php?empresaid=' . $item['id_empresa'] . "&fecha=" . $item['fecha']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);

    print_r($data) . PHP_EOL;
}

//enviar comprobantes de baja segun fechas
$lista_fechas_anulados_F = $VentaAnulada->verVentasAnuladasFechas('F', $fecha_inicio, $fecha_fin);

foreach ($lista_fechas_anulados_F as $item) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://174.138.2.254/casabiblia/composer/generateXML/comunicacion-baja.php?empresaid=' . $item['id_empresa'] . "&fecha=" . $item['fecha']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);

    print_r($data) . PHP_EOL;
}