<?php
require '../fixed/SessionActiva.php';
require '../../models/DocumentoSunat.php';
require '../../models/MovimientoDinero.php';
require '../../models/VentaPago.php';
require '../../models/Caja.php';

$Documentos = new DocumentoSunat();
$Movimiento = new MovimientoDinero();
$Pago = new VentaPago();
$Caja = new Caja();

$fecha = date("Y-m-d");
if (filter_input(INPUT_GET, 'fecha')) {
    $fecha = filter_input(INPUT_GET, 'fecha');
}

$disabledbutton = '';

$Caja->setFecha($fecha);
$Caja->setIdalmacen($_SESSION['tiendaid']);
$Caja->obtenerDatos();

$Pago->setFecha($fecha);

$arrayDocumentosDia = $Documentos->ventasDia($fecha);

$Movimiento->setIdalmacen($_SESSION['tiendaid']);
$Movimiento->setFecha($fecha);
$arrayMovimientos = $Movimiento->verFilas();

$tototrosingreso = $Movimiento->obtenerTotalDia(1);
$tototrosretiros = $Movimiento->obtenerTotalDia(2);
$mapertura = ($Caja->getMapertura() ? $Caja->getMapertura() : 0);
$Pago->setTipopago(1);
$mefectivo = $Pago->obtenerEfectivo($Movimiento->getIdalmacen());
$totalefectivo = $mapertura + $mefectivo + $tototrosingreso - $tototrosretiros;
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
                    <h3>Caja Diaria </h3>
                    <?php
                    if (!$Caja->getMapertura()) {
                        $disabledbutton = "disabled";
                        ?>
                        <button type="button" class="btn btn-primary" onclick="abrirModalCaja()"><i class="fa fa-plus"></i> Aperturar Caja</button>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title">Movimiento de dinero en tienda</p>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Saldo Inicial <span class="badge badge-success badge-pill">S/ <?php echo number_format($mapertura, 2) ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Venta efectivo <span class="badge badge-success badge-pill"><?php echo number_format($mefectivo, 2) ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Otros ingresos <span class="badge badge-success badge-pill"><?php echo number_format($tototrosingreso, 2) ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Gastos <span class="badge badge-success badge-pill"><?php echo number_format($tototrosretiros, 2) ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Total efectivo <span class="badge badge-dark badge-pill"><?php echo number_format($totalefectivo, 2) ?></span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Total en tarjeta <span class="badge badge-dark badge-pill">0.00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <p class="card-title">Ventas del dia</p>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php
                                    $totalVentas = 0;
                                    foreach ($arrayDocumentosDia as $fila) {
                                        $monto = $fila['monto'];
                                        $totalVentas = $totalVentas + $monto;
                                        $valormonto = number_format($monto, 2);
                                        if ($monto == 0) {
                                            $valormonto = "-";
                                        }
                                        ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?php echo $fila['descripcion'] ?> <span class="badge badge-primary badge-pill">S/ <?php echo $valormonto ?></span>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Total ventas <span class="badge badge-dark badge-pill">S/ <?php echo number_format($totalVentas, 2) ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-header">
                                <p class="card-title">Otros ingresos y retiro de dinero </p>
                            </div>
                            <div class="card-body">
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Descripcion</th>
                                        <th>Ingreso</th>
                                        <th>Salida</th>
                                        <th>Usuario</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($arrayMovimientos as $fila) {
                                        ?>
                                        <tr>
                                            <td><?php echo $fila['motivo'] ?></td>
                                            <td><?php echo $fila['ingresa'] ?></td>
                                            <td><?php echo $fila['retira'] ?></td>
                                            <td><?php echo $fila['id_usuarios'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                                <div class="card-footer-link mb-4 mb-sm-0">
                                </div>
                                <button type="button" class="btn btn-primary" onclick="abrirModal()" <?php echo $disabledbutton ?>><i class="fa fa-plus"></i> Ingresar / retirar dinero</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <!-- Modal -->
            <div class="modal fade" id="basicModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="../controller/registrar-movimiento-caja.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Movimiento de Dinero</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <label for="inputDescripcion" class="form-label">Descripcion </label>
                                    <input type="text" class="form-control" id="inputDescripcion" name="inputDescripcion">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputDescripcion" class="form-label">Tipo </label>
                                    <div class="mb-3 mb-0">
                                        <label class="radio-inline me-3"><input type="radio" name="optradio" value="1"> Ingreso</label>
                                        <label class="radio-inline me-3"><input type="radio" name="optradio" value="2" checked> Salida</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputMonto" class="form-label">Monto </label>
                                    <input type="text" class="form-control" id="inputMonto" name="inputMonto">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success light">Grabar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="basicModalCaja">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="post" action="../controller/registrar-apertura-caja.php">
                            <div class="modal-header">
                                <h5 class="modal-title">apertura Caja</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <label for="inputMonto" class="form-label">Monto Apertura </label>
                                    <input type="text" class="form-control" id="inputMonto" name="inputMonto">
                                    <input type="hidden" name="inputfecha" value="<?php echo $fecha ?>">
                                    <input type="hidden" name="optradio" value="1">
                                    <input type="hidden" name="inputDescripcion" value="APERTURA CAJA">
                                    <input type="hidden" name="optapertura" value="1">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success light">Aperturar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--  end modal -->

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
<script>
    function abrirModal() {
        $("#basicModal").modal('toggle');
    }

    function abrirModalCaja() {
        $("#basicModalCaja").modal('toggle');
    }

</script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
</html>