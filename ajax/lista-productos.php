<?php
require '../models/Producto.php';
$Producto = new Producto();


$searchTerm = filter_input(INPUT_GET, 'term');

$resultados = $Producto->buscarProductos($searchTerm);

$array_resultado = array();
foreach ($resultados as $value) {
    $fila = array();
    $fila['value'] = trim($value['descripcion']) . " COD: " . $value['cod_externo']  . " | P.Venta S/ : " . $value['precio'];
    $fila['codexterno'] = $value['cod_externo'];
    $fila['idproducto'] = $value['id_producto'];
    $fila['descripcion'] = trim($value['descripcion']);
    $fila['precio'] = $value['precio'];
    $fila['afecto'] = $value['afecto_igv'];
    array_push($array_resultado, $fila);
}
echo json_encode($array_resultado);



