<?php
require '../fixed/SessionActiva.php';
require '../../models/Inicio.php';
$Inicio = new Inicio();
$Inicio->setTiendaid($_SESSION['tiendaid']);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <title>Fillow Saas Admin Dashboard</title>

    <link rel="shortcut icon" type="image/png" href="../../assets/icons/logosbs.png"/>
    <link href="../../vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">


</head>
<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="color_1" data-headerbg="color_1" data-sidebar-style="full" data-sibebarbg="color_1" data-sidebar-position="fixed" data-header-position="fixed" data-container="wide" direction="ltr" data-primary="color_5">
<div id="main-wrapper" class="show">
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
                <h2 class="">Menú.</h2>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ventas por Clasificacion este mes</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-condensed">
                                        <thead>
                                        <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th><strong>CLASIFICACION</strong></th>
                                            <th><strong>TOTAL</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $array_clasificacion = $Inicio->verVentasClasificacionTienda();
                                        $item = 1;
                                        foreach ($array_clasificacion as $fila) {
                                            ?>
                                            <tr>
                                                <td><strong><?php echo $item ?></strong></td>
                                                <td><?php echo $fila['nombre'] ?></td>
                                                <td class="text-right"><?php echo number_format($fila['vendido'], 2) ?></td>
                                            </tr>
                                            <?php
                                            $item++;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ventas por Tiendas este mes</h4>
                                </div>
                                <div class="card-body p-0">
                                    <div id="morris_bar" class="morris_chart_height"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../assets/js/custom.min.js"></script>
<script src="../../assets/js/dlabnav-init.js"></script>
<script src="../../assets/js/demo.js"></script>
<script src="../../assets/js/jquery_002.js"></script>
<script src="../../assets/js/jquery_004.js"></script>
<script src="../../assets/js/jquery_003.js"></script>
<script src="../../assets/js/jquery_005.js"></script>
<script src="../../vendor/raphael/raphael.min.js"></script>
<script src="../../vendor/morris/morris.min.js"></script>
<script>
    $(document).ready(function () {
        // SmartWizard initialize
       // $('#smartwizard').smartWizard();
        barChart();
    });

    var barChart = function () {
        if (jQuery('#morris_bar').length > 0) {
            //bar chart
            Morris.Bar({
                element: 'morris_bar',
                data: [{
                    y: '2006',
                    a: 100,
                    b: 90,
                    c: 60
                }, {
                    y: '2007',
                    a: 75,
                    b: 65,
                    c: 40
                }, {
                    y: '2008',
                    a: 50,
                    b: 40,
                    c: 30
                }, {
                    y: '2009',
                    a: 75,
                    b: 65,
                    c: 40
                }, {
                    y: '2010',
                    a: 50,
                    b: 40,
                    c: 30
                }, {
                    y: '2011',
                    a: 75,
                    b: 65,
                    c: 40
                }, {
                    y: '2012',
                    a: 100,
                    b: 90,
                    c: 40
                }],
                xkey: 'y',
                ykeys: ['a'],
                labels: ['A', 'B', 'C'],
                barColors: ['#FFA7D7', '#ffaa2b', '#ff9f00'],
                hideHover: 'auto',
                gridLineColor: 'transparent',
                resize: true,
                barSizeRatio: 0.25,
            });
        }
    }
</script>
</body>
</html>