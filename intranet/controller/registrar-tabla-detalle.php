<?php
require '../../models/TablaGeneralDetalle.php';
$tdetalle = new TablaGeneralDetalle();
$tdetalle->obtenerId();

$tdetalle->setValor(filter_input(INPUT_POST, 'input_valor'));
$tdetalle->setDescripcion(filter_input(INPUT_POST, 'input_descripcion'));
$tdetalle->setIdtabla(filter_input(INPUT_POST, 'input_id_tabla'));

$tdetalle->insertar();

header("Location: ../lista-tabla-general.php?idtabla=" . $tdetalle->getIdtabla());
