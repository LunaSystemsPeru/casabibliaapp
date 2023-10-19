<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require '../fixed/SessionActiva.php';
require '../../tools/fpdf/fpdf.php';
define('FPDF_FONTPATH', '../../tools/fpdf/font/');

require '../../models/Venta.php';
require '../../models/Empresa.php';

$Venta = new Venta();
$Empresa = new Empresa();

$fecha = filter_input(INPUT_GET, 'fecha');
$arrayVentas = $Venta->verDocumentosPLE($fecha);

$fechaEntera = strtotime($fecha);
$anio = date("Y", $fechaEntera);
$mes = date("m", $fechaEntera);

$periodo = $anio . $mes;

$Empresa->setIdempresa(1);
$Empresa->obtenerDatos();


$pdf = new FPDF('L', 'mm', 'A4');
$pdf->SetMargins(8, 8, 8);
$pdf->SetAutoPageBreak(true, 8);
//echo $pdf->GetPageWidth();
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 8);
$altura_linea = 6;


$pdf->Cell(5, $altura_linea, "Item", 1, 0, 'C');
$pdf->Cell(22, $altura_linea, "Fecha Emi.", 1, 0, 'C');
$pdf->Cell(25, $altura_linea, "Comprobante", 1, 0, 'C');
$pdf->Cell(24, $altura_linea, "Doc Cliente", 1, 0, 'C');
$pdf->Cell(100, $altura_linea, "Nombre Cliente", 1, 0, 'C');
$pdf->Cell(20, $altura_linea, "Base Gravado", 1, 0, 'C');
$pdf->Cell(20, $altura_linea, "Exonerado", 1, 0, 'C');
$pdf->Cell(15, $altura_linea, "IGV", 1, 0, 'C');
$pdf->Cell(20, $altura_linea, "total Venta", 1, 0, 'C');
$pdf->Cell(30, $altura_linea, "Tienda",1, 1, 'C');

$pdf->SetFont('Arial', '', 8);
$altura_linea = 4;
$nrofila = 0;
$totalbase = 0;
$totaligv = 0;
$totalexonerado = 0;
$totalgeneral = 0;
foreach ($arrayVentas as $fila) {
    $doccliente = $fila['documento'];
    $nomcliente = htmlentities($fila['nombre']);
    $total = $fila['total'];
    $igv = $fila['igv'];
    $basegravado = $igv / 0.18;
    $exonerado = $total - $igv - $basegravado;

    if ($fila['estado'] == 2) {
        $doccliente = "00000000000";
        $nomcliente = "**** DOCUMENTO ANULADO ****";
        $total = 0;
        $igv = 0;
        $basegravado = 0;
        $exonerado = 0;
    }

    $nrofila++;

    $totalbase = $totalbase + $basegravado;
    $totaligv = $totaligv + $igv;
    $totalexonerado = $totalexonerado + $exonerado;
    $totalgeneral = $totalgeneral + $total;

    $pdf->Cell(5, $altura_linea, $nrofila, 0, 0, 'C');
    $pdf->Cell(22, $altura_linea, $fila['fecha'], 0, 0, 'C');
    $pdf->Cell(25, $altura_linea, $fila['abreviado'] . " | ". $fila['serie'] . " - " . $fila['numero'], 0, 0, 'C');
    $pdf->Cell(24, $altura_linea, $doccliente, 0, 0, 'C');
    $pdf->Cell(100, $altura_linea, $nomcliente, 0, 0, 'L');
    $pdf->Cell(20, $altura_linea, number_format($basegravado, 2), 0, 0, 'R');
    $pdf->Cell(20, $altura_linea, number_format($exonerado, 2), 0, 0, 'R');
    $pdf->Cell(15, $altura_linea, number_format($igv, 2), 0, 0, 'R');
    $pdf->Cell(20, $altura_linea,  number_format($total, 2), 0, 0, 'R');
    $pdf->Cell(30, $altura_linea, $fila['ntienda'], 0, 1, 'C');
}

$pdf->SetFont('Arial', 'B', 8);
$altura_linea = 6;

$pdf->Ln(10);
$pdf->Cell(5, $altura_linea, "Item", 1, 0, 'C');
$pdf->Cell(22, $altura_linea, "Fecha Emi.", 1, 0, 'C');
$pdf->Cell(25, $altura_linea, "Comprobante", 1, 0, 'C');
$pdf->Cell(24, $altura_linea, "Doc Cliente", 1, 0, 'C');
$pdf->Cell(100, $altura_linea, "Nombre Cliente", 1, 0, 'C');
$pdf->Cell(20, $altura_linea, "Base Gravado", 1, 0, 'C');
$pdf->Cell(20, $altura_linea, "Exonerado", 1, 0, 'C');
$pdf->Cell(15, $altura_linea, "IGV", 1, 0, 'C');
$pdf->Cell(20, $altura_linea, "total Venta", 1, 0, 'C');
$pdf->Cell(30, $altura_linea, "Tienda",1, 1, 'C');

$pdf->Cell(176, $altura_linea, "TOTAL GENERAL DEL PERIODO", 1, 0, 'R');
$pdf->Cell(20, $altura_linea, number_format($totalbase, 2), 1, 0, 'R');
$pdf->Cell(20, $altura_linea, number_format($totalexonerado, 2), 1, 0, 'R');
$pdf->Cell(15, $altura_linea, number_format($totaligv, 2), 1, 0, 'R');
$pdf->Cell(20, $altura_linea,  number_format($totalgeneral, 2), 1, 0, 'R');
$pdf->Cell(30, $altura_linea, "", 1, 1, 'C');


$nombrePDF = $Empresa->getRuc() . "-" . $periodo . ".pdf";
$pdf->Output('I', $nombrePDF);
