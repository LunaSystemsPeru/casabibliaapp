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

    <link rel="shortcut icon" type="image/png" href="../../assets/images/favicon.png"/>
    <link href="form-venta_files/smart_wizard.css" rel="stylesheet">
    <link href="form-venta_files/nice-select.css" rel="stylesheet">
    <link href="form-venta_files/style.css" rel="stylesheet">
    <link href="./vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">


</head>
<body data-typography="poppins" data-theme-version="light" data-layout="vertical" data-nav-headerbg="color_1" data-headerbg="color_1" data-sidebar-style="full" data-sibebarbg="color_1" data-sidebar-position="fixed" data-header-position="fixed" data-container="wide" direction="ltr" data-primary="color_5">


<div id="main-wrapper" class="show">


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


    <div class="content-body" style="min-height: 801px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Registrar Venta</h4>
                        </div>
                        <div class="card-body">
                            <div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">
                                <ul class="nav nav-wizard">
                                    <li><a class="nav-link inactive active" href="#wizard_Agregar">
                                            <span>1</span>
                                        </a>
                                    </li>
                                    <li><a class="nav-link inactive" href="#wizard_Cliente">
                                            <span>2</span>
                                        </a>
                                    </li>
                                    <li><a class="nav-link inactive" href="#wizard_Pago">
                                            <span>3</span>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content" style="height: 272.15px;">
                                    <div id="wizard_Agregar" class="tab-pane" role="tabpanel" style="display: block;">
                                        <div class="row">
                                            <div class="text-center mb-4">
                                                <h3> Agregar Producto</h3>
                                            </div>
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

                                            <div class="text-center mb-4">
                                                <h3> Detalles de la Venta</h3>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-1 ms-3">
                                                            <h5 class="font-size-16 mb-1">Producto: Libro</h5>
                                                            <p class="text-muted mb-0">Precio Venta: 20.00</p>
                                                            <p class="text-muted mb-0">Cantidad: 01</p>
                                                            <p class="text-muted mb-0">Subtotal: 20.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="pt-1">
                                                        <button class="btn btn-danger" type="button"> Eliminar
                                                            <i class="bx bxs-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div><!-- end card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-1 ms-3">
                                                            <h5 class="font-size-16 mb-1">Producto: Biblia</h5>
                                                            <p class="text-muted mb-0">Precio Venta: 40.00</p>
                                                            <p class="text-muted mb-0">Cantidad: 02</p>
                                                            <p class="text-muted mb-0">Subtotal: 80.00</p>
                                                        </div>
                                                    </div>
                                                    <div class="pt-1">
                                                        <button class="btn btn-danger" type="button">Eliminar
                                                            <i class="bx bxs-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div><!-- end card -->
                                        </div>
                                    </div>
                                    <div id="wizard_Cliente" class="tab-pane" role="tabpanel" style="display: none;">
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
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div>
                                    <div id="wizard_Pago" class="tab-pane" role="tabpanel" style="display: none;">
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
                                        </div><!-- end form -->
                                    </div>
                                </div>
                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-primary sw-btn-prev disabled" type="button">Previous</button>
                                    <button class="btn btn-primary sw-btn-next" type="button">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="footer">
        <div class="copyright">
            <p>Copyright © Designed &amp; Developed by <a href="https://dexignlab.com/" target="_blank">DexignLab</a> 2021</p>
        </div>
    </div>


</div>


<script src="form-venta_files/global.js"></script>
<script src="form-venta_files/jquery_002.js"></script>
<script src="form-venta_files/jquery_004.js"></script>

<script src="form-venta_files/jquery_003.js"></script>

