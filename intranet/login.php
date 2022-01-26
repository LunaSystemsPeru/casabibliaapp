<?php
$error ="";
if (filter_input(INPUT_GET, 'error')) {
    $error = filter_input(INPUT_GET, 'error');
}
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
    <title>Casa Biblia APP</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="../assets/images/favicon.png"/>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="vh-100">
<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <div class="text-center mb-3">
                                    <a href="index.php">
                                        <img src="../assets/images/logo1.jpeg" alt="" width="70%">
                                    </a>
                                </div>
                                <div class="text-center mb-3">
                                    <?php
                                    if ($error == 1) {
                                        ?>
                                        <div class="alert alert-light alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            <strong>Error!</strong> Usuario ha sido bloqueado.
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    if ($error == 2) {
                                        ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            <strong>Error!</strong> Contraseña incorrecta.
                                            </button>
                                        </div>
                                        <?php
                                    }
                                    if ($error == 3) {
                                        ?>
                                        <div class="alert alert-info alert-dismissible fade show">
                                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                            <strong>Error!</strong> Usuario no existe.
                                            </button>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>
                                <h4 class="text-center mb-4">Ingresar al Sistema</h4>
                                <form action="controller/login.php" method="post">
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Usuario</strong>
                                            <input type="text" class="form-control" placeholder="Usuario" name="inputUsuario">
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"> <strong>Password</strong>
                                            <input class="form-control" type="password" name="inputPassword">
                                        </label>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
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

        </script>
</body>

<!-- Mirrored from fillow.dexignlab.com/xhtml/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Oct 2021 15:06:14 GMT -->
</html>