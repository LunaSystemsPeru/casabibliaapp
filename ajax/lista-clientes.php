<?php
require '../models/Cliente.php';
$Cliente = new Cliente();

$searchTerm = filter_input(INPUT_GET, 'term');

$resultados = $Cliente->buscarClientes($searchTerm);

$array_resultado = array();
foreach ($resultados as $value) {
    $fila = array();
    $fila['value'] = trim($value['documento']) . " | " . trim($value['nombre']);
    $fila['clienteid'] = $value['id_cliente'];
    $fila['documento'] = $value['documento'];
    $fila['nombre'] = trim($value['nombre']);
    $fila['direccion'] = $value['direccion'];
    array_push($array_resultado, $fila);
}
echo json_encode($array_resultado);