<script src="form-venta_files/jquery.js"></script>
<script src="form-venta_files/jquery_005.js"></script>
<script src="form-venta_files/custom.js"></script>
<script src="form-venta_files/dlabnav-init.js"></script>
<script src="form-venta_files/demo.js"></script>
<script src="form-venta_files/styleSwitcher.js"></script>
<div class="sidebar-right">
    <div class="bg-overlay"></div>
    <a class="sidebar-right-trigger wave-effect wave-effect-x" data-bs-toggle="tooltip" data-placement="right" data-original-title="Change Layout" href="javascript:void(0);"><span><i class="fa fa-cog fa-spin"></i> </span></a><a class="sidebar-close-trigger" href="javascript:void(0);"><span><i class="la-times las"></i></span></a>
    <div class="sidebar-right-inner"><h4>Pick your style <a href="javascript:void(0);" onclick="deleteAllCookie()" class="btn btn-primary btn-sm pull-right">Delete All Cookie</a></h4>
        <div class="card-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" href="#tab1" data-bs-toggle="tab">Theme</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab2" data-bs-toggle="tab">Header</a></li>
                <li class="nav-item"><a class="nav-link" href="#tab3" data-bs-toggle="tab">Content</a></li>
            </ul>
        </div>
        <div class="tab-content tab-content-default tabcontent-border">
            <div class="fade tab-pane active show" id="tab1">
                <div class="admin-settings">
                    <div class="row">
                        <div class="col-sm-12"><p>Background</p> <select class="default-select wide form-control" id="theme_version" name="theme_version" style="display: none;">
                                <option value="light" selected="selected">Light</option>
                                <option value="dark">Dark</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Light</span>
                                <ul class="list">
                                    <li data-value="light" class="option selected">Light</li>
                                    <li data-value="dark" class="option">Dark</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6"><p>Primary Color</p>
                            <div><span data-placement="top" data-bs-toggle="tooltip" title="Color 1"> <input class="chk-col-primary filled-in" id="primary_color_1" name="primary_bg" type="radio" value="color_1"> <label for="primary_color_1" class="bg-label-pattern"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_2" name="primary_bg" type="radio" value="color_2"> <label
                                            for="primary_color_2"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_3" name="primary_bg" type="radio" value="color_3"> <label for="primary_color_3"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_4" name="primary_bg" type="radio" value="color_4"> <label for="primary_color_4"></label> </span>
                                <span> <input class="chk-col-primary filled-in" id="primary_color_5" name="primary_bg" type="radio" value="color_5"> <label for="primary_color_5"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_6" name="primary_bg" type="radio" value="color_6"> <label for="primary_color_6"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="primary_color_7" name="primary_bg" type="radio" value="color_7"> <label for="primary_color_7"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_9" name="primary_bg" type="radio" value="color_9"> <label for="primary_color_9"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="primary_color_10" name="primary_bg" type="radio" value="color_10"> <label for="primary_color_10"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_11" name="primary_bg" type="radio" value="color_11"> <label for="primary_color_11"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="primary_color_12" name="primary_bg" type="radio" value="color_12"> <label for="primary_color_12"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_13" name="primary_bg" type="radio" value="color_13"> <label for="primary_color_13"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="primary_color_14" name="primary_bg" type="radio" value="color_14"> <label for="primary_color_14"></label> </span> <span> <input class="chk-col-primary filled-in" id="primary_color_15" name="primary_bg" type="radio" value="color_15"> <label for="primary_color_15"></label> </span></div>
                        </div>
                        <div class="col-sm-6"><p>Navigation Header</p>
                            <div><span> <input class="chk-col-primary filled-in" id="nav_header_color_1" name="navigation_header" type="radio" value="color_1"> <label for="nav_header_color_1" class="bg-label-pattern"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_2" name="navigation_header" type="radio" value="color_2"> <label
                                            for="nav_header_color_2"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_3" name="navigation_header" type="radio" value="color_3"> <label for="nav_header_color_3"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_4" name="navigation_header" type="radio" value="color_4"> <label
                                            for="nav_header_color_4"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_5" name="navigation_header" type="radio" value="color_5"> <label for="nav_header_color_5"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_6" name="navigation_header" type="radio" value="color_6"> <label
                                            for="nav_header_color_6"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_7" name="navigation_header" type="radio" value="color_7"> <label for="nav_header_color_7"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_8" name="navigation_header" type="radio" value="color_8"> <label
                                            for="nav_header_color_8" class="border"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_9" name="navigation_header" type="radio" value="color_9"> <label for="nav_header_color_9"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_10" name="navigation_header" type="radio"
                                                                                                                                                                                                                                                                                                   value="color_10"> <label for="nav_header_color_10"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="nav_header_color_11" name="navigation_header" type="radio" value="color_11"> <label for="nav_header_color_11"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_12" name="navigation_header" type="radio" value="color_12"> <label for="nav_header_color_12"></label> </span>
                                <span> <input class="chk-col-primary filled-in" id="nav_header_color_13" name="navigation_header" type="radio" value="color_13"> <label for="nav_header_color_13"></label> </span> <span> <input class="chk-col-primary filled-in" id="nav_header_color_14" name="navigation_header" type="radio" value="color_14"> <label for="nav_header_color_14"></label> </span>
                                <span> <input class="chk-col-primary filled-in" id="nav_header_color_15" name="navigation_header" type="radio" value="color_15"> <label for="nav_header_color_15"></label> </span></div>
                        </div>
                        <div class="col-sm-6"><p>Header</p>
                            <div><span> <input class="chk-col-primary filled-in" id="header_color_1" name="header_bg" type="radio" value="color_1"> <label for="header_color_1" class="bg-label-pattern"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_2" name="header_bg" type="radio" value="color_2"> <label for="header_color_2"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="header_color_3" name="header_bg" type="radio" value="color_3"> <label for="header_color_3"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_4" name="header_bg" type="radio" value="color_4"> <label for="header_color_4"></label> </span> <span> <input class="chk-col-primary filled-in"
                                                                                                                                                                                                                                                                                                                                                                            id="header_color_5" name="header_bg"
                                                                                                                                                                                                                                                                                                                                                                            type="radio" value="color_5"> <label
                                            for="header_color_5"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_6" name="header_bg" type="radio" value="color_6"> <label for="header_color_6"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_7" name="header_bg" type="radio" value="color_7"> <label
                                            for="header_color_7"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_8" name="header_bg" type="radio" value="color_8"> <label for="header_color_8" class="border"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_9" name="header_bg" type="radio" value="color_9"> <label
                                            for="header_color_9"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_10" name="header_bg" type="radio" value="color_10"> <label for="header_color_10"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_11" name="header_bg" type="radio" value="color_11"> <label for="header_color_11"></label> </span>
                                <span> <input class="chk-col-primary filled-in" id="header_color_12" name="header_bg" type="radio" value="color_12"> <label for="header_color_12"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_13" name="header_bg" type="radio" value="color_13"> <label for="header_color_13"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="header_color_14" name="header_bg" type="radio" value="color_14"> <label for="header_color_14"></label> </span> <span> <input class="chk-col-primary filled-in" id="header_color_15" name="header_bg" type="radio" value="color_15"> <label for="header_color_15"></label> </span></div>
                        </div>
                        <div class="col-sm-6"><p>Sidebar</p>
                            <div><span> <input class="chk-col-primary filled-in" id="sidebar_color_1" name="sidebar_bg" type="radio" value="color_1"> <label for="sidebar_color_1" class="bg-label-pattern"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_2" name="sidebar_bg" type="radio" value="color_2"> <label for="sidebar_color_2"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_3" name="sidebar_bg" type="radio" value="color_3"> <label for="sidebar_color_3"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_4" name="sidebar_bg" type="radio" value="color_4"> <label for="sidebar_color_4"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_5" name="sidebar_bg" type="radio" value="color_5"> <label for="sidebar_color_5"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_6" name="sidebar_bg" type="radio" value="color_6"> <label for="sidebar_color_6"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_7" name="sidebar_bg" type="radio" value="color_7"> <label for="sidebar_color_7"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_8" name="sidebar_bg" type="radio" value="color_8"> <label for="sidebar_color_8" class="border"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_9" name="sidebar_bg" type="radio" value="color_9"> <label for="sidebar_color_9"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_10" name="sidebar_bg" type="radio" value="color_10"> <label for="sidebar_color_10"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_11" name="sidebar_bg" type="radio" value="color_11"> <label for="sidebar_color_11"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_12" name="sidebar_bg" type="radio" value="color_12"> <label for="sidebar_color_12"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_13" name="sidebar_bg" type="radio" value="color_13"> <label for="sidebar_color_13"></label> </span> <span> <input class="chk-col-primary filled-in" id="sidebar_color_14" name="sidebar_bg" type="radio" value="color_14"> <label for="sidebar_color_14"></label> </span> <span> <input
                                            class="chk-col-primary filled-in" id="sidebar_color_15" name="sidebar_bg" type="radio" value="color_15"> <label for="sidebar_color_15"></label> </span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fade tab-pane" id="tab2">
                <div class="admin-settings">
                    <div class="row">
                        <div class="col-sm-6"><p>Layout</p> <select class="default-select wide form-control" id="theme_layout" name="theme_layout" style="display: none;">
                                <option value="vertical" selected="selected">Vertical</option>
                                <option value="horizontal">Horizontal</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Vertical</span>
                                <ul class="list">
                                    <li data-value="vertical" class="option selected">Vertical</li>
                                    <li data-value="horizontal" class="option">Horizontal</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6"><p>Header position</p> <select class="default-select wide form-control" id="header_position" name="header_position" style="display: none;">
                                <option value="static" selected="selected">Static</option>
                                <option value="fixed">Fixed</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Static</span>
                                <ul class="list">
                                    <li data-value="static" class="option selected">Static</li>
                                    <li data-value="fixed" class="option">Fixed</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6"><p>Sidebar</p> <select class="default-select wide form-control" id="sidebar_style" name="sidebar_style" style="display: none;">
                                <option value="full" selected="selected">Full</option>
                                <option value="mini">Mini</option>
                                <option value="compact">Compact</option>
                                <option value="modern">Modern</option>
                                <option value="overlay">Overlay</option>
                                <option value="icon-hover">Icon-hover</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Full</span>
                                <ul class="list">
                                    <li data-value="full" class="option selected">Full</li>
                                    <li data-value="mini" class="option">Mini</li>
                                    <li data-value="compact" class="option">Compact</li>
                                    <li data-value="modern" class="option">Modern</li>
                                    <li data-value="overlay" class="option">Overlay</li>
                                    <li data-value="icon-hover" class="option">Icon-hover</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6"><p>Sidebar position</p> <select class="default-select wide form-control" id="sidebar_position" name="sidebar_position" style="display: none;">
                                <option value="static" selected="selected">Static</option>
                                <option value="fixed">Fixed</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Static</span>
                                <ul class="list">
                                    <li data-value="static" class="option selected">Static</li>
                                    <li data-value="fixed" class="option">Fixed</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fade tab-pane" id="tab3">
                <div class="admin-settings">
                    <div class="row">
                        <div class="col-sm-6"><p>Container</p> <select class="default-select wide form-control" id="container_layout" name="container_layout" style="display: none;">
                                <option value="wide" selected="selected">Wide</option>
                                <option value="boxed">Boxed</option>
                                <option value="wide-boxed">Wide Boxed</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Wide</span>
                                <ul class="list">
                                    <li data-value="wide" class="option selected">Wide</li>
                                    <li data-value="boxed" class="option">Boxed</li>
                                    <li data-value="wide-boxed" class="option">Wide Boxed</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6"><p>Body Font</p> <select class="default-select wide form-control" id="typography" name="typography" style="display: none;">
                                <option value="roboto" selected="selected">Roboto</option>
                                <option value="poppins">Poppins</option>
                                <option value="opensans">Open Sans</option>
                                <option value="HelveticaNeue">HelveticaNeue</option>
                            </select>
                            <div class="nice-select default-select wide form-control" tabindex="0"><span class="current">Roboto</span>
                                <ul class="list">
                                    <li data-value="roboto" class="option selected">Roboto</li>
                                    <li data-value="poppins" class="option">Poppins</li>
                                    <li data-value="opensans" class="option">Open Sans</li>
                                    <li data-value="HelveticaNeue" class="option">HelveticaNeue</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="note-text"><span class="text-danger">*Note :</span> This theme switcher is not part of product. It is only for demo. you will get all guideline in documentation. please check <a href="https://fillow.dexignlab.com/documentation/" target="_blank" class="text-primary">documentation.</a></div>
    </div>
