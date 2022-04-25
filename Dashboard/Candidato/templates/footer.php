 <br>
 <!-- Footer -->
 <footer id="page-footer" class="opacity-0" style="background: black;" >
    <div class="content py-20 font-size-xs clearfix"  style="background:black;">


     <div class="row text-center">
        <div class="col-md-3">
            <div class="block-content">

                <div class="float-left">
                    <h5 class="text-white">Conoce más</h5>
                    <ul style="text-align: left;">
                        
                        <li><a href="../../" class="text-white"> <b>Quienes Somos</b> </a></li>
                        <br>
                        <li><a href="#" class="text-white"> <b>Terminos y Condiciones</b> </a></li>
                        <br>
                        <li><a href="#" class="text-white"> <b>Preguntas Candidatos</b> </a></li>
                        <br>
                        <li><a href="#" class="text-white"> <b>Contáctanos</b> </a></li>
                        <br>
                        <li><a href="#" class="text-white"> <b>Centro de ayuda</b> </a></li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="col-md-3 ml-auto">
            <div class="block-content">

             <div class="float-left">
                <h5 class="text-white">Candidatos</h5>
                <ul style="text-align: left;">
                    <li><a href="../../crear-cuenta-candidato" class="text-white"> <b>Registros Cuentas</b> </a></li>
                    <br>
                    <li><a href="../../login-candidato" class="text-white"> <b>Ingresos Candidatos</b> </a></li>
                    <br>
                    <li><a href="../../todas-las-ofertas" class="text-white"> <b>Búsqueda de Empleos</b> </a></li>
                    <br>
                    <li><a href="../../candidato" class="text-white"> <b>Landing page Candidatos</b> </a></li>
                    <br>
                    <li><a href="../../terminos-condiciones" class="text-white"> <b>Terminos y Condiciones</b> </a></li>
                    <br>
                    <li><a href="../../preguntas-frecuentes-candidato" class="text-white"> <b>Preguntas frecuentes</b> </a></li>
                    
                </ul>
            </div>

        </div>
    </div>

    <div class="col-md-3 ml-auto">

        <div class="block-content">
            <div class="float-left">
                <h5 class="text-white">Reclutadores</h5>
                <ul style="text-align: left;">
                    <li><a href="../../crear-cuenta-empresarial" class="text-white"> <b>Registros Cuentas</b> </a></li>
                    <br>
                    <li><a href="../../login-empresa" class="text-white"> <b>Ingresos empresa</b> </a></li>
                    <br>
                    <li><a href="../../empresa" class="text-white"> <b>Landing page empresa</b> </a></li>
                    <br>
                    <li><a href="../../servicios-empresariales" class="text-white"> <b>Servicios empresariales</b> </a></li>
                    <br>
                    <li><a href="../../divisiones-especializadas" class="text-white"> <b>Divisiones especializadas</b> </a></li>
                    <br>
                    <li><a href="../../terminos-condiciones" class="text-white"> <b>Terminos y Condiciones</b> </a></li>
                    <br>
                    <li><a href="../../preguntas-frecuentes-empresa" class="text-white"> <b>Preguntas frecuentes</b> </a></li>
                    
                    
                </ul>
            </div>
        </div>
        
    </div>

    <div class="col-md-3 ml-auto">
        <div class="block-content">
         <div class="float-left">
            <center>
                <img src="../../assets/img/logo/logoMundoEmpleo.png" class="img-fluid">
                
                <br><br>
                <a href="#"><i class="fa fa-facebook-square fa-2x" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-instagram fa-2x" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-2x" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-2x" style="color: white;"></i></a>
                <a href="#"><i class="fa fa-youtube-play fa-2x" style="color: white;"></i></a>
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
                                <i class='fa fa-save mr-5'></i>Subir Foto
                            </button>
                        </form>


                        <?php if($FotoUser !="avatar15.jpg"){ ?>
                            <form action="Modelos/ModelosImagenes/eliminarFotoPerfil" method="POST">
                                <input type="hidden" name="IduserPerfil" value="<?php echo$IDUser; ?>">
                                <input type="hidden" name="imgperfilObtenido" value="<?php echo$FotoUser; ?>">
                                <button type='submit' class='btn btn-alt-primary' name='Eliminar' id="valida2r">
                                    <i class='fa fa-close mr-5'></i>Eliminar Foto
                                </button>
                            </form>
                        <?php } ?>

                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->


<div class="modal fade" id="EliminarCuenta" tabindex="-1" role="dialog" aria-labelledby="EliminarCuenta" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Eliminar Cuenta</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <div class="block">
                        <div class="block-content block-content-full">
                            <h4 class="text-center">¿Estas seguro de eliminar tu cuenta?</h4>
                            <form method="POST" action="Modelos/ModelosPerfil/eliminarPerfil.php">
                                <input type="hidden" name="IduserEliminar" value="<?php echo$IDUser; ?>">
                                <input type="hidden" name="imgperfilEliminar" value="<?php echo$FotoUser; ?>">
                                
                                
                            </div>
                        </div>
                        <div class="modal-footer">



                            <button type='submit' class='btn btn-alt-danger' name='Eliminar' id="valida2r">
                                Si
                            </button>
                        </form>




                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">No</button>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Terms Modal -->



