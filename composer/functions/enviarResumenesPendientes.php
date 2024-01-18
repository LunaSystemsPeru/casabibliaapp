<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../models/Venta.php';
require '../../tools/Util.php';

$Venta = new Venta();
$Util = new Util();

$fecha_inicio = '2024-01-01';
$fecha_fin = '2024-01-16';

//consultar fechas pendientes de envio de un periodo

$lista_fechas = $Venta->verFechasBoletasPendientesSunat($fecha_inicio, $fecha_fin);

echo "<pre>";
//recorrer fecha y enviar por curl cada resumen
foreach ($lista_fechas as $item) {
    print_r($item);
    echo 'http://174.138.2.254/casabiblia/composer/generateXML/resumen-activos.php?empresaid=' . $item['id_empresa'] . "&fecha=" . $item['fecha'] . "<br>";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://174.138.2.254/casabiblia/composer/generateXML/resumen-activos.php?empresaid=' . $item['id_empresa'] . "&fecha=" . $item['fecha']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);

    print_r($data);
    echo "<br>";
}

echo "</pre>";