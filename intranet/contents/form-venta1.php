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
    <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png" />
    <link href="../../vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
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
        <a href="../intranet/index.html" class="brand-logo">
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
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Registrar Comprobante de Venta</h4>
                        </div>
                        <div class="card-body">
                            <div id="smartwizard" class="form-wizard order-create">
                                <ul class="nav nav-wizard">
                                    <li><a class="nav-link" href="#wizard_Service">
                                            <span>1</span>
                                        </a></li>
                                    <li><a class="nav-link" href="#wizard_Time">
                                            <span>2</span>
                                        </a></li>
                                    <li><a class="nav-link" href="#wizard_Details">
                                            <span>3</span>
                                        </a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="wizard_Service" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <div class="mb-3">
                                                    <label for="input-buscar-producto" class="text-label form-label">Buscar Producto</label>
                                                    <input type="text" id="input-buscar-producto" class="form-control" placeholder="Nuevo Producto" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label for="input-precio-venta" class="text-label form-label">Precio Venta</label>
                                                    <input type="text" id="input-precio-venta" class="form-control" placeholder="0.00" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <label for="input-cantidad" class="text-label form-label">Cantidad</label>
                                                    <input type="text" id="input-cantidad" class="form-control" placeholder="00" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <button type="submit" class="btn btn-primary mt-3"><i class="bx bxs-plus-circle"></i>+ Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col-xl-5  col-lg-6 col-sm-12 align-items-center customers">
                                                            <div class="media-body">
                                                                <span class="text-primary d-block fs-18 font-w500 mb-1">Cod: Producto</span>
                                                                <h3 class="fs-18 text-black font-w600">Biblia</h3>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-center">
                                                            <div class="d-flex project-image">
                                                                <div>
                                                                    <span class="d-block mb-lg-0 mb-0 fs-16">1</span>
                                                                    <h3 class=" mb-0">S/ 80.00</h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-3  col-lg-6 col-sm-6 mb-sm-4 mb-0">
                                                            <div class="d-flex project-image">
                                                                <div>
                                                                    <h2 class=" mb-0">S/ 80.00</h2>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="input-fecha" class="form-label">Fecha</label>
                                                    <input type="date" class="form-control" placeholder="Enter Pan Card" id="input-fecha">
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="select_tipo_comprobante" class="form-label">Tipo comprobante</label>
                                                    <select class="form-control form-select" title="Country" id="select_tipo_comprobante">
                                                        <option value="B">Boleta</option>
                                                        <option value="F">Factura</option>
                                                        <option value="NV">Nota Venta</option>
                                                    </select>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <label for="input-nro-documento" class="form-label">Nro Documento</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="87654321" id="input-nro-documento">
                                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Comprobar</button>
                                                </div>
                                            </div><!-- end col -->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="input-nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombre" id="input-nombre">
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="input-direccion" class="form-label">Direccion</label>
                                                    <input type="text" class="form-control" placeholder="Direccion" id="input-direccion">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                        <div class="text-center mb-4">
                                            <h1>Pago</h1>
                                        </div>
                                        <div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end"><h4 class="m-0 fw-semibold">$739.00</h4></td>
                                                </div><!-- end card header -->
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-efectivo" class="form-label">Efectivo</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-efectivo">
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-tarjeta" class="form-label">Tarjeta</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-tarjeta">
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-vuelto" class="form-label">Vuelto</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-vuelto">
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-falta" class="form-label">Falta</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-falta">
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-totalpagado" class="form-label">Total Pagado</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-totalpagado">
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="skip-email text-center">
                                                        <p>Verificar datos antes de Grabar</p>
                                                        <a href="javascript:void(0)">Grabar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<script src="../../vendor/jquery-steps/build/jquery.steps.min.js"></script>
<script src="../../vendor/jquery-validation/jquery.validate.min.js"></script>

<script src="../../assets/js/plugins-init/jquery.validate-init.js"></script>

<script src="../../vendor/jquery-smartwizard/dist/js/jquery.smartWizard.min.js"></script>
<script src="../../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="../../assets/js/custom.min.js"></script>
<script src="../../assets/js/dlabnav-init.js"></script>
<script src="../../assets/js/demo.js"></script>
<script src="../../assets/js/styleSwitcher.js"></script>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all"/>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
        integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        // SmartWizard initialize
        $('#smartwizard').smartWizard();

        $("#input-buscar-producto").autocomplete({
            source: "../../ajax/lista-productos.php",
            minLength: 3,
            select: function (event, ui) {
                event.preventDefault();
                $('#input-buscar-producto').val(ui.item.descripcion);
                $('#input-precio-venta').val(ui.item.precio);
                //$('#btn_add_producto').prop("disabled", false);
                $('#input-cantidad').focus();
                //$('#input_buscar_productos').val("");
            }
        });
    });
</script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
</html>