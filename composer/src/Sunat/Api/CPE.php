<?php
namespace SunatAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class CPE
{


    /**
     * CPE constructor.
     */
    public function __construct()
    {
    }

    public function sendJSON ($json, Token $Token) {
        $uri = 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes/10469932091/validarcomprobante';

       $client = new Client();
        try {
            $response = $client->post($uri, [
                'timeout' => 15,
                'headers' => [
                    'Authorization' => 'Bearer ' . $Token->getAccessToken(),
                    'Content-Type' => 'application/json',
                    'User-Agent' => 'PostmanRuntime/7.33.0'
                ],
                'body' => $json
            ]);
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }

        $contents = $response->getBody()->getContents();
        return json_decode($contents);
    }
}