<?php


use Greenter\Ws\Services\SoapClient;
use Greenter\Ws\Services\ExtService;

require '../vendor/autoload.php';

require '../../models/Empresa.php';

$Empresa = new Empresa();
$Empresa->setIdempresa(1);
$Empresa->obtenerDatos();

// Número de ticket obtenido en el paso anterior.
$ticket = filter_input(INPUT_GET, 'ticket');

// URL del servicio.
$urlService = 'https://e-factura.sunat.gob.pe/ol-ti-itcpfegem/billService';
#https://e-factura.sunat.gob.pe/ol-ti-itcpfegem/billService
#https://e-beta.sunat.gob.pe/ol-ti-itcpfegem-beta/billService
$soap = new SoapClient();
$soap->setService($urlService);
$soap->setCredentials($Empresa->getRuc() . $Empresa->getUsersol(), $Empresa->getClavesol());
$statusService = new ExtService();
$statusService->setClient($soap);

$status = $statusService->getStatus($ticket);

echo "<pre>";

if (!$status->isSuccess()) {
    // Error en la conexion con el servicio de SUNAT
    //var_dump($status);
    echo $status->getError()->getMessage();
    return;
}

$cdr = $status->getCdrResponse();
//file_put_contents('R-20000000001-RC-20200728-1.zip', $status->getCdrZip());
var_dump($cdr);


// Verificar CDR (Resumen aceptado o rechazado)
$code = (int)$cdr->getCode();

if ($code === 0) {
    echo 'ESTADO: ACEPTADA' . PHP_EOL;
    if (count($cdr->getNotes()) > 0) {
        echo 'INCLUYE OBSERVACIONES:' . PHP_EOL;
        // Mostrar observaciones
        foreach ($cdr->getNotes() as $obs) {
            echo 'OBS: ' . $obs . PHP_EOL;
        }
    }

} else if ($code >= 2000 && $code <= 3999) {
    echo 'ESTADO: RECHAZADA' . PHP_EOL;

} else {
    /* Esto no debería darse, pero si ocurre, es un CDR inválido que debería tratarse como un error-excepción. */
    /*code: 0100 a 1999 */
    echo 'Excepción';
}

echo "</pre>";