<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/seguridadCpanel.php';

$id= base64_decode($_GET['id']);

$sql ="SELECT `Nombre` , `Apellidos` , `Correo` , `Foto` , UltimaConexion FROM `usuarios_cuentas` WHERE `IDUsuario` = ? ";
$stmt = $Conexion->ejecutar_consulta_simple_Where($sql , $id);

$sql2 ="SELECT `confidencial`  FROM usuario_perfil  WHERE IDUsuario = ? ";
$stmt2 = $Conexion->ejecutar_consulta_simple_Where($sql2 , $id);
while ($item=$stmt2->fetch())
{

  $confidencial = $item['confidencial'];   

}

while ($item=$stmt->fetch())
{
 $Nombres = $item['Nombre'];
 $Apellidos = $item['Apellidos'];
 $Email = $item['Correo'];
 $Foto =  $item['Foto'];  
 $UltimaConexion = $item['UltimaConexion'];

}


//Consulta para extraer los paies
$sql3 = "SELECT * FROM `tipo_seleccion_candidatos`";
$stmt3 = $Conexion->ejecutar_consulta_simple($sql3);


?>
<title>Seguimiento | Usuario</title>

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

  #iconosColor{
    color: #ffca28;
  }

  #botones{
    background: #FCC201;
  }

  .float6{
    position:fixed;
    width:60px;
    height:60px;
    bottom: 430px;
    right: 25px;
    border-radius:50px;
    text-align:center;
    font-size:30px;
    z-index:100;
  }

  .my-float6{
    margin-top:16px;
  }


   #imgbanner{

    background: url('../assets/media/photos/Seguimientos-Candidatos.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }

</style>


<div href="#" class="float6">
  <div id="resultcvemail"></div>
</div>  

<main id="main-container">

 <div class="bg-image bg-image-bottom" id="imgbanner" >
  <div>
    <div class="content content-top text-center overflow-hidden">
      <div class="pt-40 pb-20">
        <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Seguimiento De Candidatos </h3>
      </div>
    </div>
  </div>
</div>



  <div style="margin-right:2%; margin-left:2%;">


    <div class="row gutters-tiny">
      <!-- Basic Info -->
      <div class="col-md-6">
        <input type="hidden" name="Iduser" id="Iduser" value="<?php echo $IDUser; ?>"> 
        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">
            <h3 class="block-title">Información del usuario </h3>
            <div id="status"></div>
            <div class="block-options">

              <a href="seguimientos" class="btn btn-sm btn-alt-primary" >Ir a seguimientos</a>

              
            </div>
          </div>
          <div class="block-content block-content-full">

            <div class="block">
              <div class="block-content">

                <p> <?php echo $PrimerNombre[0] ." ". $PrimerApellido[0]; ?> Cualquier tipo de información que esté relacionada al candidato no será compartida al usuario ni publicada en esta plataforma. En la tabla quedara registrado el seguimiento del candidato.</p>

                <div class="block block-themed text-center">
                  <div class="block-content block-content-full block-sticky-options pt-30 bg-primary-dark">

                    <img class="img-avatar img-avatar-thumb" src="../../assets/img/user/<?php echo $Foto ?>" alt="" style="width: 150px; height: 150px;">
                  </div>
                  <div class="block-content block-content-full block-content-sm bg-gd-primary">
                    <div class="font-w600 text-white mb-5"> <?php if ($confidencial == "Privado"){  ?>
                     <b>N/D</b>
                   <?php }else{ ?>
                    <b><?php echo$Nombres ." ". $Apellidos; ?></b>
                    <?php } ?></div>
                    <div class="font-size-sm text-white-op"><?php echo$Email; ?></div>
                  </div>

                </div>

              </div>
            </div>


          </div>
        </div>


      </div>
      <!-- END Basic Info -->

      <!-- More Options -->
      <div class="col-md-6">
        <!-- Status -->
        <div class="block block-rounded block-themed">
          <div class="block-header bg-gd-primary">
            <h3 class="block-title">Opciones adicionales</h3>

          </div>
          <div class="block-content block-content-full">

            <div class="row gutters-tiny invisible" data-toggle="appear" data-class="animated bounceInLeft" >

              <div class="col-md-4">
                <a class=" text-center" href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms3">
                  <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
                    <p class="mt-5">
                     <img src="../assets/iconos/empresa/enviaremailicono.png">
                   </p>
                   <p class="font-w600 text-white">Enviar un <br> E-mail</p>
                 </div>
               </a>
             </div>

             <div class="col-md-4">
              <a class=" text-center" href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms4">
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
                  <p class="mt-5">
                    <img src="../assets/iconos/empresa/tipo_seguimiento.png">
                  </p>
                  <p class="font-w600 text-white">Tipo<br>Seguimiento</p>
                </div>
              </a>
            </div>

            <div class="col-md-4">
              <a class="text-center" href="cv?id=<?php echo $_GET['id'] ?>" >
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
                  <p class="mt-5">
                    <img src="../assets/iconos/empresa/perfil_candidato.png">
                  </p>
                  <p class="font-w600 text-white">Perfil<br>Candidato</p>
                </div>
              </a>
            </div>

            <div class="col-md-6">
              <a class=" text-center"  href="javascript:void(0)" data-toggle="modal" data-target="#modal-terms5" >
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
                  <p class="mt-5">
                    <img src="../assets/iconos/empresa/EliminarSeguimiento.png">
                  </p>
                  <p class="font-w600 text-white">Eliminar<br>Seguimiento</p>
                </div>
              </a>
            </div>


            <div class="col-md-6">
              <a class=" text-center"  href="chat?chats=<?php echo base64_encode($_SESSION['iduser']); ?>&estado=<?php echo base64_encode('Notificar'); ?>&usuario=<?php echo $_GET['id'] ?>&email=<?php echo $Email ?>"  >
                <div class="block-content ribbon ribbon-bookmark ribbon-crystal  cuadros">
                  <p class="mt-5">
                    <img src="../assets/iconos/empresa/chatusuario.png">
                  </p>
                  <p class="font-w600 text-white">Chat<br>Usuario</p>
                </div>
              </a>
            </div>



          </div>



        </div>
      </div>
    </div>
  </div>



  <div class="block" >
    <div class="block-content block-content-full"><br>
     <h3>Historial del candidato</h3>

     <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">        
          <table id="tablaUsuarios" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>N°</th>
                <th>Tipo Seguimiento</th>
                <th>Comentario</th>
                <th>fecha registro</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody>                           
            </tbody>        
          </table>               
        </div>
      </div>
    </div>  


      <!--
      <div id="resultcandidatos"></div>
    -->
  </div>
</div>




<!-- Terms Modal -->
<div class="modal fade" id="modal-terms5" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Eliminar Seguimiento</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full">
              <form action="Modelos/ModelosSeguimientos/Eliminar-historial-seguimiento.php" method="POST"> 
               <p>Seguro que desea eliminar el seguimiento de <?php if ($confidencial == "Privado"){  ?>
                 <b>N/D</b>
               <?php }else{ ?>
                <b><?php echo$Nombres ." ". $Apellidos; ?></b>
                <?php } ?></p>
                <input type="hidden" name="iduserhistorial" value="<?php echo$_GET['id'] ?>">
                <input type="hidden" name="idempresaHistorial" value="<?php echo $IDEmpresa ?> ">

              </div>
            </div>

            <div class="modal-footer">
              <button type='submit' class='btn btn-alt-danger' name='EliminarSeguimiento' id="EliminarSeguimiento">
                <i class='fa fa-save mr-5'></i>Eliminar
              </button>
            </form>
            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Terms Modal -->


<!-- Terms Modal -->
<div class="modal fade" id="modal-terms3" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Enivar un correo electrónico</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full">

              <div class="form-group row">
                <label class="col-12">Asunto*</label>
                <div class="col-12">
                  <input type="text" class="form-control" name="Asunto"  id="Asunto" required placeholder="Por favor,ingrese el asunto" >
                </div>
              </div>


              <div class="form-group row">
                <label class="col-12">Comentario*</label>
                <div class="col-12">
                  <textarea  id="js-ckeditor2" name="Comentario"  id="Comentario" placeholder="escribe tu comentario" rows="8" required></textarea>

                </div>
              </div>

              <input type="hidden" name="emailusuario" id="emailusuario" value="<?php echo$Email; ?>">


            </div>
          </div>
          <div class="modal-footer">
            <button type='submit' class='btn btn-alt-primary' name='EviarAsunto' id="EviarAsunto">
              <i class='fa fa-save mr-5'></i>Enviar
            </button>

            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Terms Modal -->


<!-- Terms Modal -->
<div class="modal fade" id="modal-terms4" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Tipo de Seguimiento</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full">

             <div class="form-group row">
              <label class="col-12" for="example-select2">Seleccione el tipo seguimiento*</label>
              <div class="col-12" >
                <!-- Select2 (.js-select2 class is initialized in Helpers.select2()) -->
                <!-- For more info and examples you can check out https://github.com/select2/select2 -->
                <select class="form-control" id="opcionSeguimiento" name="opcionSeguimiento" style="width: 100%;" data-placeholder="Selecciona una opción" >
                  <option value="" selected disabled >Seleccione una opción</option>

                  <?php 
                  while ($item=$stmt3->fetch())
                  {
                   echo "<option value=".$item['IDSeleccion'].">".$item['Nombre']."</option>";
                 }

                 ?>
               </select>

             </div>
           </div>

           <div class="form-group row">
            <label class="col-12">Comentario*</label>
            <div class="col-12">
             <textarea class="form-control" id="js-ckeditor" id="comentarioSeguimiento" name="comentarioSeguimiento" placeholder="Main Description" rows="8" required></textarea>
           </div>
         </div>

       </div>
     </div>
     <div class="modal-footer">
      <button type='submit' class='btn btn-alt-primary' name='Confirmar' id="Confirmar">
        <i class='fa fa-save mr-5'></i>Guardar
      </button>

      <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

    </div>

  </div>
</div>
</div>
</div>
</div>
<!-- END Terms Modal -->

</main>

<?php if (isset($_GET['success'])) {?>
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
                <div class="col-md-10 col-lg-12">

                  <img src="../../assets/recusosMundoEmpleo/logo.png" class="img-fluid" style="height: 100px; width: 250px;"  data-toggle="appear" data-class="animated flipInY">
                  <h3 class="font-size-h2 font-w300 mt-20" data-toggle="appear" data-class="animated flipInY"  id="titulos" style="color: #0B3486;">Has agreado el Seguimiento de <br> <?php echo $_GET['user']; ?> </h3>
                  
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


<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">
  CKEDITOR.replace( 'js-ckeditor2' );
  CKEDITOR.add            
</script>
<script>


 $('#EviarAsunto').on('click', function() {

  var emailEnviar =$('#emailusuario').val();
  var asunto = $('#Asunto').val();
  var comentario = CKEDITOR.instances['js-ckeditor2'].getData();
  
  

  if(asunto == ""){
    swal({title:'advertencia',text:'Por favor, ingrese un asunto',type:'warning' , timer: 2000 });
  }else if(comentario == ""){
    swal({title:'advertencia',text:'Por favor, ingrese el comentario',type:'warning' , timer: 2000 });
  }else{

    $.ajax({
      url: 'cv-email-destino-comentario.php' ,
      type: 'get' ,
      data: {comentario:comentario,emailEnviar:emailEnviar,asunto:asunto},

      beforeSend: function() {

        swal({
          title: "Cargando...",
          text: "Por favor espera",
          imageUrl: "../../assets/img/icono/loader.gif",
          button: false,
          closeOnClickOutside: false,
          closeOnEsc: false,
          imageWidth: 100,
          imageHeight: 100,
          showCancelButton: false,
          showConfirmButton: false
        });

      }

    })
    .fail(function(request, errorType, errorMessage){
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
    .always(function(){
      swal({title:'éxito',text:'Se ha enviado el mensaje',type:'success'});
      $("#resultcvemail").html('');
      CKEDITOR.instances['js-ckeditor2'].setData('');
      $('#Asunto').val('');


    })

  }





});

//--FIN DEL ESCRIPT DEL ENVIAR UN CORREO
//
//AGREGAR EL SEGUIMIENTO AQUI
//

$('#Confirmar').on('click', function() {


  var tipoSeguimiento = $('#opcionSeguimiento option:selected');
  var evaluartipoSeguimiento = tipoSeguimiento.val();

  var mensaje = CKEDITOR.instances['js-ckeditor'].getData();
  

  $.ajax({
    url: 'Modelos/ModelosSeguimientos/agregar-historial-seguimiento.php' ,
    type: 'post' ,
    data: {usuario:"<?php echo$_GET['id'] ?>",empresa:"<?php echo$IDEmpresa?>",seguimiento:evaluartipoSeguimiento,comentario:mensaje},
    beforeSend: function() {
      swal({title:'éxito',text:'Procesando el envio del mensaje. Por favor espere.',type:'success'  , timer: 2000});
      $("#resultcvemail").html('<i class="fa fa-sun-o fa-spin text-white"></i>');
      
    }
  })
  .done(function(response){
    var result = response;

    if (result == 1){

      swal({title:'éxito',text:'Se ha agreado el seguimiento del candidato',type:'success'  , timer: 2000});

      var table = $('#tablaUsuarios').DataTable();
      table.destroy();
      $(mostrarSeguimiento(""));

    }else{
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio ',type:'error'});
    } 

  })
  .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
  .always(function(){
    $("#resultcvemail").html('');
    $("#opcionSeguimiento").val($("#opcionSeguimiento option:first").val());
    CKEDITOR.instances['js-ckeditor'].setData('');

  })




});



$(mostrarSeguimiento(""));


function mostrarSeguimiento(){


 tablaUsuarios = $('#tablaUsuarios').DataTable({
 "language": {
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }},  
  "ajax":{            
    "url": "Modelos/ModelosSeguimientos/mostrar-seguimiento.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{usuario:"<?php echo$_GET['id'] ?>",empresa:"<?php echo$IDEmpresa?>"
        }, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
      },
      "columns":[
      {"data": "IDProceso"},
      {"data": "Nombre"},
      {"data": "Comentario"},
      {"data": "fecha_registro"},
      {"defaultContent": "<div class='text-center'><div class='btn-group'></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>Eliminar</i></button></div></div>"}

      

      ]
    });


}


$(document).on("click", ".btnBorrar", function(){
  fila = $(this);           
  user_id = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;   
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+user_id+"?");                
    if (respuesta) {            
      $.ajax({
        url: "Modelos/ModelosSeguimientos/eliminar-seguimiento.php",
        type: "POST",
        datatype:"json",    
        data:  {opcion:opcion, user_id:user_id},    
        success: function() {
          tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
        }
      }); 
    }
  });

</script>

