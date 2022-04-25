
<?php 

if (isset($_GET['success'])) {?>

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
                                <h3 class="font-size-h2 font-w300 mt-20">Bienvenido a Mundo Empleo C.A! </h3>
                                <p class="text-muted" style="text-align: justify;">
                                   <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Cualquier tipo de información que esté relacionada con tus datos personales no será compartida ni publicada en esta plataforma. Tus datos personales solo seran mostradas con los administradores de Mundo Empleo.
                                   <br><br>
                                   Si desea leer más información puedes leer Póliticas de la plataforma.
                               </p>

                               <p style="text-align: justify;">Al finalizar fecha <?php echo $FechaVencimiento ?> Ya no podra utilizar la plataforma por que deberas solicitar el servicio de Mundo Empleo.<br> </p>


                               <a href="#" class="btn btn-sm btn-hero btn-noborder  mb-10 mx-5" style="background:#FCC201; color:#0B3486; font-weight: bold;"> Ir <i class="fa fa-arrow-right ml-5"></i> </a>

                           </div>
                       </div>
                   </div>

                   <div class="slick-slide pb-50">
                    <div class="row justify-content-center">
                        <div class="col-md-10 col-lg-8">
                            <h3 class="font-size-h4 font-w300 mb-5">Novedades de la plataforma</h3>
                            <ul >
                                <li>-Publicar ofertas empleos</li>
                                <li>-Perfil de empresa</a></li>
                                <li>-Filtros de reclutamientos</li>
                                <li>-Notificaciones</li>
                                <li>-Seguimientos de usuario</li>
                                <li>-Reportes</li>
                                <li>-Chats</li>
                                <li>-Descargar curriculum vitae de los reclutadores pdf o word</li>
                                <li>-Enviar curriculum vitae  a tu correo</li>
                                <li>-Aplica a nivel regional</li>
                                <li>-Ver perfil completo</li>
                                <li>-Muchas cosas más</li>
                            </ul>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!-- END Onboarding Modal -->
<?php }  ?>


