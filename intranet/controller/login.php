<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require '../../models/Usuario.php';

$Usuario = new Usuario;

$Usuario->setUsername(filter_input(INPUT_POST, 'inputUsuario'));
$password = filter_input(INPUT_POST, 'inputPassword');
$Usuario->validarUsuario();

//usuario existe
if ($Usuario->getIdusuario()) {
    //vcontrasrña correcta
    if ($password == $Usuario->getPassword()) {
        //verificar estado
        if ($Usuario->getEstado() == 1) {
            $Usuario->obtenerDatos();
            $_SESSION['tiendaid'] = $Usuario->getIdalmacen();
            $_SESSION['usuarioid'] = $Usuario->getIdusuario();
            header("Location: ../contents/form-venta.php");
        } else {
            //usuario bloqueado
            header("Location: ../login.php?error=1");
            return false;
        }
    } else {
        //echo "contraseña incorrecta";
        header("Location: ../login.php?error=2");
        return false;
    }
} else {
    header("Location: ../login.php?error=3");
    return false;
}