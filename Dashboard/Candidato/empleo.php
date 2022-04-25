<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
include_once 'templates/validar-perfil.php';
?>
<title>Candidato | empleos</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>
<style type="text/css">
    .bg-gd-dusk {
        background: #d262e3;
        background: linear-gradient(135deg,#0B3486,#39899bbf 100%) !important;
    }
</style>

<main id="main-container">

	<div class="bg-image bg-image-bottom" style="background-image: url('../assets/media/photos/photo34@2x.jpg');">
        <div class="bg-primary-dark-op">
            <div class="content content-top text-center overflow-hidden">
                <div class="pt-40 pb-20">
                    <center><img src="../../assets/img/logo/logoMundoEmpleo.png" data-toggle="appear" data-class="animated bounceInDown" class="img-fluid" style="width: 250px; height: 100px;"></center>
                    <h2 class="h4 font-w400 text-white-op invisible"  id="titulos" data-toggle="appear" data-class="animated fadeInUp">Área de Empleo</h2>
                </div>
            </div>
        </div>
    </div>



    <div style="margin-right:2%; margin-left:2%;">
       <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block text-center" href="empleos.php">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="si si-briefcase fa-3x text-white-op" style="font-size: 38px;"></i>
                    </p>
                    <p class="font-w600 text-white">Buscar <br>Empleos</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block text-center" href="alertas">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="fa fa-bell-o fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Alertas <br> Trabajos</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block text-center" href="empresas">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="fa fa-building fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Area <br> Empresa</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block text-center" href="postulaciones">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="fa fa-book fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Mis <br> Postulaciones</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block text-center" href="favoritos">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="fa fa-star fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Mis <br> Favoritos</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block text-center" href="chats-empresas">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                    <p class="mt-5">
                        <i class="fa fa-file-text fa-3x text-white-op"></i>
                    </p>
                    <p class="font-w600 text-white">Chats <br>empresas</p>
                </div>
            </a>
        </div>






    </div>      
</div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
?>
