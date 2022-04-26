<?php
require '../models/Venta.php';
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
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
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
<section class="fxt-template-animation fxt-template-layout33">
    <div class="fxt-content-wrap">
        <div class="fxt-heading-content">
            <div class="fxt-inner-wrap fxt-transformX-R-50 fxt-transition-delay-3">
                <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                    <a href="index.php" class="fxt-logo"><img src="../assets/images/casabiblialogo.png" alt="Logo"></a>
                </div>
                <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                    <div class="fxt-middle-content">
                        <div class="fxt-sub-title">Gracias por</div>
                        <h1 class="fxt-main-title">tu compra en CASA DE LA BIBLIA</h1>
                        <p class="fxt-description">Aqui puedes descargar tus boletas, facturas, notas de credito </p>
                    </div>
                </div>
                <div class="fxt-transformX-R-50 fxt-transition-delay-10">
                    <div class="fxt-switcher-description">Quieres ver la tienda online? <a href="../../tienda-online/" class="fxt-switcher-text">clic aqui</a></div>
                </div>
            </div>
        </div>
        <div class="fxt-form-content">
            <div class="fxt-main-form">
                <div class="fxt-inner-wrap fxt-opacity fxt-transition-delay-13">
                    <h2 class="fxt-page-title">Buscar Comprobante</h2>
                    <form method="POST">
                        <div class="form-group">
                            <label for="input-fecha" class="fxt-label">Fecha de Documento</label>
                            <input type="date" id="input-fecha" class="form-control text-center" name="input-fecha" required="required">
                        </div>
                        <div class="form-group">
                            <label for="select-documento" class="fxt-label">Tipo Documento</label>
                            <select class="form-control" id="select-documento">
                                <option value="5">BOLETA</option>
                                <option value="4">FACTURA</option>
                                <option value="6">NOTA DE CREDITO</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="input-serie" class="fxt-label">Serie Documento</label>
                            <input type="text" id="input-serie" class="form-control" name="input-serie" placeholder="B00X - F00X" required="required">
                        </div>
                        <div class="form-group">
                            <label for="input-numero" class="fxt-label">Numero Documento</label>
                            <input type="text" id="input-numero" class="form-control" name="input-numero" placeholder="123456789" required="required">
                        </div>
                        <div class="form-group">
                            <label for="input-total" class="fxt-label">Total</label>
                            <input type="text" id="input-total" class="form-control" name="input-total" placeholder="0.00" required="required">
                        </div>
                        <div class="form-group mb-3">
                            <button type="button" class="fxt-btn-fill" onclick="verificarComprobante()">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
    function verificarComprobante() {
        var inputfecha = $("#input-fecha").val();
        var selectdocumento = $("#select-documento").val();
        var inputserie = $("#input-serie").val();
        var inputnumero = $("#input-numero").val();
        var inputtotal = $("#input-total").val();

        $.post("controller/buscar-comprobante.php", {
            inputfecha: inputfecha,
            selectdocumento: selectdocumento,
            inputserie: inputserie,
            inputnumero: inputnumero,
            inputtotal: inputtotal
        })
            .done(function (data) {
                //alert("Data Loaded: " + data);
                jsondata = JSON.parse(data);
                if (jsondata.idventa == "0") {
                    alert("No se encontro ningun comprobante");
                } else {
                    location.href = "resultado-busqueda.php?idventa=" + jsondata.idventa;
                }
            });
    }
</script>
</body>


<!-- Mirrored from affixtheme.com/html/xmee/demo-rtl/register-33.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Apr 2022 13:43:34 GMT -->
</html>