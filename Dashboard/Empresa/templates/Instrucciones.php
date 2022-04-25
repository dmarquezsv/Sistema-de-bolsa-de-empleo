
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
                <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
                <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">Bienvenido a Mundo Empleo C.A.! </h3>

                <p class="text-muted" style="text-align: justify;" data-toggle="appear" data-class="animated fadeInUp">
  <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?>: Hemos terminado de configurar tu perfil de empresa. Recuerda al finalizar la fecha <?php $date = date_create($FechaVencimiento);  echo date_format($date,"d/m/Y"); ?>. Ya no podrá utilizar la plataforma por que deberás solicitar el servicio de Mundo Empleo Centroamérica.
               </p>







             </div>
           </div>
         </div>

         <div class="slick-slide pb-50">
          <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">

                <h3 class="font-size-h2 " data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">Novedades</h3>
              
              <ul data-toggle="appear" data-class="animated flipInY" >
                <li>-Publicar ofertas de empleos</li>
                <li>-Perfil de empresa</a></li>
                <li>-Filtros de reclutamientos</li>
                <li>-Notificaciones</li>
                <li>-Seguimientos de usuario</li>
                <li>-Reportes</li>
                <li>-Chats con candidatos</li>
                <li>-Descargar curriculum vitae de los reclutadores PDF</li>
                <li>-Enviar curriculum vitae  a tu correo electrónico </li>
                <li>-Ver perfil completo candidatos</li>
              </ul>

              <p class="text-center">
              <a class="btn  btn-alt-primary " href="#" data-dismiss="modal" aria-label="Close">OK</a>
              </p>
              
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



<?php 

if (isset($_GET['notificar'])) {?>

  <!-- Onboarding Modal functionality is initialized in js/pages/be_pages_dashboard.min.js which was auto compiled from _es6/pages/be_pages_dashboard.js -->
  <div class="modal fade" id="modal-onboarding" tabindex="-1" role="dialog" aria-labelledby="modal-onboarding" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-popout" role="document">
      <div class="modal-content rounded">
        <div class="block block-rounded block-transparent mb-0 bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
          <div class="block-header justify-content-end">
            <div class="block-options">
              <a class="font-w600 text-danger" href="?success=1" >
               Salir
             </a>
           </div>
         </div>
         <div class="block-content block-content-full">

           <div class="pb-50">
            <div class="row justify-content-center text-center">
              <div class="col-md-10 col-lg-8">

                <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
                <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">sube tu logo de empresa </h3>
                <p>Nota:El logo debe contener las dimensiones de 100 x 100</p>

                <br>
                <form method="POST" action="Modelos/ModelosImagenes/CambiarImagenEmpresa1vez.php" enctype="multipart/form-data">
                  <input type="hidden" name="IDempresa" value="<?php echo$IDEmpresa; ?>">
                  <input type="hidden" name="imgempresa" value="<?php echo$logo; ?>">
                  <input type="file" name="imgusu" id="imgusu" class="form-control" accept="image/*" required />
                  <br>
                  <center>
                    <div id="respuestaIMG"></div>
                  </center>
                </div>
              </div>
              <p class="text-center">

                <button type='submit' class='btn btn-sm btn-hero btn-noborder mb-10 mx-5' name='Guardar' id="valida2r" style="background:#FCC201; color:#0B3486; font-weight: bold;">
                  <i class='fa fa-save mr-5'></i>Guardar
                </button>

                <a href="?success=1" class="btn btn-sm btn-hero btn-noborder  mb-10 mx-5" style="background:#FCC201; color:#0B3486; font-weight: bold;"> luego <i class="fa fa-arrow-right ml-5"></i> </a>

              </p>
            </form>

            

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
