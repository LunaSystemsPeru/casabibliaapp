<?php
require '../fixed/SessionActiva.php';

require '../../models/Venta.php';
require '../../tools/Util.php';

$Venta = new Venta();
$Util = new Util();

$Venta->setIdalmacen($_SESSION['tiendaid']);
$empresaruc = $_SESSION['empresaruc'];
$fecha_actual = date("Y-m-d");
if (filter_input(INPUT_GET, 'inputFecha')) {
    $fecha_actual = filter_input(INPUT_GET, 'inputFecha');
}
$Venta->setFecha($fecha_actual);
$arrayventas = $Venta->verFilas("B");

//fecha limite fe
$fecha_actual = date("Y-m-d");
$fecha_limite = date("Y-m-d", strtotime($fecha_actual . "- 4 days"));
$a = strtotime($fecha_limite);
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
                    <h3>Mis Boletas </h3>
                </div>
                <div class="mb-4">
                    <button onclick="abrirBusqueda()" class="btn btn-primary btn-rounded fs-18">Buscar Boletas</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="AllStatus">
                            <?php
                            foreach ($arrayventas as $fila) {
                                $nombre_xml = $empresaruc . "-" . $Util->zerofill($fila['cod_sunat'], 2) . "-" . $fila['serie'] . "-" . $fila['numero'];
                                $b = strtotime($fila['fecha']);
                                ?>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-xl-5  col-lg-6 col-sm-12 align-items-center customers">
                                                <div class="media-body">
                                                    <span class="text-primary d-block fs-18 font-w500 mb-1"><?php echo $fila['abreviado'] . " | " . $fila['serie'] . "-" . $fila['numero'] ?></span>
                                                    <h3 class="fs-18 text-black font-w600"><?php echo $fila['documento'] . " | " . $fila['nombre'] ?></h3>
                                                    <span class="d-block mb-lg-0 mb-0 fs-16"><i class="fas fa-map-marked-alt me-3"></i><?php echo $fila['ntienda'] ?></span>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-center">
                                                <div class="d-flex project-image">
                                                    <div>
                                                        <h2 class=" mb-0">S/ <?php echo number_format($fila['total'], 2) ?></h2>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3  col-lg-6 col-sm-6 mb-sm-4 mb-0">
                                                <div class="d-flex project-image">
                                                    <div>
                                                        <small class="d-block fs-16 font-w400"><i class="fa fa-calendar"></i> Lunes</small>
                                                        <span class="fs-18 font-w500"><?php echo $fila['fecha'] ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-2  col-lg-6 col-sm-4 mb-sm-3 mb-3 text-end">
                                                <div class="d-flex justify-content-end project-btn">
                                                    <?php
                                                    if ($fila['estado'] == 1) {
                                                        ?>
                                                        <label class="btn bgl-success text-success fs-18 font-w600"><i class="fa fa-check"></i> Activo</label>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <label class="btn bgl-danger text-danger fs-18 font-w600"><i class="fa fa-arrow-down"></i> Anulado</label>
                                                        <?php
                                                    }
                                                    ?>
                                                    <!-- <button class="btn bgl-info text-info fs-18 font-w600" type="button" onclick="abrirOpcioness('<?php echo $fila['id_ventas'] ?>')" ><i class="fa fa-mouse-pointer"></i> Opciones</button>-->

                                                    <div class="dropdown ms-4  mt-auto mb-auto">
                                                        <div class="btn-link" data-bs-toggle="dropdown">
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#737B8B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </div>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="../reportes/pdf-documento-venta-ticket.php?ventaid=<?php echo $fila['id_ventas'] ?>" target="_blank">Imprimir</a>
                                                            <a class="dropdown-item" href="../../public/xml/<?php echo $nombre_xml ?>.xml" download="<?php echo $nombre_xml . ".xml" ?>">Ver XML</a>
                                                            <?php
                                                            if ($fila['estado'] == 1) {
                                                                if ($b > $a) {
                                                                    ?>
                                                                    <a class="dropdown-item" href="../controller/anular-venta.php?tipo=b&id=<?php echo $fila['id_ventas'] ?>">dar de Baja</a>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <a class="dropdown-item" href="form-nota-credito-anula.php?tipo=b&id=<?php echo $fila['id_ventas'] ?>">Anular con Nota de Credito</a>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="basicModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="get" action="lista-boleta.php">
                            <div class="modal-header">
                                <h5 class="modal-title">Buscar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                        <div class="col-md-12">
                                            <label for="input-fecha" class="form-label">Seleccionar Fecha</label>
                                            <input type="date" class="form-control" id="input-fecha" name="inputFecha" value="<?php echo date("Y-m-d") ?>" >
                                        </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success light" >Buscar</button>
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
    function abrirBusqueda () {
        $("#basicModal").modal("toggle");
    }

</script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
</html>