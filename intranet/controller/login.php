<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../models/Usuario.php';

$Usuario = new Usuario;

$Usuario->setUsername(filter_input(INPUT_POST, 'inputUsuario'));

$password = filter_input(INPUT_POST, 'inputPassword');

$Usuario->validarUsuario();

if ($Usuario->getIdusuario()) {
    //usuario existe
    if ($password == $Usuario->getPassword()) {
        //vcontrasrña correcta
        //verificar estado
        if ($Usuario->getEstado() == 1) {
            header("Location: ../contents/form-venta.php");
        }
    }
}