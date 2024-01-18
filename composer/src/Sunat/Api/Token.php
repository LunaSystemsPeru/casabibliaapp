<?php

namespace SunatAPI;

require_once __DIR__ . '/../../../../models/Conectar.php';

use DateInterval;

class Token
{
    private $client_id;
    private $access_token;
    private $expire_date;
    private $conectar;

    /**
     * Token constructor.
     */
    public function __construct()
    {
        $this->client_id = '1';
        $this->conectar = \conectar::getInstancia();
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
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param mixed $access_token
     */
    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @return mixed
     */
    public function getExpireDate()
    {
        return $this->expire_date;
    }

    /**
     * @param mixed $expire_date
     */
    public function setExpireDate($expire_date): void
    {
        $this->expire_date = $expire_date;
    }

    public function addSeconds($seconds)
    {
        $fecha_actual = new \DateTime();
        $this->expire_date = $fecha_actual->add(new DateInterval('PT' . $seconds . 'S'));
        //echo $seconds;
        //print_r($this->expire_date);
   }

    public function validateExpire()
    {
        $sql = "select token from empresas_token where empresa_id = '$this->client_id' and fecha_validez > current_timestamp()";
        //print_r($sql);
        $this->access_token = $this->conectar->get_valor_query($sql, 'token');

    }

    public function insertarToken()
    {
        $fecha_validez = $this->expire_date->format('Y-m-d H:i:s');
        $sql = "update empresas_token set token = '$this->access_token', fecha_validez = date_add(current_timestamp(), interval 3600 second) where empresa_id = '1'";
        //echo $fecha_validez;
        $this->conectar->ejecutar_idu($sql);

    }
}