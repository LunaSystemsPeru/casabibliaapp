<?php
require_once 'Conectar.php';

class usuario
{
private $idusuario;
private $username;
private $password;
private $nrodocumento;
private $datos;
private $email;
private $celular;
private $idalmacen;
private $estado;
private $conectar;

    /**
     * usuario constructor.
     */
    public function __construct()
    {
        $this->conectar = conectar::getInstancia();
    }

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
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
    public function setUsername($username)
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
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getNrodocumento()
    {
        return $this->nrodocumento;
    }

    /**
     * @param mixed $nrodocumento
     */
    public function setNrodocumento($nrodocumento)
    {
        $this->nrodocumento = $nrodocumento;
    }

    /**
     * @return mixed
     */
    public function getDatos()
    {
        return $this->datos;
    }

    /**
     * @param mixed $datos
     */
    public function setDatos($datos)
    {
        $this->datos = $datos;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getIdalmacen()
    {
        return $this->idalmacen;
    }

    /**
     * @param mixed $idalmacen
     */
    public function setIdalmacen($idalmacen)
    {
        $this->idalmacen = $idalmacen;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function validarUsuario () {
        $sql = "select id_usuarios, password, estado 
                from usuarios 
                where username = '$this->username'";
        echo $sql;
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idusuario = $fila['id_usuarios'];
            $this->password = $fila['password'];
            $this->estado = $fila['estado'];
        }
    }

    public function obtenerId()
    {
        $sql = "select ifnull(max(id_usuarios) + 1, 1) as codigo 
            from usuarios";
        $this->idusuario = $this->conectar->get_valor_query($sql, 'codigo');
    }

    public function insertar()
    {
        $sql = "insert into usuarios 
        values ('$this->idusuario', 
                '$this->username',
                '$this->password',
                '$this->nrodocumento',
                '$this->datos',                
                '$this->email',
                '$this->celular',
                '$this->idalmacen',
                '$this->estado')";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function modificar()
    {
        $sql = "update usuarios 
        set username = '$this->username',            
            password = '$this->password',
            nro_documento = '$this->nrodocumento',            
            datos = '$this->datos',                     
            email = '$this->email',
            celular = '$this->celular',            
            id_almacen = '$this->idalmacen',                 
            estado = '$this->estado',
       where id_usuarios = '$this->idusuario'";
        return $this->conectar->ejecutar_idu($sql);
    }

    public function obtenerDatos()
    {
        $sql = "select * from usuarios 
        where id_usuarios = '$this->idusuario'";
        $fila = $this->conectar->get_Row($sql);
        if ($fila) {
            $this->idusuario = $fila['id_usuarios'];
            $this->username = $fila['username'];
            $this->password = $fila['password'];
            $this->nrodocumento = $fila['nro_documento'];
            $this->datos = $fila['datos'];
            $this->email = $fila['email'];
            $this->celular = $fila['celular'];
            $this->idalmacen = $fila['id_almacen'];
            $this->estado = $fila['estado'];
        }
    }

    public function verFilas()
    {
        $sql = "select * from usuarios 
                where id_usuarios = '$this->idusuario' ";
        return $this->conectar->get_Cursor($sql);
    }

}