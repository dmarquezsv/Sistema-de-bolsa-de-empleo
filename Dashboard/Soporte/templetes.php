<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

?>
<title>Empresa | Reclutador</title>
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
          <center> <img src="../../assets/img/logo/logo2_footer.png" data-toggle="appear" data-class="animated bounceInDown"> </center>
          <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Mundo Empleo</h1>
          <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Alertas Trabajos</h2>
        </div>
      </div>
    </div>
  </div>


  <div style="margin-right:2%; margin-left:2%;">

  </div>
  
</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

