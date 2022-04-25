<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';
?>
<title>Candidato | Actualizar Cuenta</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Incio_de_Sesion_Usuario.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: 200px auto;
  }

</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Actualizar la cuenta <?php echo $PrimerNombre[0] ?> ! </h2>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">
    
    <br><br>
    <p class="text-center">
    <a href="./" class="btn  btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>
    </p>
    <!-- Pricing Tables -->
    <div class="container">
      <div class="block">
        <div class="block-header block-header-default">
          <h3 class="block-title">Datos personales:</h3>
        </div>
        <div class="block-content">

          <form action="Modelos/ModelosPerfil/actualizar_cuenta.php" method="POST">
            <input type="hidden" name="iduser" value="<?php echo$IDUser; ?>">  
            <label>Nombres</label>
            <div class="form-group row">
              <div class="col-lg-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre usuario" value="<?php echo $NombresUser ?>" required>
                </div>
              </div>
            </div>


            <label>Apellidos</label>
            <div class="form-group row">
              <div class="col-lg-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="nombre usuario" value="<?php echo $ApellidosUser ?>" required>
                </div>
              </div>
            </div>


            <label>E-mail</label>
            <div class="form-group row">
              <div class="col-lg-12">
                <div class="input-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email"  disabled value="<?php echo$CorreoUser ?>"> 
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="fa fa-envelope-o"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-12">
                <input type="submit" name="Guardar" id="Guardar" value="Actualizar nombres" class="btn btn-alt-primary"> 
              </div>
            </div>

          </form>

          <form action="actualizar-password.php" method="POST"> 
            <label>Nueva Contraseña</label>
            <input type="hidden" name="iduser2" value="<?php echo$IDUser; ?>">  
            <div class="form-group row">
              <div class="col-lg-12">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <span id="MostrarPossword" class="fa fa-eye-slash icon"></span>
                    </span>
                  </div>

                  <input type="password" class="form-control" id="password" name="password" placeholder="Nueva contraseña">
                </div>
              </div>
            </div>


            <div class="form-group row">
              <div class="col-12">
                <input type="submit" name="btnpassword" id="btnpassword" value="Actualizar contraseña" class="btn btn-alt-danger"> 
              </div>
            </div>
          </form>

        </div>
      </div>


    </div>


  </div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

   <script type="text/javascript">

            $('#MostrarPossword').on('click', function() {

                var cambio = document.getElementById("password");
                if(cambio.type == "password"){
                    cambio.type = "text";
                    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }else{
                    cambio.type = "password";
                    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }

            });

            

        </script>