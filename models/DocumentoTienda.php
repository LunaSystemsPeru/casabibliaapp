<?php
require_once 'Conectar.php';

class DocumentoTienda
{
private $iddocumento;
private $idtienda;
private $serie;
private $numero;
private $conectar;

    /**
     * DocumentoTienda constructor.
     */
    public function __construct()
    {
        $this->conectar = Conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIddocumento()
    {
        return $this->iddocumento;
    }

    /**
     * @param mixed $iddocumento
     */
    public function setIddocumento($iddocumento)
    {
        $this->iddocumento = $iddocumento;
    }

    /**
     * @return mixed
     */
    public function getIdtienda()
    {
        return $this->idtienda;
    }

    /**
     * @param mixed $idtienda
     */
    public function setIdtienda($idtienda)
    {
        $this->idtienda = $idtienda;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function verDocumentosVenta()
    {
        $sql = "select da.id_tido, ds.descripcion, ds.cod_sunat 
                from documentos_almacen as da 
                inner join documentos_sunat ds on da.id_tido = ds.id_tido
                where da.id_almacen = '$this->idtienda' and da.id_tido in (2,4,5)";
        return $this->conectar->get_Cursor($sql);
    }
}