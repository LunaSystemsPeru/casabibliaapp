<?php
require '../models/TablaGeneralDetalle.php';
$tdetalle = new TablaGeneralDetalle();
?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<!-- Mirrored from fillow.dexignlab.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:14 GMT -->
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
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png"/>
    <link href="../vendor/jquery-smartwizard/dist/css/smart_wizard.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="vh-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-8">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="#"><img src="../assets/images/logo-full.png" alt=""></a>
                                </div>
                                <h4 class="text-center mb-4">Registrar Informacion de Postulante - Destajo</h4>
                                <form method="post" action="controller/registrar-destajo.php">
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
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Seleccione tipo documento</label>
                                                        <select class="form-control" name="select_tipo_documento" id="select_tipo_documento">
                                                            <?php
                                                            $tdetalle->setIdtabla(1);
                                                            foreach ($tdetalle->verFilas() as $fila) {
                                                                ?>
                                                                <option value="<?php echo $fila['id'] ?>"><?php echo $fila['descripcion'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Nro Documento</label>
                                                        <input type="text" class="form-control" placeholder="Nro Documento" name="input_nro_documento" id="input_nro_documento" minlength="8" maxlength="13" onkeyup="obtenerDatosDNI()" required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Datos Completos</label>
                                                        <input type="text" class="form-control" placeholder="Apellidos y Nombres" name="input_datos" id="input_datos" minlength="20"  required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Domicilio</label>
                                                        <input type="text" class="form-control" placeholder="Direccion actual" name="input_domicilio" minlength="10" required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Distrito</label>
                                                        <input type="text" class="form-control" placeholder="Departamento - Provincia - Distrito" minlength="3" name="input_zona" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="wizard_Time" class="tab-pane" role="tabpanel">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Fecha Nacimiento</label>
                                                        <input type="date" class="form-control" name="input_fecha_nacimiento" required>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Telefono Celular</label>
                                                        <input type="text" class="form-control" placeholder="Nro Celular" name="input_celular" minlength="9" maxlength="9" required>
                                                    </div>

                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Escoge tipo de trabajo</label>
                                                        <select class="form-control" name="select_tipo_trabajo">
                                                            <?php
                                                            $tdetalle->setIdtabla(3);
                                                            foreach ($tdetalle->verFilas() as $fila) {
                                                                ?>
                                                                <option value="<?php echo $fila['id'] ?>"><?php echo $fila['descripcion'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Escoge turno preferido</label>
                                                        <select class="form-control" name="select_turno">
                                                            <?php
                                                            $tdetalle->setIdtabla(2);
                                                            foreach ($tdetalle->verFilas() as $fila) {
                                                                ?>
                                                                <option value="<?php echo $fila['id'] ?>"><?php echo $fila['descripcion'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="wizard_Details" class="tab-pane" role="tabpanel">
                                                <div class="row">
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Tiene cuenta BCP?</label>
                                                        <select class="form-control" name="input_tiene_cuenta" id="input_tiene_cuenta" onchange="activarCuenta()">
                                                            <option value="1">SI</option>
                                                            <option value="0" selected>NO</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Usted es el titular?</label>
                                                        <select class="form-control" name="input_titular_cuenta" id="input_titular_cuenta" onchange="activarDatosCuenta()">
                                                            <option value="1">SI</option>
                                                            <option value="0" selected>NO</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Seleccione tipo documento</label>
                                                        <select class="form-control" name="select_tipo_documento_titular" id="select_tipo_documento_titular">
                                                            <?php
                                                            $tdetalle->setIdtabla(1);
                                                            foreach ($tdetalle->verFilas() as $fila) {
                                                                ?>
                                                                <option value="<?php echo $fila['id'] ?>"><?php echo $fila['descripcion'] ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label class="form-label">Nro Documento del titular de la CTA</label>
                                                        <input type="text" class="form-control" placeholder="Nro Documento" name="input_nro_documento_titular" id="input_nro_documento_titular" minlength="8" maxlength="13" required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Apellidos y Nombres del Titular de la CTA</label>
                                                        <input type="text" class="form-control" placeholder="Apellidos y Nombres del Titular" name="input_datos_titular" id="input_datos_titular" required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label class="form-label">Nro de Cuenta - BANCO BCP</label>
                                                        <input type="text" class="form-control" placeholder="Nro Documento" name="input_nro_cuenta" id="input_nro_cuenta" maxlength="25" required>
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <button type="submit" class="btn btn-outline-success"><i class="fa fa-save"></i> Guardar Informacion</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="../vendor/global/global.min.js"></script>

        <script src="../vendor/jquery-steps/build/jquery.steps.min.js"></script>
        <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
        <!-- Form validate init -->
        <script src="../assets/js/plugins-init/jquery.validate-init.js"></script>


        <!-- Form Steps -->
        <script src="../vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js"></script>
        <script src="../vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

        <script src="../assets/js/custom.min.js"></script>
        <script src="../assets/js/dlabnav-init.js"></script>
        <script src="../assets/js/demo.js"></script>
        <script src="../assets/js/styleSwitcher.js"></script>
        <script>
            $(document).ready(function () {
                // SmartWizard initialize
                $('#smartwizard').smartWizard();
                activarCuenta();
            });

            function obtenerDatosDNI () {
                var dni = $("#input_nro_documento").val();
                if (dni.length == 8) {
                    $.post("ajax/obtenerDatosDNI.php", {"dni" : dni},function( data ) {
                        var respuesta = JSON.parse(data);
                        console.log(respuesta.data.apellidoPaterno);
                        $('#input_datos').val(respuesta.data.apellidoPaterno + " " + respuesta.data.apellidoMaterno + " " + respuesta.data.nombres);
                    });
                }

            }

            function activarCuenta () {
                var tienecuenta = $("#input_tiene_cuenta").val();
                var estitular = $("#input_titular_cuenta").val();
                if (tienecuenta == 0) {
                    $("#input_titular_cuenta").val(0);
                    $("#input_titular_cuenta").prop("disabled", true);
                    $("#input_datos_titular").prop("readonly", true);
                    $("#input_datos_titular").val("-");
                    $("#input_nro_cuenta").prop("readonly", true);
                    $("#input_nro_cuenta").val("-");
                    $("#select_tipo_documento_titular").prop("disabled", true);
                    $("#input_nro_documento_titular").prop("readonly", true);
                    $("#input_nro_documento_titular").val("-");

                } else {
                    $("#input_titular_cuenta").prop("disabled", false);
                }
                activarDatosCuenta();
            }

            function activarDatosCuenta () {
                var tienecuenta = $("#input_tiene_cuenta").val();
                var estitular = $("#input_titular_cuenta").val();
                if (tienecuenta ==1 ) {
                    if (estitular == 1) {
                        $("#select_tipo_documento_titular").val($("#select_tipo_documento").val());
                        $("#input_nro_documento_titular").val($("#input_nro_documento").val());
                        $("#input_datos_titular").val($("#input_datos").val());
                        $("#input_nro_cuenta").val("");
                        $("#input_nro_cuenta").prop("readonly", false);
                        $("#input_nro_documento_titular").prop("readonly", true);
                        $("#input_datos_titular").prop("readonly", true);
                        $("#select_tipo_documento_titular").prop("disabled", true);
                        $("#input_nro_cuenta").focus();
                    } else {
                        $("#input_datos_titular").prop("readonly", false);
                        $("#input_datos_titular").val("");
                        $("#input_nro_cuenta").prop("readonly", false);
                        $("#input_nro_cuenta").val("");
                        $("#select_tipo_documento_titular").prop("disabled", false);
                        $("#input_nro_documento_titular").prop("readonly", false);
                        $("#input_nro_documento_titular").val("");
                        $("#input_nro_documento_titular").focus();
                    }
                }
            }
        </script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:14 GMT -->
</html>