</div>
<div class="dlab-demo-panel">
    <div class="bg-close"></div>
    <a class="dlab-demo-trigger" data-toggle="tooltip" data-placement="right" data-original-title="Check out more demos" href="javascript:void(0)"><span><i class="las la-tint"></i></span></a>
    <div class="dlab-demo-inner"><a href="javascript:void(0);" class="btn btn-primary btn-sm px-2 py-1 mb-3" onclick="deleteAllCookie()">Delete All Cookie</a>
        <div class="dlab-demo-header"><h4>Select A Demo</h4> <a class="dlab-demo-close" href="javascript:void(0)"><span><i class="las la-times"></i></span></a></div>
        <div class="dlab-demo-content ps ps--active-y">
            <div class="dlab-wrapper">
                <div class="overlay-bx dlab-demo-bx demo-active">
                    <div class="overlay-wrapper"><img src="form-venta_files/pic1.jpg" alt="" class="w-100"></div>
                    <div class="overlay-layer"><a href="javascript:void(0);" data-theme="1" class="btn dlab_theme_demo btn-secondary btn-sm mr-2">Demo 1</a></div>
                </div>
                <h5 class="text-black mb-5">Demo 1</h5>
                <hr>
                <div class="overlay-bx dlab-demo-bx">
                    <div class="overlay-wrapper"><img src="form-venta_files/pic2.jpg" alt="" class="w-100"></div>
                    <div class="overlay-layer"><a href="javascript:void(0);" data-theme="2" class="btn dlab_theme_demo btn-secondary btn-sm mr-2">Demo 2</a></div>
                </div>
                <h5 class="text-black mb-5">Demo 2</h5>
                <hr>
                <div class="overlay-bx dlab-demo-bx">
                    <div class="overlay-wrapper "><img src="form-venta_files/pic3.jpg" alt="" class="w-100"></div>
                    <div class="overlay-layer"><a href="javascript:void(0);" data-theme="3" class="btn dlab_theme_demo btn-secondary btn-sm mr-2">Demo 3</a></div>
                </div>
                <h5 class="text-black mb-5">Demo 3</h5>
                <hr>
                <div class="overlay-bx dlab-demo-bx">
                    <div class="overlay-wrapper"><img src="form-venta_files/pic4.jpg" alt="" class="w-100"></div>
                    <div class="overlay-layer"><a href="javascript:void(0);" data-theme="4" class="btn dlab_theme_demo btn-secondary btn-sm mr-2">Demo 4</a></div>
                </div>
                <h5 class="text-black mb-5">Demo 4</h5>
                <hr>
                <div class="overlay-bx dlab-demo-bx">
                    <div class="overlay-wrapper"><img src="form-venta_files/pic5.jpg" alt="" class="w-100"></div>
                    <div class="overlay-layer"><a href="javascript:void(0);" data-theme="5" class="btn dlab_theme_demo btn-secondary btn-sm mr-2">Demo 5</a></div>
                </div>
                <h5 class="text-black mb-5">Demo 5</h5>
                <div class="overlay-bx dlab-demo-bx">
                    <div class="overlay-wrapper"><img src="form-venta_files/pic6.jpg" alt="" class="w-100"></div>
                    <div class="overlay-layer"><a href="javascript:void(0);" data-theme="6" class="btn dlab_theme_demo btn-secondary btn-sm mr-2">Demo 6</a></div>
                </div>
                <h5 class="text-black mb-5">Demo 6</h5></div>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 446px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 129px;"></div>
            </div>
        </div>
        <div class="note-text"><span class="text-danger">*Note :</span> This theme switcher is not part of product. It is only for demo. you will get all guideline in documentation. please check <a href="https://fillow.dexignlab.com/documentation/" target="_blank" class="text-primary">documentation.</a></div>
    </div>
</div>
<script>
    $(document).ready(function () {
        // SmartWizard initialize
        $('#smartwizard').smartWizard();
    });
</script>

</body>
</html>