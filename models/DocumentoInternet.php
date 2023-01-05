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
            $direccion = "http://174.138.2.254/apis/public/consultaRUC.php?ruc=" . $this->nro_documento;
        }

        //si es dni
        if ($this->tipo_documento == 2) {
            $direccion = "http://174.138.2.254/apis/public/consultaDNI.php?dni=" . $this->nro_documento;
        }


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $direccion);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);

       // print_r($data);

        return $data;
    }
}