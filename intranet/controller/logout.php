<?php
require_once '../../tools/Zebra_Session.php';
require_once '../../models/Conectar.php';

$conectar = Conectar::getInstancia();

$link = $conectar->getLink();
try {
    $zebra = new Zebra_Session($link, 'sEcUr1tY_c0dE');
    $activesession = $zebra->get_active_sessions();
    $zebra->stop();
} catch (Exception $e) {
    echo $e;
}

header("Location: ../login.php");