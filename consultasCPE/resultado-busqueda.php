<?php
require '../models/Venta.php';
require '../models/VentaSunat.php';
$Venta = new Venta();
$Sunat = new VentaSunat();
if (filter_input(INPUT_GET, 'idventa')) {
    $Venta->setIdventa(filter_input(INPUT_GET, 'idventa'));
    $Venta->obtenerDatos();
    $Sunat->setVentaid($Venta->getIdventa());
    $Sunat->obtenerDatos();
} else {
    header("index.php");
}

$disabledcdr = 'disabled = "true"';
if ($Venta->getIdtido() == 4 ) {
    $disabledcdr = "false";
}
?>
<!doctype html>
<html class="no-js" lang="">


<!-- Mirrored from affixtheme.com/html/xmee/demo-rtl/register-33.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 13:43:31 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Consulta de Comprobantes Electronicos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div id="preloader" class="preloader">
    <div class='inner'>
        <div class='line1'></div>
        <div class='line2'></div>
        <div class='line3'></div>
    </div>
</div>
<section class="fxt-template-animation fxt-template-layout32">
    <div class="fxt-content-wrap">
        <h1 class="fxt-main-title">Comprobante Encontrado</h1>
        <div class="fxt-btns-wrap">
            <ul>
                <li>
                    <a href="reportes/pdf-documento-venta.php?ventaid=<?php echo $Venta->getIdventa() ?>" download="<?php echo $Sunat->getNombreDocumento() . ".pdf"?>" "" class="fxt-modal-btn"  >PDF</a>
                </li>
                <li>
                    <a href="../public/xml/<?php echo $Sunat->getNombreDocumento()?>.xml" target="_blank" class="fxt-modal-btn" >XML</a>
                </li>
                <li>
                    <button type="button" class="fxt-modal-btn" <?php echo $disabledcdr?>>CDR</button>
                </li>
            </ul>
            <embed src="reportes/pdf-documento-venta.php?ventaid=<?php echo $Venta->getIdventa() ?>" height="500" width="100%">
        </div>
    </div>
    <!--
    <div class="fxt-content-wrap">
        <div class="fxt-form-content">
            <div class="fxt-main-form">
                <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                    <h2 class="fxt-page-title">Comprobante Encontrado</h2>
                    <div>
                        <embed src="reportes/pdf-documento-venta.php?ventaid=<?php echo $Venta->getIdventa() ?>" height="500">
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</section>
<!-- jquery-->
<script src="js/jquery-3.5.0.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- Imagesloaded js -->
<script src="js/imagesloaded.pkgd.min.js"></script>
<!-- Validator js -->
<script src="js/validator.min.js"></script>
<!-- Custom Js -->
<script src="js/main.js"></script>

<script>

</script>
</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo-rtl/register-33.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 13:43:34 GMT -->
</html>