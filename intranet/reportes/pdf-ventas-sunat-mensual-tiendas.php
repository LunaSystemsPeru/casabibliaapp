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

$arrayTiendas = $Venta->verTiendas($fecha);

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
$altura_linea = 4;

//encabezado empresa
$pdf->Cell(281, $altura_linea, "REPORTE DE VENTAS SUNAT - DETALLE POR TIENDAS", 0, 1, 'C');

$pdf->Ln(2);

$pdf->Cell(281, $altura_linea, "RUC: " . $Empresa->getRuc(), 0, 1, 'L');
$pdf->Cell(281, $altura_linea, "RAZON SOCIAL: " . $Empresa->getRazon(), 0, 1, 'L');

$pdf->Ln(4);

$arrayTotales = [];

foreach ($arrayTiendas as $item) {
    $pdf->SetFont('Arial', 'B', 8);
    $altura_linea = 5;
    $pdf->Cell(281, $altura_linea, "TIENDA: " . $item['nombre'], 0, 1, 'C');

    $pdf->Ln(4);
    $pdf->Cell(5, $altura_linea, "Item", 1, 0, 'C');
    $pdf->Cell(22, $altura_linea, "Fecha Emi.", 1, 0, 'C');
    $pdf->Cell(25, $altura_linea, "Comprobante", 1, 0, 'C');
    $pdf->Cell(24, $altura_linea, "Doc Cliente", 1, 0, 'C');
    $pdf->Cell(100, $altura_linea, "Nombre Cliente", 1, 0, 'C');
    $pdf->Cell(20, $altura_linea, "Base Gravado", 1, 0, 'C');
    $pdf->Cell(20, $altura_linea, "Exonerado", 1, 0, 'C');
    $pdf->Cell(15, $altura_linea, "IGV", 1, 0, 'C');
    $pdf->Cell(20, $altura_linea, "total Venta", 1, 0, 'C');
    $pdf->Cell(30, $altura_linea, "Tienda", 1, 1, 'C');

    $pdf->SetFont('Arial', '', 8);
    $altura_linea = 4;
    $nrofila = 0;
    $totalbase = 0;
    $totaligv = 0;
    $totalexonerado = 0;
    $totalgeneral = 0;

    $Venta->setIdalmacen($item['id_almacen']);
    $arrayVentas = $Venta->verDocumentosPLExTienda($fecha);
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
        $pdf->Cell(25, $altura_linea, $fila['abreviado'] . " | " . $fila['serie'] . " - " . $fila['numero'], 0, 0, 'C');
        $pdf->Cell(24, $altura_linea, $doccliente, 0, 0, 'C');
        $pdf->Cell(100, $altura_linea, $nomcliente, 0, 0, 'L');
        $pdf->Cell(20, $altura_linea, number_format($basegravado, 2), 0, 0, 'R');
        $pdf->Cell(20, $altura_linea, number_format($exonerado, 2), 0, 0, 'R');
        $pdf->Cell(15, $altura_linea, number_format($igv, 2), 0, 0, 'R');
        $pdf->Cell(20, $altura_linea, number_format($total, 2), 0, 0, 'R');
        $pdf->Cell(30, $altura_linea, $fila['ntienda'], 0, 1, 'C');
    }

    $pdf->Ln(4);
    $pdf->Cell(176, $altura_linea, "SUB TOTAL DE TIENDA", 0, 0, 'R');
    $pdf->Cell(20, $altura_linea, number_format($totalbase, 2), 0, 0, 'R');
    $pdf->Cell(20, $altura_linea, number_format($totalexonerado, 2), 0, 0, 'R');
    $pdf->Cell(15, $altura_linea, number_format($totaligv, 2), 0, 0, 'R');
    $pdf->Cell(20, $altura_linea, number_format($totalgeneral, 2), 0, 0, 'R');
    $pdf->Cell(30, $altura_linea, "", 0, 1, 'C');

    $itemTotales = [$item['nombre'], $totalbase, $totalexonerado, $totaligv, $totalgeneral, $nrofila];
    $arrayTotales[] = $itemTotales;

    $pdf->AddPage();
}

$pdf->SetFont('Arial', 'B', 8);
$altura_linea = 5;

$pdf->Cell(281, $altura_linea, "RESUMEN DE VENTAS POR TIENDA", 0, 1, 'C');

$pdf->Cell(50, $altura_linea, "Tienda", 1, 0, 'C');
$pdf->Cell(40, $altura_linea, "No Comprob", 1, 0, 'C');
$pdf->Cell(25, $altura_linea, "Base", 1, 0, 'R');
$pdf->Cell(25, $altura_linea, "Exonerado", 1, 0, 'R');
$pdf->Cell(15, $altura_linea, "IGV", 1, 0, 'R');
$pdf->Cell(25, $altura_linea, "Total Venta", 1, 1, 'R');

$pdf->SetFont('Arial', '', 8);
$altura_linea = 4;
$sumabaset = 0;
$sumaexoneradot = 0;
$sumaigvt = 0;
$sumatotalt = 0;
foreach ($arrayTotales as $fila) {
    $pdf->Cell(50, $altura_linea, $fila[0], 0, 0, 'C');
    $pdf->Cell(40, $altura_linea, $fila[5], 0, 0, 'C');
    $pdf->Cell(25, $altura_linea, number_format($fila[1],2), 0, 0, 'R');
    $pdf->Cell(25, $altura_linea, number_format($fila[2],2), 0, 0, 'R');
    $pdf->Cell(15, $altura_linea, number_format($fila[3],2), 0, 0, 'R');
    $pdf->Cell(25, $altura_linea, number_format($fila[4],2), 0, 1, 'R');
    $sumabaset +=  $fila[1];
    $sumaexoneradot +=  $fila[2];
    $sumaigvt +=  $fila[3];
    $sumatotalt +=  $fila[4];
}
$pdf->SetFont('Arial', 'B', 8);
$altura_linea = 5;
$pdf->Cell(90, $altura_linea, "TOTAL", 0, 0, 'C');
$pdf->Cell(25, $altura_linea, number_format($sumabaset,2), 0, 0, 'R');
$pdf->Cell(25, $altura_linea, number_format($sumaexoneradot,2), 0, 0, 'R');
$pdf->Cell(15, $altura_linea, number_format($sumaigvt,2), 0, 0, 'R');
$pdf->Cell(25, $altura_linea, number_format($sumatotalt,2), 0, 1, 'R');

$nombrePDF = $Empresa->getRuc() . "-TIENDAS-" . $periodo . ".pdf";
$pdf->Output('I', $nombrePDF);
