    <?php
require '../../models/Colaborador.php';
require '../../models/TablaGeneralDetalle.php';

$colaborador = new Colaborador();
$tdetalle = new TablaGeneralDetalle();


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
    <meta name="description" content="GTH- Reclutamiento de personal para destajo"/>
    <meta property="og:title" content="GTH Sea Consulting - Registro de Postulantes para destajo"/>
    <meta property="og:description" content="GTH Sea Consulting - Registro de Postulantes para destajo"/>
    <meta property="og:image" content="social-image.png"/>
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>GTH Sea Consulting</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png"/>
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
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
        <a href="index.html" class="brand-logo">
            <svg class="logo-abbr" width="55" height="55" viewBox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"/>
                <defs>
                </defs>
            </svg>
            <div class="brand-title">
                <h2 class="">Fillow.</h2>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Talento Humano</h4>
                        </div>
                        <div class="card-body">
                            <div >
                                <table id="example" class="display" width="100%">
                                    <thead>
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>DATOS</strong></th>
                                        <th><strong>EDAD</strong></th>
                                        <th><strong>NRO CELULAR</strong></th>
                                        <th><strong>ZONA</strong></th>
                                        <th><strong>TURNO</strong></th>
                                        <th><strong>TIPO TRABAJO</strong></th>
                                        <th><strong>TIENE CUENTA</strong></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($colaborador->verFilas() as $fila) {
                                        $estadocuenta = $fila['estado_cuenta'];
                                        if ($estadocuenta == 1) {
                                            $label_cuenta = '<label class="label label-success">Cta Propia</label>';
                                        }
                                        if ($estadocuenta == 2) {
                                            $label_cuenta = '<label class="label label-info">Cta Tercero</label>';
                                        }
                                        if ($estadocuenta == 3) {
                                            $label_cuenta = '<label class="label label-warning">No Tiene</label>';
                                        }
                                        ?>
                                        <tr>
                                            <td><strong><?php echo $fila['id'] ?></strong></td>
                                            <td><?php echo $fila['datos'] ?></td>
                                            <td><?php echo $fila['edad'] ?></td>
                                            <td><?php echo $fila['nro_celular'] ?></td>
                                            <td><?php echo $fila['zona'] ?></td>
                                            <td><?php echo $fila['turno'] ?></td>
                                            <td><?php echo $fila['tipotrabajo'] ?></td>
                                            <td><?php echo $label_cuenta ?></td>
                                            <td></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
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
<script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../assets/js/custom.min.js"></script>
<script src="../../assets/js/dlabnav-init.js"></script>
<script src="../../assets/js/demo.js"></script>
<script src="../../assets/js/styleSwitcher.js"></script>

<script>
    $(document).ready(function () {
        var table = $('#example').DataTable({
            lengthMenu: [50, 100, 200],
            "order": [[ 1, "asc" ]]
        });

    });

</script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
</html>