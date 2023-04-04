<?php


class DocumentoInternet
{
    private $tipo_documento;
    private $nro_documento;

    /**
     * DocumentoInternet constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->tipo_documento;
    }

    /**
     * @param mixed $tipo_documento
     */
    public function setTipoDocumento($tipo_documento)
    {
        $this->tipo_documento = $tipo_documento;
    }

    /**
     * @return mixed
     */
    public function getNroDocumento()
    {
        return $this->nro_documento;
    }

    /**
     * @param mixed $nro_documento
     */
    public function setNroDocumento($nro_documento)
    {
        $this->nro_documento = $nro_documento;
    }

    public function validar()
    {
        $direccion = "";

        //si es ruc
        if ($this->tipo_documento == 1) {
            $direccion = "https://goempresarial.com/apis/peru-consult-api/public/api/v1/ruc/".$this->nro_documento."?token=abcxyz";
        }

        //si es dni
        if ($this->tipo_documento == 2) {
            $direccion = "https://goempresarial.com/apis/peru-consult-api/public/api/v1/dni/".$this->nro_documento."?token=abcxyz";
        }
        //echo $direccion;


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $direccion);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

        //print_r($data);

        return $data;
    }
}