<?php

namespace SunatAPI;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AuthApi
{
    private $client_id;
    private $cliente_secret;
    private $username;
    private $password;

    /**
     * AuthApi constructor.
     */
    public function __construct()
    {
        $this->setClientId('aeec8046-0581-419c-8017-d0f97ae49713');
        $this->setClienteSecret('Ulk48txJw5F75HDaMkXBnw==');
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getClienteSecret()
    {
        return $this->cliente_secret;
    }

    /**
     * @param mixed $cliente_secret
     */
    public function setClienteSecret($cliente_secret): void
    {
        $this->cliente_secret = $cliente_secret;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @param mixed $destino_api
     */
    private function setDestinoApi($destino_api): void
    {
        $url = "";

    }


    public function getToken($api_consulta): Token
    {
        $Token = new Token();
        $Token->validateExpire();
        //print_r($Token->getAccessToken());
        if ($Token->getAccessToken()) {
            return $Token;
        }

        $formParams = [];
        $urlbase = '';
        $grant_type = '';
        $scope = '';

        if ($api_consulta == 'SIRE') {
            $grant_type = 'password';
            $scope = 'https://api-sire.sunat.gob.pe/';

            $urlbase = 'https://api-seguridad.sunat.gob.pe/v1/clientessol/%s/oauth2/token/';

            $formParams['username'] = $this->username;
            $formParams['password'] = $this->password;
        }

        if ($api_consulta == 'CPE') {
            $grant_type = 'client_credentials';
            $scope = 'https://api.sunat.gob.pe/v1/contribuyente/contribuyentes';

            $urlbase = 'https://api-seguridad.sunat.gob.pe/v1/clientesextranet/%s/oauth2/token/';
        }

        $urlfinal = sprintf($urlbase, $this->client_id);

        $formParams['grant_type'] = $grant_type;
        $formParams['scope'] = $scope;
        $formParams['client_id'] = $this->client_id;
        $formParams['client_secret'] = $this->cliente_secret;

        $client = new Client();
        try {
            $response = $client->post($urlfinal, [
                'timeout' => 10,
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'User-Agent' => 'Greenter-Client/1.0.0/PHP'
                ],
                'form_params' => $formParams
            ]);
        } catch (GuzzleException $e) {
            print_r($e->getMessage());
        }

        $tokenfinal = json_decode($response->getBody()->getContents());

        $Token->setAccessToken($tokenfinal->access_token);
        $Token->addSeconds($tokenfinal->expires_in);
        $Token->insertarToken();
        return $Token;
    }
}