<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

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

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->SetMargins(10,8,10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();

$altura_linea = 4;

$r = 202;
$g = 0;
$b = 0;

$pdf->Image('../../assets/images/casabiblialogo.png', $pdf->GetX(), $pdf->GetY(), 50, 12);
$pdf->Ln(5);
$pdf->SetFont('Arial', '', 10);
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(255, 255,255);
//$pdf->SetFillColor(0, 101,46);
$pdf->Rect(140, 10, 60, 24,"");
$pdf->SetTextColor(0, 0, 0);
$pdf->SetY(10);
$pdf->SetX(140);
$pdf->Cell(60, 8, "RUC: " . $Empresa->getRuc(), 0, 1, 'C');
$pdf->SetX(140);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor(202, 0, 0);
$pdf->MultiCell(60, 5, $DocumentoSunat->getDescripcion() . " ELECTRONICA", 0, "C", 1);
//$pdf->Cell(70, 8, $c_tido->getNombre() . " ELECTRONICA", 0, 1, 'C', 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetX(140);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(60, 8, $Venta->getSerie() . "-" .$Util->zerofill($Venta->getNumero(), 8), 0, 1, 'C');

$pdf->SetTextColor(202, 0,0);
$pdf->SetY(10);
$pdf->SetX(60);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(110, 4, $Empresa->getRazon(), 0, 1, 'L');
$pdf->SetX(60);
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(110, 4, "CASA DE LA BIBLIA - CHIMBOTE", 0, 1, 'L');

$pdf->SetX(60);
$pdf->MultiCell(75, 4, $Tienda->getDireccion(), 0, "L");
$pdf->SetX(60);
$pdf->Cell(75, 4, "Telefono: 999222666", 0, 1, 'L');

$pdf->SetY(36);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(190, 6, "FACTURADO A ", 0, 1, 'C', 1);
$pdf->Ln(1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);

$pdf->Cell(25, 4, "CLIENTE: ", 0, 0, 'L');
$pdf->Cell(93, 4, $Cliente->getDocumento(), 0, 0, 'L');
$pdf->Cell(32, 4, "FECHA EMISION:", 0, 0, 'R');
$pdf->Cell(40, 4, $Util->fecha_tabla($Venta->getFecha()), 0, 1, 'C');
$pdf->SetX(128);
$pdf->Cell(32, 4, "MONEDA:", 0, 0, 'R');
$pdf->Cell(40, 4, "PEN", 0, 0, 'C');
$pdf->SetX(10);
$pdf->MultiCell(118, 4, htmlentities("CLIENTE: " . $Cliente->getNombre()));

$pdf->Cell(25, 4, "DIRECCION:", 0, 0, 'L');
//$pdf->Cell(130, 5, htmlentities($c_entidad->getDireccion()), 0, 0, 'L');
$pdf->SetX(128);
$pdf->Cell(32, 4, "FORMA DE PAGO:", 0, 0, 'R');
$pdf->Cell(40, 4, "CONTADO", 0, 0, 'C');
$pdf->SetX(35);
$pdf->MultiCell(90, 4, htmlentities(trim($Cliente->getDireccion())));

$pdf->Ln(1);

if ($Venta->getIdtido() == 6) {
    $pdf->Cell(64, $altura_linea, "DOC. REFERENCIA: " . $VRefencia->getSerie() . "-". $VRefencia->getNumero(), 0, 1, 'L');
    $pdf->Cell(64, $altura_linea, "MOTIVO: ANULACION DE LA OPERACION", 0, 1, 'L');
    $pdf->Ln();
}

$y = $pdf->GetY();
//$pdf->Line(10, $y, 200, $y);
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetTextColor(255, 255, 255);  // Establece el color del texto (en este caso es blanco)
$pdf->SetFillColor($r, $g, $b);
$pdf->Cell(15, 5, "CANT.", 0, 0, 'C', 1);
$pdf->Cell(15, 5, "UND. MED.", 0, 0, 'C', 1);
$pdf->Cell(120, 5, "DESCRIPCION", 0, 0, 'C', 1);
$pdf->Cell(20, 5, "P.UNIT ", 0, 0, 'C', 1);
$pdf->Cell(20, 5, "P. TOTAL", 0, 1, 'C', 1);

$y = $pdf->GetY();
//$pdf->Line(10, $y, 200, $y);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 9);


$suma = 0;
$items = array();
//PARA PRODUCTOS
$totalBaseIGV = 0;
$totalBase = 0;
foreach ($arrayProducto as $item) {
    $base = 0;
    $base = $item['cantidad'] * $item['precio'];
    if ($item['afecto_igv'] == 0) {
        $pdf->Cell(5, $altura_linea, "*", 0, 0, 'L');
        $totalBaseIGV = $totalBaseIGV + ($base / 1.18);
    } else {
        $pdf->Cell(5, $altura_linea, " ", 0, 0, 'L');
        $totalBase = $totalBase + ($base);
    }
    $pdf->Cell(15, 4, $item['cantidad'] , 0, 0, 'C');
    //$pdf->Cell(110, 10, $value['descripcion'], 0, 0, 'L');
    $pdf->SetX(160);
    $pdf->Cell(20, 4, number_format($item['precio'], 2), 0, 0, 'R');
    $pdf->Cell(20, 4, number_format($base, 2), 0, 0, 'R');
    $pdf->SetX(25);
    $pdf->MultiCell(135, 4, htmlentities("UNIDAD | " . htmlentities($item['descripcion'])), 0, 'L');
    //$pdf->Ln(2);
}


$pdf->Ln(1);

$pdf->SetY(-195);

$pdf->Ln(3);
$y = $pdf->GetY();
$pdf->Line(10, $y, 200, $y);

$pdf->SetY(-190);

$hcelda = 4;
$pdf->SetX(63);
$pdf->Cell(15, $hcelda, "Nro Cuota", 1, 0, 'C');
$pdf->Cell(25, $hcelda, "Fecha Vcto: ", 1, 0, 'C');
$pdf->Cell(20, $hcelda, "Monto: ", 1, 1, 'C');

$pdf->SetX(63);
$pdf->Cell(40, $hcelda, "TOTAL CREDITO:", 1, 0, 'C');
$pdf->Cell(20, $hcelda, number_format(0,2), 1, 1, 'R');

$pdf->SetY(-184);
$pdf->Image('../../generate_qr/temp/' . $SunatVenta->getNombreDocumento() . '.png', 126, 108, 22, 22);

$pdf->SetY(-184);
$pdf->Cell(170, 5, "OP. GRAVADA: ", 0, 0, 'R');
$pdf->Cell(20, 5, number_format($totalBaseIGV , 2), 0, 1, 'R');
$pdf->Cell(170, 5, "OP. EXONERADA: ", 0, 0, 'R');
$pdf->Cell(20, 5, number_format($totalBase, 2), 0, 1, 'R');


$totalGeneral = $totalBaseIGV * 1.18 + $totalBase;

$pdf->Cell(70, 4, "Importe en Letras", 0, 0, 'L');
$pdf->Cell(100, 4, "IGV: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format($totalBaseIGV * 0.18, 2), 0, 1, 'R');
$pdf->Cell(120, 4, htmlentities($NumeroLetras->to_word(number_format($totalGeneral, 2), "PEN")), 0, 0, 'L');
$pdf->Cell(50, 4, "TOTAL: ", 0, 0, 'R');
$pdf->Cell(20, 4, number_format($totalGeneral, 2), 0, 1, 'R');


$pdf->Ln(3);
$y = $pdf->GetY();
$pdf->Line(10, $y, 200, $y);
$pdf->Ln(2);
$pdf->MultiCell(190, 4, htmlentities("Representacion Impresa de la " . $DocumentoSunat->getDescripcion() . " Electronica, esta puede ser consultada en www.casabibliachimbote.ga"), 0, 'C');
$pdf->MultiCell(190, 4, htmlentities("Resumen: " .$SunatVenta->getHash()), 0, 'C');

$nombrePDF = $Empresa->getRuc() . "-" . $DocumentoSunat->getAbreviado() . "-" . $Venta->getSerie() . "-" . $Venta->getNumero() . ".pdf";
$pdf->Output('I', $nombrePDF);

