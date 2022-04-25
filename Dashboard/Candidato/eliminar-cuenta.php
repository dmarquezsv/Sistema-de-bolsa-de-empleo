<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();





?>
<title>Candidato | Crear Perfil</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<main id="main-container">

	<div class="bg-image bg-image-bottom" style="background-image: url('../assets/media/photos/photo34@2x.jpg');">
    <div class="bg-primary-dark-op">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <center><img src="../../assets/img/logo/logoMundoEmpleo.png" data-toggle="appear" data-class="animated bounceInDown" class="img-fluid" style="width: 250px; height: 100px;"></center>
          <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">¡Bienvenido a tu panel <?php echo $PrimerNombre[0] ?> ! </h2>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

    <!-- Pricing Tables -->
    <div class="container">
      <br>
      <h4 style="text-align: center; font-family: sans-serif; color: black;">Actualizar el perfil</h4> <hr>
      <br>
      

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
                      <i class="si si-lock"></i>
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

