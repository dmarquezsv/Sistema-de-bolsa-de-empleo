<?php 

if (!isset($_SESSION['EstadoAlerta'])) {
  if(isset($_GET['notificar'])){?>

         <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
        <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
                <div class="modal-content rounded">
                    <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
                        <div class="block-header justify-content-end">
                            <div class="block-options">
                                <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
                                   Salir
                               </a>
                           </div>
                       </div>
                       <div class="block-content block-content-full">

                         <div class="pb-50">
                            <div class="row justify-content-center text-center">
                                <div class="col-md-10 col-lg-8">
                                    <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;">
                                    <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">Bienvenido al panel principal! </h3>

                                    <p class="text-center" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
                                       <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Cualquier tipo de información que esté relacionada con tus datos personales no será compartida ni publicada en esta plataforma. 
                                    <br>

                                    <a href="politicas-plataforma" class="text-center" data-toggle="appear" data-class="animated fadeInUp" target="_blank">Leer Póliticas de la plataforma.</a>
                                    
                                   </p>

                                   

                                   <a class="btn  btn-alt-primary " href="#" data-dismiss="modal" aria-label="Close">OK</a>

                               </div>
                           </div>
                       </div>

                   

            </div>
        </div>
    </div>
</div>
</div>



<?php 
   } else if ($PorcentajePerfil < 100) {

        ?>

        <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
        <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
                <div class="modal-content rounded">
                    <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
                        <div class="block-header justify-content-end">
                            <div class="block-options">
                                <a class="font-w600 text-danger" href="#" data-dismiss="modal" aria-label="Close">
                                   Salir
                               </a>
                           </div>
                       </div>
                       <div class="block-content block-content-full">

                         <div class="pb-50">
                            <div class="row justify-content-center text-center">
                                <div class="col-md-10 col-lg-8">
                                    <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;">
                                    <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">¡Bienvenido a Mundo Empleo C.A.! </h3>

                          
                               </div>
                           </div>
                       </div>

                       <div class="slick-slide pb-50">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-8" data-toggle="appear" data-class="animated fadeInUp">

                                <h3 class="font-size-h4 font-w300 mb-5">Recuerda Completar tu perfil: <?php echo $PrimerNombre[0] ?> <i class="si si-note  text-primary"></i></h3>
                                <p>Al completar 100%  tiene más posibilidades que te contacte una empresa.Este mensaje dejará de mostrarse una vez completado el perfil. Si  prefiere dejar de recodar presione el botón <b>"Dejar de recodar"</b> y cuando inicie sesión otra vez te recordará  <br> </p>

                                <p>Si desea subir tu curriculum vitae haz clic <a href="documentos-usuario">aqui</a> o dirigete al botón subir documentos </p>

                                <?php 


                                if ($resultEducacion == 0 ) {
                                    echo "<h4 class='font-size-h6 font-w300 mb-5'><b>*No has agregado Educación Académica.</b> <a href='educacion-academico'>Agregar Educación</a></h4>";
                                }

                                if ($resultExperiencia == 0 ) {
                                    echo "<h4 class='font-size-h6 font-w300 mb-5'><b>*No has agregado Experiencia Laboral.</b> <a href='experiencia-laboral'>Agregar Experiencia</a></h4>";
                                }

                                if ($ResultIdiomas == 0 ) {
                                    echo "<h4 class='font-size-h6 font-w300 mb-5'><b>*No has agregado  un Idioma.</b> <a href='habilidades-usuario'>Agregar Idioma</a></h4>";
                                }

                                if ($ResultTecnicas == 0 ) {
                                    echo "<h4 class='font-size-h6 font-w300 mb-5'><b>*No has agregado Habilidades Técnica.</b> <a href='habilidades-usuario'>Agregar Habilidades</a></h4>";
                                }


                                if ($resultHabilidades == 0 ) {
                                    echo "<h4 class='font-size-h6 font-w300 mb-5'><b>*No has agregado Habilidades Personales.</b> <a href='habilidades-usuario'>Agregar Habilidades</a></h4>";
                                }


                                if ($resultReferencia == 0 ) {
                                    echo "<h4 class='font-size-h6 font-w300 mb-5'><b>*No has agregado una referencia.</b> <a href='referencia-trabajo'>Agregar Referencia</a></h4>";
                                }



                                ?>
                                <br>

                                <center>

                                  <button type="button"  class="btn btn-sm btn-hero btn-noborder btn-warning mb-10 mx-5" style="background:#FCC201; color:#0B3486; font-weight: bold;" id="DejarRocordatorio">
                                    Dejar de recordar <i class="fa fa-arrow-right ml-5"></i>
                                </button>

                                <div id="status"></div>
                                <div id="result"></div>


                            </center>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- END Onboarding Modal -->
<?php } }  ?>










