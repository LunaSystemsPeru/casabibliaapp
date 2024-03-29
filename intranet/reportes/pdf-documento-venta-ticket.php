<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require '../fixed/SessionActiva.php';
require '../../tools/fpdf/fpdf.php';
define('FPDF_FONTPATH', '../../tools/fpdf/font/');


require '../../models/Venta.php';
require '../../models/Empresa.php';
require '../../models/Almacen.php';
require '../../models/Cliente.php';
require '../../models/VentaProducto.php';
require '../../models/DocumentoSunat.php';
require '../../models/VentaSunat.php';
require '../../models/VentaNota.php';

require '../../tools/Util.php';
require '../../tools/NumerosaLetras.php';

$Util = new Util();
$NumeroLetras = new NumerosaLetras();

$ventaid = filter_input(INPUT_GET, 'ventaid', FILTER_SANITIZE_NUMBER_INT);

$Venta = new Venta();
$Venta->setIdventa($ventaid);
$Venta->obtenerDatos();

$VRefencia = new Venta();
$Nota = new VentaNota();
if ($Venta->getIdtido() == 6) {
    $Nota->setNotaid($Venta->getIdventa());
    $Nota->obtenerDatos();
    $VRefencia->setIdventa($Nota->getReferenciaid());
    $VRefencia->obtenerDatos();
}

$SunatVenta = new VentaSunat();
$SunatVenta->setVentaid($Venta->getIdventa());
$SunatVenta->obtenerDatos();

$Cliente = new Cliente();
$Cliente->setIdcliente($Venta->getIdcliente());
$Cliente->obtenerDatos();

$Tienda = new Almacen();
$Tienda->setIdalmacen($Venta->getIdalmacen());
$Tienda->obtenerDatos();

$Empresa = new Empresa();
$Empresa->setIdempresa($Tienda->getIdempresa());
$Empresa->obtenerDatos();

$DocumentoSunat = new DocumentoSunat();
$DocumentoSunat->setIdtido($Venta->getIdtido());
$DocumentoSunat->obtenerDatos();

$ProductoVenta = new VentaProducto();
if ($Venta->getIdtido() == 6) {
    $ProductoVenta->setIdventa($VRefencia->getIdventa());
} else {
    $ProductoVenta->setIdventa($Venta->getIdventa());
}
$arrayProducto = $ProductoVenta->verFilas();

$pdf = new FPDF('P', 'mm', array(76, 350));
$pdf->SetMargins(6, 8, 6);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$altura_linea = 4;

$pdf->Image('../../assets/images/casabiblialogo.png', $pdf->GetX(), $pdf->GetY(), 64, 16);

$pdf->Ln(18);

//$pdf->SetFont('Arial', '', 12);
//$pdf->SetTextColor(00, 00, 0);
//$pdf->Cell(64, $altura_linea, "**** CASA DE LA BIBLIA ****", 0, 1, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->MultiCell(64, $altura_linea-1, htmlentities($Empresa->getRuc() . " | " . $Empresa->getRazon()), 0, 'C');
$pdf->MultiCell(64, $altura_linea-1, htmlentities($Tienda->getDireccion() . " - " . $Tienda->getDepartamento() . " - " . $Tienda->getProvincia() . " - " . $Tienda->getDistrito()), 0, 'C');
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(64, $altura_linea, $DocumentoSunat->getDescripcion() . " ELECTRONICA", 0, 1, 'C');
$pdf->Cell(64, $altura_linea, $Venta->getSerie() . "-" . $Util->zerofill($Venta->getNumero(), 8), 0, 1, 'C');
$pdf->MultiCell(64, $altura_linea, htmlentities("CLIENTE: " . $Cliente->getNombre()), 0, 'L');
$pdf->Cell(64, $altura_linea, "DNI / RUC: " . $Cliente->getDocumento(), 0, 1, 'L');
$pdf->Cell(64, $altura_linea, "Fecha: " . $Venta->getFecha(), 0, 1, 'L');
$pdf->Ln();

if ($Venta->getIdtido() == 6) {
    $pdf->Cell(64, $altura_linea, "DOC. REFERENCIA: " . $VRefencia->getSerie() . "-". $VRefencia->getNumero(), 0, 1, 'L');
    $pdf->Cell(64, $altura_linea, "MOTIVO: ANULACION DE LA OPERACION", 0, 1, 'L');
    $pdf->Ln();
}

$totalBaseIGV = 0;
$totalBase = 0;
foreach ($arrayProducto as $item) {
    $base = 0;
    $base = $item['cantidad'] * $item['precio'];
    $pdf->MultiCell(64, $altura_linea, htmlentities($item['descripcion']), 0, 'J');
    $pdf->SetX(30);
    $pdf->Cell(10, $altura_linea, $item['cantidad'] . "X", 0, 0, 'L');
    if ($item['afecto_igv'] == 0) {
        $pdf->Cell(5, $altura_linea, "*", 0, 0, 'L');
        $totalBaseIGV = $totalBaseIGV + ($base / 1.18);
    } else {
        $pdf->Cell(5, $altura_linea, "", 0, 0, 'L');
        $totalBase = $totalBase + ($base);
    }
    $pdf->Cell(17, $altura_linea, number_format($item['precio'], 2), 0, 0, 'L');
    $pdf->Cell(10, $altura_linea, number_format($base, 2), 0, 1, 'R');
}
$pdf->Ln();

if ($Venta->getIdtido() != 2) {

    $pdf->Cell(35, $altura_linea, "OP. GRAVADA: ", 0, 0, 'L');
    $pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
    $pdf->Cell(24, $altura_linea, number_format($totalBaseIGV, 2), 0, 1, 'R');

    $pdf->Cell(35, $altura_linea, "OP. EXONERADA: ", 0, 0, 'L');
    $pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
    $pdf->Cell(24, $altura_linea, number_format($totalBase, 2), 0, 1, 'R');

    $pdf->Cell(35, $altura_linea, "IGV: ", 0, 0, 'L');
    $pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
    $pdf->Cell(24, $altura_linea, number_format($totalBaseIGV * 0.18, 2), 0, 1, 'R');

}

$totalGeneral = $totalBaseIGV * 1.18 + $totalBase;

$pdf->Cell(35, $altura_linea, "IMPORTE TOTAL: ", 0, 0, 'L');
$pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
$pdf->Cell(24, $altura_linea, number_format($totalGeneral, 2), 0, 1, 'R');

$pdf->MultiCell(64, $altura_linea, "SON: " . htmlentities($NumeroLetras->to_word(number_format($totalGeneral, 2), "PEN")), 0, 'L');

$pdf->Ln(2);
if ($SunatVenta->getNombreDocumento()) {
    $pdf->Image('../../generate_qr/temp/' . $SunatVenta->getNombreDocumento() . '.png', $pdf->GetX(), $pdf->GetY(), 34, 34);
    $pdf->Ln(35);
    $pdf->MultiCell(64, $altura_linea, "Hash: " . $SunatVenta->getHash(), 0, 'C');
    $pdf->Ln(3);
}

if ($Venta->getIdtido() != 2) {
    $pdf->MultiCell(64, $altura_linea, "Representacion Impresa de la " . $DocumentoSunat->getDescripcion() . " Electronica, esta puede ser consultada en www.casabibliachimbote.ga", 0, 'C');
}

$nombrePDF = $Empresa->getRuc() . "-" . $DocumentoSunat->getAbreviado() . "-" . $Venta->getSerie() . "-" . $Venta->getNumero() . ".pdf";
$pdf->Output('I', $nombrePDF);
