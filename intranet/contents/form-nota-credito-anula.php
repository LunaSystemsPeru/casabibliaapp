<?php
require '../fixed/SessionActiva.php';
require '../../models/Venta.php';
require '../../models/Cliente.php';
require '../../models/DocumentoSunat.php';

$Venta = new Venta();
$Documento = new DocumentoSunat();
$Cliente = new Cliente();

$Venta->setIdventa(filter_input(INPUT_GET,'id'));
$Venta->obtenerDatos();

$Cliente->setIdcliente($Venta->getIdcliente());
$Cliente->obtenerDatos();

$Documento->setIdtido($Venta->getIdtido());
$Documento->obtenerDatos();
?>
<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta name="robots" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template"/>
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template"/>
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template"/>
    <meta property="og:image" content="social-image.png"/>
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Casa de la Biblia</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../../assets/icons/logosbs.png"/>
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">

</head>
<body>
<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="lds-ripple">
        <div></div>
        <div></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">
    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="../contents/form-inicio.php" class="brand-logo">
            <svg class="logo-abbr" width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"/>
                <defs>
                </defs>
            </svg>
            <div class="brand-title">
                <h2 class="">Menu.</h2>
                <span class="brand-sub-title">Casa de la Biblia</span>
            </div>
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span><span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Chat box start
    ***********************************-->
    <?php include '../fixed/menu-derecha.php' ?>
    <!--**********************************
        Chat box End
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <?php include '../fixed/menu-superior.php' ?>

    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <?php include '../fixed/menu-izquierda.php' ?>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="project-page d-flex justify-content-between align-items-center flex-wrap">
                <div class="project mb-4">
                    <h3>Anular con Nota de Credito</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="AllStatus">
                            <div class="card">
                                <form class="row g-3 needs-validation" method="post" action="../controller/registrar-nota-credito-anula.php">
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="input-nombre" class="form-label">Documento a Anular</label>
                                            <input type="text" class="form-control" id="input-documento" value="<?php echo $Documento->getDescripcion() . " | " . $Venta->getSerie() . " - " . $Venta->getNumero()?>" readonly>
                                            <input type="hidden" name="inputId" value="<?php echo $Venta->getIdventa()?>">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input-documento" class="form-label">Cliente</label>
                                            <input type="text" class="form-control" id="input-cliente" value="<?php echo $Cliente->getDocumento() . " - " . $Cliente->getNombre()?>" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="input-documento" class="form-label">Total</label>
                                            <input type="text" class="form-control" id="input-total-venta" value="<?php echo $Venta->getTotal() ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <label for="input-fecha" class="form-label">Fecha de Nota de Credito</label>
                                            <input type="date" class="form-control" id="input-fecha" name="inputFecha" value="<?php echo date("Y-m-d")?>" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="input-documento" class="form-label">Documento</label>
                                            <input type="text" class="form-control" value="NOTA DE CREDITO" readonly>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Generar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../assets/js/custom.min.js"></script>
<script src="../../assets/js/dlabnav-init.js"></script>
<script src="../../assets/js/demo.js"></script>
<script src="../../assets/js/styleSwitcher.js"></script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
</html>