<?php
require '../fixed/SessionActiva.php';
require '../../models/DocumentoTienda.php';
$DocumentoTienda = new DocumentoTienda();
$DocumentoTienda->setIdtienda($_SESSION['tiendaid']);
$arraydocventas = $DocumentoTienda->verDocumentosVenta();

//fecha limite fe
$fecha_actual = date("Y-m-d");
$fecha_limite = date("Y-m-d", strtotime($fecha_actual . "- 4 days"));
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
    <meta name="viewport" content="width=device-width, initial-scale=1 , maximum-scale=1.0, user-scalable=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template"/>
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template"/>
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template"/>
    <meta property="og:image" content="social-image.png"/>
    <meta name="format-detection" content="telephone=yes">
    <!-- PAGE TITLE HERE -->
    <title>Casa de la Biblia</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../../assets/icons/logosbs.png"/>
    <link href="../../vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <link href="../../vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all"/>
</head>
<body data-primary="color_5">
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
                                    <div id="wizard_Service" class="tab-pane wizard_Service" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12 mb-2">
                                                <div class="mb-3">
                                                    <label for="input-buscar-producto" class="text-label form-label">Buscar Producto</label>
                                                    <input type="text" id="input-buscar-producto" class="form-control " placeholder="Nuevo Producto" required="">
                                                    <input type="hidden" id="input-id-producto">
                                                    <input type="hidden" id="input-nombre-producto">
                                                    <input type="hidden" id="input-codexterno-producto">
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
                                                    <input type="number" id="input-cantidad" class="form-control" step="1" value="1" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-2">
                                                <div class="mb-3">
                                                    <button type="button" onclick="addProducto()" class="btn btn-primary mt-3"><i class="bx bxs-plus-circle"></i>+ Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="contenido-detalle">

                                        </div>
                                    </div>
                                    <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="input-fecha" class="form-label">Fecha</label>
                                                    <input type="date" class="form-control" placeholder="Enter Pan Card" id="input-fecha" value="<?php echo date("Y-m-d") ?>" min="<?php echo $fecha_limite ?>" max="<?php echo $fecha_actual ?>">
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="select_tipo_comprobante" class="form-label">Tipo comprobante</label>
                                                    <select class="form-control form-select" title="Country" id="select_tipo_comprobante" onchange="validarDocumentoSunat()">
                                                        <?php
                                                        foreach ($arraydocventas as $item) {
                                                            echo '<option value="' . $item['id_tido'] . '">' . $item['descripcion'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div><!-- end col -->
                                            <div class="col-lg-6">
                                                <label for="input-nro-documento" class="form-label">Nro Documento</label>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Buscar por RUC, DNI o Nombre" id="input-nro-documento">
                                                    <input type="hidden" id="hidden-id-cliente" value="2">
                                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-bs-toggle="modal" data-bs-target="#basicModal">Agregar</button>
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

                                        <!-- Modal -->
                                        <div class="modal fade" id="basicModal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="#">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Agregar nuevo Cliente</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3 col-md-12">
                                                                <label for="input-nro-documento" class="form-label">Nro Documento</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" placeholder="Buscar por RUC, DNI o Nombre" id="input-add-nro-documento" minlength="8" maxlength="11">
                                                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="obtenerDatosCliente()">Consultar Datos</button>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Razon Social o Apellidos y Nombres *</label>
                                                                <input type="text" class="form-control" id="input-add-datos-cliente" required>
                                                            </div>
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Direccion *</label>
                                                                <input type="text" class="form-control" id="input-add-direccion-cliente" required>
                                                            </div>
                                                            <div class="mb-3 col-md-12">
                                                                <label class="form-label">Telefono / Celular</label>
                                                                <input type="text" class="form-control" id="input-add-telefono-cliente">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="button" onclick="guardarCliente()" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  end modal -->
                                    </div>
                                    <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                        <div class="text-center mb-4">
                                            <h1 id="h1-label">Pago</h1>
                                        </div>
                                        <div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <th scope="row" colspan="4" class="border-0 text-end">Total</th>
                                                    <td class="border-0 text-end"><h4 class="m-0 fw-semibold" id="input-valor-tota">S/ 0.00</h4></td>
                                                </div><!-- end card header -->
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-efectivo" class="form-label">Efectivo</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-efectivo" onkeyup="calcularPago()">
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-tarjeta" class="form-label">Tarjeta</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-tarjeta" onkeyup="calcularPago()">
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-vuelto" class="form-label">Vuelto</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-vuelto" readonly>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-falta" class="form-label">Falta</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-falta" readonly>
                                                    </div>
                                                </div><!-- end col -->
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="input-totalpagado" class="form-label">Total Pagado</label>
                                                        <input type="text" class="form-control" placeholder="0.00" id="input-totalpagado" readonly>
                                                    </div>
                                                </div><!-- end col -->
                                            </div><!-- end row -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="skip-email text-center">
                                                        <p>Verificar datos antes de Grabar</p>
                                                        <button class="btn btn-success" type="button" id="btn-grabar-venta" onclick="grabarVenta()"><i class="fa fa-save"></i> Generar Documento</button>
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

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"
        integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY="
        crossorigin="anonymous"></script>
<script>
    //iniciano variales de array
    var arrayProductos = Array();
    var totalproductos = 0;

    $(document).ready(function () {
        // SmartWizard initialize
        $('#smartwizard').smartWizard();

        validarDocumentoSunat();

        $("#input-buscar-producto").on('focus', function () {
            var inputHeight = $(this).offset().top - 90;
            console.log(inputHeight);
            $("html, body").animate({scrollTop: inputHeight}, 400);
            return false;
        });

        //buscar prooductos
        $("#input-buscar-producto").autocomplete({
            source: "../../ajax/lista-productos.php",
            minLength: 3,
            select: function (event, ui) {
                event.preventDefault();
                $('#input-buscar-producto').val(ui.item.descripcion);
                $('#input-precio-venta').val(ui.item.precio);
                $('#input-id-producto').val(ui.item.idproducto);
                $('#input-nombre-producto').val(ui.item.descripcion);
                $('#input-codexterno-producto').val(ui.item.codexterno);
                //$('#btn_add_producto').prop("disabled", false);
                $('#input-cantidad').focus();
                //$('#input_buscar_productos').val("");
            }
        });

        // colocarFocus();

        //buscar clientes
        $("#input-nro-documento").autocomplete({
            source: "../../ajax/lista-clientes.php",
            minLength: 3,
            select: function (event, ui) {
                event.preventDefault();
                var tidocid = $("#select_tipo_comprobante").val();
                //solo deben seleccionar ruc
                if (tidocid == 4 && ui.item.documento.length != 11) {
                    alert("Debe seleccionar una empresa o numero de ruc");
                    $("#input-nro-documento").val("");
                    $("#input-nro-documento").focus();
                    return false;
                }
                if (tidocid == 5 && ui.item.documento.length < 8) {
                    alert("Error al selecionar cliente debe ser DNI o RUC");
                    $("#input-nro-documento").val("");
                    $("#input-nro-documento").focus();
                    return false;
                }
                $('#input-nro-documento').val(ui.item.documento);
                $('#input-nombre').val(ui.item.nombre);
                $('#input-direccion').val(ui.item.direccion);
                $('#hidden-id-cliente').val(ui.item.clienteid);
                $('#input-cantidad').focus();
            }
        });
    });


    function addProducto() {
        var idproducto = $("#input-id-producto").val();
        var nombre = $("#input-nombre-producto").val();
        var codexterno = $("#input-codexterno-producto").val();
        var precio = $("#input-precio-venta").val();
        var cantidad = $("#input-cantidad").val();
        var costo = 0;
        arrayProductos.push({'idproducto': idproducto, 'codexterno': codexterno, 'nombre': nombre, 'precio': precio, 'cantidad': cantidad, 'costo': costo});
        mostrarItemsProductos();
    }

    function eliminaProducto(item) {
        arrayProductos.forEach(function (car, index, object) {
            if (car.idproducto == item) {
                object.splice(index, 1);
            }
        });

        mostrarItemsProductos();
    }

    function mostrarItemsProductos() {
        $("#contenido-detalle").html("");
        totalproductos = 0;
        //var totalventa = $("#input_total_pedido").val();
        for (var i = 0; i < arrayProductos.length; i++) {
            var totalitem = arrayProductos[i].precio * arrayProductos[i].cantidad;
            totalproductos += (arrayProductos[i].precio * arrayProductos[i].cantidad);

            var tr = '<div class="card">' +
                '<div class="card-body">' +
                '<div class="row align-items-center">' +
                '<div class="col-xl-5  col-lg-5 col-sm-12 align-items-center customers">' +
                '<div class="media-body">' +
                '<span class="text-primary d-block fs-18 font-w500 mb-1">Cod ' + arrayProductos[i].codexterno + '</span>' +
                '<h3 class="fs-18 font-w600">' + arrayProductos[i].nombre + '</h3>' +
                '</div>' +
                '</div>' +
                '<div class="col-xl-4 col-sm-4 col-6 mb-3 text-lg-center">' +
                '<div class="d-flex project-image">' +
                '<div>' +
                '<span class="d-block mb-lg-0 mb-0 fs-16">Cantidad: ' + arrayProductos[i].cantidad + '</span>' +
                '<h3 class=" mb-0">Precio: S/ ' + arrayProductos[i].precio + '</h3>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-xl-2  col-lg-2 col-sm-6 mb-sm-4 mb-0">' +
                '<div class="d-flex project-image">' +
                '<div>' +
                '<span class="d-block mb-lg-0 mb-0 fs-16">Total:</span>' +
                '<h2 class=" mb-0">S/ ' + totalitem.toFixed(2) + '</h2>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-xl-1 col-lg-1 col-sm-1 col-md-1 mb-sm-4 mb-0">' +
                '<div class="d-flex project-image">' +
                '<div>' +
                '<button class="btn btn-danger" type="button" onclick="eliminaProducto(' + arrayProductos[i].idproducto + ')"><i class="fa fa-trash"></i> </button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>';
            $("#contenido-detalle").append(tr)
        }
        //alert(totalproductos);
        cleanBusqueda();
        var alturacontents = $(".form-wizard #wizard_Service").height();
        $(".form-wizard .tab-content").css('height', alturacontents);

        //cargar total
        $("#input-valor-tota").html("S/ " + totalproductos.toFixed(2));
        $("#h1-label").html("por Pagar: S/ " + totalproductos.toFixed(2));

    }

    function cleanBusqueda() {
        $("#input-id-producto").val("");
        $("#input-nombre-producto").val("");
        $("#input-buscar-producto").val("");
        $("#input-codexterno-producto").val("");
        $("#input-precio-venta").val("");
        $("#input-cantidad").val("1");
        $("#input-buscar-producto").focus();
    }

    function abrirModal() {
        $("#basicModal").modal('toogle');
    }

    function obtenerDatosCliente() {
        var nrodocumento = $("#input-add-nro-documento").val();
        console.log("largo es: " + nrodocumento.length)

        if (nrodocumento.length == 8) {

        } else if (nrodocumento.length == 11) {

        } else {
            alert("Nro de DNI o RUC incorrecto");
            $("#input-add-nro-documento").focus();
            return false;
        }


        alert("Cargando Datos espere un momento por favor");
        var arraypost = {documento: nrodocumento};
        $.post("../../ajax/obtener-datos-cliente.php", arraypost, function (data) {
            //console.log("resultado " + data);
            var jsonresultado = JSON.parse(data);
            if (jsonresultado.success == "error") {
                alert("Error en el dni o ruc");
                return false;
            }
            $("#input-add-datos-cliente").val(jsonresultado.datos);
            $("#input-add-direccion-cliente").val(jsonresultado.direccion);
            $("#input-add-telefono-cliente").focus();
        })
            .fail(function (data) {
                alert(data);
            });
    }

    function guardarCliente() {
        var nrodocumento = $("#input-add-nro-documento").val();
        var nombrecliente = $("#input-add-datos-cliente").val();
        var direccioncliente = $("#input-add-direccion-cliente").val();
        var telefonocliente = $("#input-add-telefono-cliente").val();

        //enviar variables para reigstrar cliente
        var arraypost = {
            nrodocumento: nrodocumento,
            nombrecliente: nombrecliente,
            direccioncliente: direccioncliente,
            telefonocliente: telefonocliente
        };

        $.post("../controller/registrar-cliente.php", arraypost, function (data) {
            console.log(data);
            var jsonresultado = JSON.parse(data);
            $("#hidden-id-cliente").val(jsonresultado.id);
            //mostrar client en form venta
            $("#input-nro-documento").val(nrodocumento);
            $("#input-nombre").val(nombrecliente);
            $("#input-direccion").val(direccioncliente);
            $("#basicModal").modal("toggle");
        });
    }

    function calcularPago() {
        //obtenerefectivo
        var efectivopagado = $("#input-efectivo").val();
        if (efectivopagado == "") {
            efectivopagado = 0;
        }
        efectivopagado = parseFloat(efectivopagado);

        var tarjetapagado = $("#input-tarjeta").val();
        if (tarjetapagado == "") {
            tarjetapagado = 0;
        }
        tarjetapagado = parseFloat(tarjetapagado);

        var sumapagado = efectivopagado + tarjetapagado;
        var vuelto = sumapagado - totalproductos;
        if (vuelto < 0) {
            vuelto = 0;
        }
        var faltante = totalproductos - sumapagado;
        if (faltante < 0) {
            faltante = 0;
        }

        $("#input-totalpagado").val(sumapagado);
        $("#input-vuelto").val(vuelto);
        $("#input-falta").val(faltante);
    }

    function bloquearInputCliente() {
        $("#input-nro-documento").val("00000000");
        $("#hidden-id-cliente").val("2");
        $("#input-nombre").val("CLIENTES VARIOS");
        $("#input-direccion").val("-");
        $("#input-nro-documento").prop("readonly", true);
        $("#input-nombre").prop("readonly", true);
        $("#input-direccion").prop("readonly", true);
        $("#button-addon2").prop("disabled", true)
    }

    function habilitarInputClient() {
        $("#input-nro-documento").val("");
        $("#hidden-id-cliente").val("");
        $("#input-nombre").val("");
        $("#input-direccion").val("");
        $("#input-nro-documento").prop("readonly", false);
        $("#input-nombre").prop("readonly", false);
        $("#input-direccion").prop("readonly", false);
        $("#button-addon2").prop("disabled", false)
    }

    function validarDocumentoSunat() {
        var tidoid = $("#select_tipo_comprobante").val();
        if (tidoid == 4) {
            habilitarInputClient();
            $("#input-nro-documento").focus();
        }
        if (tidoid == 5) {
            habilitarInputClient();
            $("#input-nro-documento").focus();
        }
        if (tidoid == 2) {
            bloquearInputCliente();
        }
    }

    function grabarVenta() {
        //validar cliente sea correcto
        var tidoid = $("#select_tipo_comprobante").val();
        var nrodoccliente = $("#input-nro-documento").val();
        var idcliente = $("#hidden-id-cliente").val();
        var nombrecliente = $("#input-nombre").val();
        var pagoEfectivo = $("#input-efectivo").val();
        var pagoTarjeta = $("#input-tarjeta").val();
        // console.log("idcliente:" + idcliente + ":hola");
        //console.log("tidoid:" + tidoid);
        //si es factura debe ser ruc
        if (tidoid == 4) {
            if (idcliente === "") {
                alert("Debe seleccionar un cliente");
                return false;
            }
            if (nrodoccliente.length != 11) {
                alert("Cliente debe ser una empresa")
                return false;
            }
        }

        //si es boleta debe ser dni o 0
        //si es mayor a 750 debe ser dni
        if (tidoid == 5) {
            if (totalproductos > 700 && nrodoccliente.length != 8) {
                alert("Cliente debe tener DNI");
                return false;
            }
        }

        //validar existan prodctos
        if (arrayProductos.length == 0) {
            alert("No ha seleccionado productos");
            return false;
        }
        //enviar datos
        var arraypost = {
            inputFecha: $("#input-fecha").val(),
            inputTido: $("#select_tipo_comprobante").val(),
            inputClienteId: $("#hidden-id-cliente").val(),
            pagoEfectivo: pagoEfectivo,
            pagoTarjeta: pagoTarjeta,
            arrayProductos: JSON.stringify(arrayProductos)
        };
        alert("se registrara el comprobante, acepte y espere un momento");
        $("#btn-grabar-venta").prop("disabled", true);
        $.post("../controller/registrar-venta.php", arraypost, function (data) {
            console.log(data);
            var jsonresultado = JSON.parse(data);
            //si todo correcto enviar a imprimir ticket
            if (jsonresultado.id > 0) {
                alert("venta Registrada, por favor imprima el ticket");
                location.href = "reporte-pdf-documento-venta.php?ventaid=" + jsonresultado.id;
            } else {
                alert("error al registrar venta" + data)
                alert("vuelva a emitir el comprobante")
                location.href = "form-venta.php";
            }
        });
    }

</script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/empty-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:15 GMT -->
</html>
