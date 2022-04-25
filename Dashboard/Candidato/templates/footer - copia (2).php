 <br>
 <!-- Footer -->
 <footer id="page-footer" class="opacity-0" style="background:white;" >
    <div class="content py-20 font-size-xs clearfix"  style="background: white;">


     <div class="row text-center">
        <div class="col-md-3">
            <div class="block-content">

                <div class="float-left">
                    <h5 class="text-white">Conoce más</h5>
                    <ul style="text-align: left; color: black;">
                        <li><a href="#" class="text-dark"> <b>Búsqueda de Empleos</b> </a></li>
                        <br>
                        <li><a href="#" class="text-dark"> <b>Quienes Somos</b> </a></li>
                        <br>
                        <li><a href="#" class="text-dark"> <b>Mapa del Sitio</b> </a></li>
                        <br>
                        <li><a href="#" class="text-dark"> <b>Blog</b> </a></li>
                        <br>
                        <li><a href="#" class="text-dark"> <b>Condiciones</b> </a></li>
                        <br>
                        <li><a href="#" class="text-dark"> <b>Derechos</b> </a></li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="col-md-3 ml-auto">
            <div class="block-content">

             <div class="float-left">
                <h5 class="text-white">Institucional</h5>
                <ul style="text-align: left;">
                    <li><a href="#" class="text-dark"> <b>Políticas</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Contáctanos</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Preguntas Candidatos</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Registros Cuentas</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Sugerencias</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Centro de ayuda</b> </a></li>
                </ul>
            </div>

        </div>
    </div>

    <div class="col-md-3 ml-auto">

        <div class="block-content">
            <div class="float-left">
                <h5 class="text-white">Reclutadores</h5>
                <ul style="text-align: left;">
                    <li><a href="#" class="text-dark"> <b>Preguntas Reclutadores</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Registros Empresas</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Ingresos Empresas</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Directorios de Empresas</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Reclutamiento Internacional</b> </a></li>
                    <br>
                    <li><a href="#" class="text-dark"> <b>Contate con nosotros</b> </a></li>
                </ul>
            </div>
        </div>
        
    </div>

    <div class="col-md-3 ml-auto">
        <div class="block-content">
         <div class="float-left">
            <center>
                <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid">
                
                <br><br>
                <a href="#"><i class="fa fa-facebook-square fa-2x" style="color: black;"></i></a>
                <a href="#"><i class="fa fa-instagram fa-2x" style="color: black;"></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-2x" style="color: black;"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-2x" style="color: black;"></i></a>
                <a href="#"><i class="fa fa-youtube-play fa-2x" style="color: black;"></i></a>
            </center>
        </div>

    </div>
</div>

</div>




<div class="row justify-content-center text-center">
    <div class="col-md-12">

        <div class="block-content">
            <hr>
            <p class="text-white">© <?php echo date("Y"); ?> MundoEmpleo.com Todos los Derechos Reservados </p>

        </div>

    </div>
</div>


</div>
</footer>
<!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Terms Modal -->
<div class="modal fade" id="modal-terms2" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Cambiar Imagen</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="block">
                        <div class="block-content block-content-full">
                            <h4>Subir foto perfil</h4>
                            <form method="POST" action="Modelos/ModelosImagenes/CambiarImagenPerfil.php" enctype="multipart/form-data">
                                <input type="hidden" name="Iduser" value="<?php echo$IDUser; ?>">
                                <input type="hidden" name="imgperfil" value="<?php echo$FotoUser; ?>">
                                <input type="file" name="imgusu" id="imgusu" class="form-control" accept="image/*" required />
                                <br>
                                <center>
                                    <div id="respuestaIMG"></div>
                                </center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type='submit' class='btn btn-alt-primary' name='Guardar' id="valida2r">
                                <i class='fa fa-save mr-5'></i>Guardar
                            </button>
                            
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->



