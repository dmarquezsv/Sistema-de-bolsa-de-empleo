<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Mundo Empleo | Recuperar Cuenta</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="Dashboard/assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="Dashboard/assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="Dashboard/assets/media/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="Dashboard/assets/css/codebase.min.css">
    <link rel="stylesheet" type="text/css" href="assets/plugin/sweetalert/sweetalert2.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>


    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('main/img/Banner_Landing_Page/BannerRestablecerUsuarioLanding.jpg');">
                <div class="row mx-0 bg-black-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-30 invisible" data-toggle="appear">
                            <p class="font-size-h3 font-w600 text-white">
                                Recuperar cuenta
                            </p>
                            <p class="font-italic text-white-op">
                                Copyright &copy; <span class="js-year-copy"><?php echo date("Y"); ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-30 py-10">
                                <center>
                                    <img src="assets/recusosMundoEmpleo/logo.png" class="img-fluid">
                                </center>
                                <h1 class="h3 font-w700 mt-30 mb-10">No te preocupes, te respaldamos</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">Por favor ingrese una nueva contraseña</h2>
                            </div>
                            <!-- END Header -->

                            <form action="main/ModelosUsuarioCuentas/recuperar-cuenta.php"  method="POST">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="password" class="form-control"   name="password" id="password" required >
                                            <input type="hidden" name="iduser2" id="iduser2" value="<?php echo $_GET['id'] ?>"> 
                                            <input type="hidden" name="email" id="email" value="<?php echo $_GET['email'] ?>"> 
                                            <label for="reminder-credential">Contraseña</label>
                                            <div id="respuetaServidor"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <input type="submit" name="actualizar" value="cambiar contraseña" class="btn btn-sm btn-hero btn-warning btn-rounded"  style="color:#0B3486; font-weight: bold;">


                                    <div class="mt-30">
                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="login">
                                            <i class="si si-arrow-left mr-5"></i> Regresar
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="Dashboard/assets/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="Dashboard/assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="Dashboard/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="Dashboard/assets/js/pages/op_auth_signin.min.js"></script>
        <script src="assets/plugin/sweetalert/sweetalert2.js"></script>


    </body>
    </html>