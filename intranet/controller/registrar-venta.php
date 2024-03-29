<?php
require '../fixed/SessionActiva.php';
require '../../models/Venta.php';
require '../../models/VentaProducto.php';
require '../../models/DocumentoTienda.php';
require '../../models/VentaPago.php';

$Venta = new Venta();
$ProductoVenta = new VentaProducto();
$DocumentoTienda = new DocumentoTienda();
$PagoVenta = new VentaPago();

$Venta->setFecha(filter_input(INPUT_POST, 'inputFecha'));
$Venta->setIdalmacen($_SESSION['tiendaid']);
$Venta->setIdusuario($_SESSION['usuarioid']);
$Venta->setIdtido(filter_input(INPUT_POST, 'inputTido'));

//get serie y numero
$DocumentoTienda->setIdtienda($Venta->getIdalmacen());
$DocumentoTienda->setIddocumento($Venta->getIdtido());
$DocumentoTienda->obtenerDatos();
$Venta->setSerie($DocumentoTienda->getSerie());
$Venta->setNumero($DocumentoTienda->getNumero());

$Venta->setIdcliente(filter_input(INPUT_POST, 'inputClienteId'));

if (!filter_input(INPUT_POST, 'inputClienteId')) {
    $Venta->setIdcliente(2);
}
$Venta->setTotal(0); //llenar por trigger en producto venta
$Venta->setPagado(0);
$Venta->setAfectoigv(0);
$Venta->setTipoventa(1);
$Venta->setEstado(1);
$Venta->setIdpedido(0);
$Venta->setIgv(0);
$Venta->setAceptadoSunat(0);

$Venta->obtenerId();
$Venta->insertar();

$jsonProductos = filter_input(INPUT_POST, 'arrayProductos');
$arrayProductos = json_decode($jsonProductos, false);

$ProductoVenta->setIdventa($Venta->getIdventa());

foreach ($arrayProductos as $item) {
    $ProductoVenta->setIdproducto($item->idproducto);
    $ProductoVenta->setCantidad($item->cantidad);
    $ProductoVenta->setPrecio($item->precio);
    $ProductoVenta->setCosto($item->costo);
    $ProductoVenta->insertar();
}

//guardar pagos;
$PagoVenta->setIdventa($Venta->getIdventa());
$PagoVenta->setFecha($Venta->getFecha());

if (filter_input(INPUT_POST, 'pagoEfectivo') > 0) {
    $PagoVenta->setTipopago(1);
    $PagoVenta->setMonto(filter_input(INPUT_POST, 'pagoEfectivo'));
    $PagoVenta->obtenerId();
    $PagoVenta->insertar();
}

if (filter_input(INPUT_POST, 'pagoTarjeta') > 0) {
    $PagoVenta->setTipopago(2);
    $PagoVenta->setMonto(filter_input(INPUT_POST, 'pagoTarjeta'));
    $PagoVenta->obtenerId();
    $PagoVenta->insertar();
}

if ($Venta->getIdventa()) {
    $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    $rutabase = dirname(dirname(dirname($url))) . DIRECTORY_SEPARATOR;
    $respuestaCurl = "";
    if ($Venta->getIdtido() == 5 || $Venta->getIdtido() == 4) {
        $nombreXML = "factura";
        if ($Venta->getIdtido() == 5) {
            $nombreXML = "boleta";
        }

        //echo $rutabase . "composer/generateXML/" . $nombreXML . ".php?id=" . $Venta->getIdventa();

        $ch = curl_init($rutabase . "composer/generateXML/" . $nombreXML . ".php?id=" . $Venta->getIdventa());

        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        $errorcurl = "";

        if ($result === false) {
            $erroremail = 'Curl error: ' . curl_error($ch);
            $Venta->setEstado(2);
            $Venta->cambiarVenta();
            echo json_encode(["id" => 0, "respuesta" => false]);
            return;
        } else {
            $respuestaCurl = $result;
        }
        curl_close($ch);
    }

    echo json_encode(["id" => $Venta->getIdventa(), "respuesta" =>$respuestaCurl]);
} else {
    echo json_encode(["id" => 0, "respuesta" => false]);
}
