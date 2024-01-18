<?php

use SunatAPI\AuthApi;
use SunatAPI\CPE;

require __DIR__.'/../vendor/autoload.php';

class consultaCPE
{
    public function consultarCURL($json)
    {
        //sleep(2);
        //echo 'https://lunasystemsperu.com/clientes/lunafact/intranet/composer/functions/consulta_comprobantes_cpe.php?json=' . $json . PHP_EOL;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://lunasystemsperu.com/clientes/lunafact/intranet/composer/functions/consulta_comprobantes_cpe.php?json=' . $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        $data = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($data);

        $estadoCP = 0;

        $object = (object) $data;
        if (isset($object->data->estadoCp)) {
            $estadoCP = $object->data->estadoCp;
        }

        return $estadoCP;
    }

    public function consultaDirecta ($json) {
        $AuthApi = new AuthApi();
        $CPE = new CPE;

        $Token = $AuthApi->getToken('CPE');
        $response_sunat = $CPE->sendJSON($json, $Token);

        //$data = json_decode($response_sunat);
        $data = $response_sunat;

        //print_r($data);
        $estadoCP = 0;

        $object = (object) $data;
        if (isset($object->data->estadoCp)) {
            $estadoCP = $object->data->estadoCp;
        }

        return $estadoCP;
    }
}