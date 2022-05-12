<?php
require '../tools/Zebra_Session.php';
require_once '../models/Conectar.php';
$conectar = Conectar::getInstancia();
$link = $conectar->getLink();
//var_dump($link);
try {
    $zebra = new Zebra_Session($link, 'sEcUr1tY_c0dE');
    if (isset($_SESSION["tiendaid"])) {
        header("location:index.php");
    }
} catch (Exception $e) {
    echo $e;
}