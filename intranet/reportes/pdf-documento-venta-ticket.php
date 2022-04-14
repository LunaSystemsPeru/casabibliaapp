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

require '../../tools/Util.php';
require '../../tools/NumerosaLetras.php';

$Util = new Util();
$NumeroLetras = new NumerosaLetras();

$ventaid = filter_input(INPUT_GET, 'ventaid', FILTER_SANITIZE_NUMBER_INT);

$Venta = new Venta();
$Venta->setIdventa($ventaid);
$Venta->obtenerDatos();

$SunatVenta = new VentaSunat();
$SunatVenta->setVentaid($Venta->getIdventa());
$SunatVenta->obtenerDatos();

$Cliente =new Cliente();
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
$ProductoVenta->setIdventa($Venta->getIdventa());
$arrayProducto = $ProductoVenta->verFilas();

$pdf = new FPDF('P', 'mm', array(80, 350));
$pdf->SetMargins(8,8,8);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$altura_linea = 4 ;

$pdf->SetFont('Arial', '', 9);
$pdf->SetTextColor(00, 00, 0);
$pdf->MultiCell(64, $altura_linea, utf8_decode($Empresa->getRuc() . " | " . $Empresa->getRazon()), 0, 'C');
$pdf->MultiCell(64, $altura_linea, utf8_decode($Tienda->getDireccion() . " - " . $Tienda->getDepartamento() . " - " . $Tienda->getProvincia() . " - " . $Tienda->getDistrito()), 0, 'C');
$pdf->Cell(64, $altura_linea, $DocumentoSunat->getDescripcion() . " ELECTRONICA", 0, 1, 'C');
$pdf->Cell(64, $altura_linea, $Venta->getSerie() . "-".$Util->zerofill($Venta->getNumero(),8), 0, 1, 'C');
$pdf->MultiCell(64, $altura_linea, utf8_decode("CLIENTE: " . $Cliente->getNombre()), 0, 'L');
$pdf->Cell(64, $altura_linea, "DNI / RUC: " . $Cliente->getDocumento(), 0, 1, 'L');
$pdf->Ln();

$totalBaseIGV = 0;
$totalBase = 0;
foreach ($arrayProducto as $item) {
    $base = 0;
    $base=$item['cantidad'] * $item['precio'];
    $pdf->MultiCell(64, $altura_linea, utf8_decode($item['descripcion']), 0, 'J');
    $pdf->SetX(30);
    $pdf->Cell(10, $altura_linea, $item['cantidad'] . "X", 0, 0, 'L');
    if ($item['afecto_igv'] == 0) {
        $pdf->Cell(5, $altura_linea,"*", 0, 0, 'L');
        $totalBaseIGV = $totalBaseIGV + ($base/1.18);
    } else {
        $pdf->Cell(5, $altura_linea,"", 0, 0, 'L');
        $totalBase = $totalBase + ($base);
    }
    $pdf->Cell(17, $altura_linea, number_format($item['precio'],2), 0, 0, 'L');
    $pdf->Cell(10, $altura_linea, number_format($base,2), 0, 1, 'R');
}
$pdf->Ln();

if ($Venta->getIdtido() != 2) {

    $pdf->Cell(35, $altura_linea, "OP. GRAVADA: ", 0, 0, 'L');
    $pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
    $pdf->Cell(24, $altura_linea, number_format($totalBaseIGV,2), 0, 1, 'R');

    $pdf->Cell(35, $altura_linea, "OP. EXONERADA: ", 0, 0, 'L');
    $pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
    $pdf->Cell(24, $altura_linea, number_format($totalBase,2), 0, 1, 'R');

    $pdf->Cell(35, $altura_linea, "IGV: ", 0, 0, 'L');
    $pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
    $pdf->Cell(24, $altura_linea, number_format($totalBaseIGV * 0.18,2), 0, 1, 'R');

}

$totalGeneral = $totalBaseIGV * 1.18 + $totalBase;

$pdf->Cell(35, $altura_linea, "IMPORTE TOTAL: ", 0, 0, 'L');
$pdf->Cell(5, $altura_linea, "S/", 0, 0, 'L');
$pdf->Cell(24, $altura_linea, number_format($totalGeneral,2), 0, 1, 'R');

$pdf->MultiCell(64, $altura_linea, "SON: " . utf8_decode($NumeroLetras->to_word(number_format($totalGeneral,2), "PEN")), 0, 'L');

$pdf->Ln(2);
if ($SunatVenta->getNombreDocumento()) {
    $pdf->Image('../../generate_qr/temp/'. $SunatVenta->getNombreDocumento().'.png', $pdf->GetX(), $pdf->GetY(), 22, 22);
    $pdf->Ln(25);
    $pdf->MultiCell(64, $altura_linea, "Hash: " . $SunatVenta->getHash(),0, 'C');
    $pdf->Ln(3);
}

if ($Venta->getIdtido() != 2) {
    $pdf->MultiCell(64, $altura_linea, "Representacion Impresora de la " . $DocumentoSunat->getDescripcion() . " Electronica, esta puede ser consultada en www.casabibliachimbote.ga",0, 'C');
}

$nombrePDF = $Empresa->getRuc()."-".$DocumentoSunat->getAbreviado()."-".$Venta->getSerie()."-".$Venta->getNumero().".pdf";
$pdf->Output('I', $nombrePDF);
