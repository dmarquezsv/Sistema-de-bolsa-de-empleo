
<!doctype html>
<html lang="en" class="no-focus">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title> Mundo Empleo | Login</title>

    <meta name="description" content="Login - soporte Mundo Empleo">
    <meta name="author" content="Mundo Empleo Centro América">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Login - Soporte de Mundo Empleo CA">
    <meta property="og:site_name" content="Mundo Empleo">
    <meta property="og:description" content="Login - soporte Mundo Empleo">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mundoempleosca.com/">
    <meta property="og:image" content="">


    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/recusosMundoEmpleo/lupaMundoEmpleo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/recusosMundoEmpleo/lupaMundoEmpleo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/recusosMundoEmpleo/lupaMundoEmpleo.png">
    <!-- END Icons -->

    <!-- Stylesheets -->

    <!-- Fonts and Codebase framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
    <link rel="stylesheet" id="css-main" href="Dashboard/assets/css/codebase.min.css">

    <link rel="stylesheet" type="text/css" href="assets/plugin/sweetalert/sweetalert2.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->

    <style type="text/css">

     .login-form {
        width: 340px;
        margin: 50px auto;
        font-size: 15px;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }

</style>


</head>
<body>


    <br><br><br><br>
    <div class="login-form">
        <form action="login-admin.php" method="post">
            <h2 class="text-center">Seguridad</h2>       
            <div class="form-group">
                <input type="text" name="USER" class="form-control" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" name="PASSWORD" class="form-control" placeholder="Password" required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Acceder</button>
            </div>
            <div class="clearfix">
                
            </div>        
        </form>
        
    </div>


    <script src="Dashboard/assets/js/codebase.core.min.js"></script>
    <script src="Dashboard/assets/js/codebase.app.min.js"></script>
    <script type="text/javascript" src="assets/plugin/sweetalert/sweetalert2.js"></script>
    <script src="Dashboard/assets/js/pages/op_auth_signin.min.js"></script>
    <script src="main/js/ValidacionesLogin.js"></script>
    <?php include_once 'templates/alertas.php'; ?>
    <?php  if(isset($_GET['seguridad'])){ echo "<script>swal({title:'Advertenicia',text:'Verifica tu E-mail para confirmar el usuario',type:'error'  });</script>"; } ?>

    <?php  if(isset($_GET['verificado'])){ echo "<script>swal({title:'Advertenicia',text:'Usuario Verificado, Ahora puedes iniciar sesión',type:'success'  });</script>"; } ?>

    <?php  if(isset($_GET['success'])){ echo "<script>swal({title:'Verifica tu correo electrónico',text:'Recuerda dar clic en '(No es un correo spam)' para que puedas recibir las notificaciones.',type:'success'  });</script>"; } ?>


    <script type="text/javascript">

        $('#MostrarPossword').on('click', function() {

            var cambio = document.getElementById("login-password");
            if(cambio.type == "password"){
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }else{
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }

        });



    </script>

</body>
</html>