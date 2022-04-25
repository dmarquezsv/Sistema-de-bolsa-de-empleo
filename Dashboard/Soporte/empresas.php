<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

?>
<title>Soporte técnico | Mundo Empleos CA</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/inicio_sesion_empresa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:auto;
  }

  th
  {
    font-size: 10px;
    font-family: sans-serif;
    font-weight: normal;

  }

  td{
   font-size: 12px;
   font-family: sans-serif;
   font-weight: normal;
 }

</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Empresas</h3>
        </div>
      </div>
    </div>
  </div>


  <div class="bg-body-light border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-light mb-0">
        <a class="breadcrumb-item" href=""><b>Usuarios Activos</b></a>
        <span class="breadcrumb-item active"><b>Áreas Empresas</b></span>
      </nav>
    </div>
  </div>


  <div class="content py-5 text-center">

    <br>
    <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>

    <a  href="javascript:void(0)" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"  data-toggle="modal" data-target="#ModalAgregar">
      <i class="fa fa-caret-right fa-2x5"> </i> Nuevo Usuario
    </a>

   


    <br><br>

    <div class="col-lg-12">

      <div class="alert alert-secondary text-left" role="alert" style="border-left: solid 5px; border-color: #FCC201; ">
        
       <i class="fa fa-info-circle fa-2x5"></i>  Indicaciones : Para realizar una busqueda deberá digitar en el buscador el nombre del usuario o por los nombres de los campos de cada celdas que se muestra en la tabla. Puede utilizar tambien los filtros al dar <b>clic</b> en cada columna.<br>

     </div>



   </div> 

   <br>

 </div>


 <div style="margin-right:2%; margin-left:2%;">

  <div class="block block-themed block-rounded">
    <div class="block-header bg-gd-primary" >
      <h3 class="block-title"><b>Control de las empresas</b></h3>
      <div class="block-options">



      </div>
    </div>

    <div class="block-content">

      <div class="table-responsive">

        <table id="resultTablas" class="table table-striped table-bordered">

          <thead class="text-center">
            <tr>
              <th style="width: 5px;">IDUser</th>      
              <th>Nombres</th>
              <th>Apellidos</th>     
              <th>E-mail</th>
              <th>Estado Cuenta</th>
              <th>Nombre Empresa</th>
              <th>Tipo Empresa</th>
              <th>Locación</th>
              <th>Estado Empresa</th>
              <th>Perfil Empresa</th>
              <th>Opciones</th>
            </tr>
          </thead>

          <tfoot>
            <tr  class="text-center">
              <th style="width: 5px;">IDUser</th>      
              <th>Nombres</th> 
              <th>Apellidos</th>      
              <th>E-mail</th>
              <th>Estado Cuenta</th>
              <th>Nombre Empresa</th>
              <th>Tipo Empresa</th>
              <th>Locación</th>
              <th>Estado Empresa</th>
              <th>Perfil Empresa</th>
              <th>Opciones</th>
            </tr>
          </tfoot>

          <tbody>                           
          </tbody>        
        </table>               
      </div>

    </div>
  </div>

</div>

</main>

<!-- Terms Modal -->
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Eliminar cuenta</h3>
          <div class="block-options">
            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
              <i class="si si-close"></i>
            </button>
          </div>
        </div>
        <div class="block-content">
          <div class="block">
            <div class="block-content block-content-full">

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="" class="col-form-label">Nombres:</label>
                    <input type="text" class="form-control" id="cuentaUsuario" disabled>
                    <label for="" class="col-form-label">Apellidos:</label>
                    <input type="text" class="form-control" id="cuentaUsuario2" disabled>
                    <input type="hidden" class="form-control" id="codigo2">
                  </div>
                </div>

              </div>

              <div>
                <center>
                  <div id="resultestatus2"></div>
                </center>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar </button>

            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cerrar</button>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Terms Modal -->


<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar cuenta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuarios">    
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">

                  <label for="" class="col-form-label">Nombre del usuario:</label>
                  <input type="text" class="form-control" id="NombreActualizar">

                  <label for="" class="col-form-label">Apellidos del usuario:</label>
                  <input type="text" class="form-control" id="ApellidoActualizar">

                  <label for="" class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control" id="EmailActualizar">
                  
                  <label>Estado de la cuenta</label>
                  <select id="estadoCueta" class="form-control" >
                   <option selected disabled value="">Seleccione una opción</option>
                    <option value="Token">Token</option>
                    <option value="Activo">Activo</option>
                    <option value="Denegado">Denegado</option>
                    <option value="Seguridad">Seguridad</option>
                  </select>

                  <input type="hidden" name="estadouser" id="estadouser">

                  <input type="hidden" name="codigoActualizar" id="codigoActualizar">

                  <div id="respuesta2"></div>

                  
                </div>
              </div>

            </div>

            <div>
              <center>
                <div id="resultestatus2"></div>
              </center>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnActualizar" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5">Actualizar</button>
            <button type="button" id="btnpassowrod" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5">Cambiar Contraseña</button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuarios">    
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">

                  <label for="" class="col-form-label">Nombres:</label>
                  <input type="text" class="form-control" id="Nombres" placeholder="Nombres del cliente">

                  <label for="" class="col-form-label">Apellidos:</label>
                  <input type="text" class="form-control" id="Apellidos" placeholder="Apellidos del cliente">

                  <label for="" class="col-form-label">E-mail:</label>
                  <input type="text" class="form-control" id="email" placeholder="Correo Electrónico">

                  <div id="respuesta"></div>
                  
                  
                </div>
              </div>

            </div>

            <div>
              <center>
                <div id="resultestatus2"></div>
              </center>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnAgregar" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5" >Guardar </button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>


<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>


<script type="text/javascript">

  $(mostrar(""));
  function mostrar(){

   tablasInformacion = $('#resultTablas').DataTable({
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
        "url": "Modelos/empresas/mostrar-usuarios-empresas.php", 
        "dataSrc":""
      },
      "columns":[
      {"data": "ID"},
      {"data": "nombres"},
      {"data": "apellidos"},
      {"data": "email"},
      {"data": "estadoCuenta"},
      {"data": "empresa"},
      {"data": "tipoEmpresa"},
      {"data": "lugar"},
      
      {"data": "estadoempresa"},
      {"data": "perfilEmpresa"},
      {"defaultContent": "<div class='text-center'><div class='text-center'><div class='btn-group'><button class='btn  btn-rounded btn-noborder btn-alt-primary  btnEditar'>Editar</button><button class='btn  btn-rounded btn-noborder btn-alt-primary  btnBorrar'> Eliminar</button> </div></div>"}
      ]
    });

 }


//accion para capturar los datos de la tabla

$(document).on("click", ".btnEditar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombres = fila.find('td:eq(1)').text();
    apellidos = fila.find('td:eq(2)').text();
    Email = fila.find('td:eq(3)').text();
    estadoCuenta = fila.find('td:eq(4)').text();

    $("#NombreActualizar").val(nombres);
    $("#ApellidoActualizar").val(apellidos);
    $("#EmailActualizar").val(Email);
    $("#estadouser").val(estadoCuenta);
    $("#codigoActualizar").val(id);
    $('#modalCRUD').modal('show');


  });


$(document).on("click", ".btnBorrar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombres = fila.find('td:eq(1)').text();
    Apellidos = fila.find('td:eq(2)').text();

    $("#cuentaUsuario").val(nombres);
    $("#cuentaUsuario2").val(Apellidos);
    $("#codigo2").val(id);
    $('#ModalEliminar').modal('show');       
  });



$('#btnActualizar').on('click', function() {

  var ExisteCorreo = $('#validez').val();


  var  Nombres =$('#NombreActualizar').val();
  var  Apellidos =$('#ApellidoActualizar').val();
  var  email =$('#EmailActualizar').val();

  var estadoSeleccionado = $('#estadoCueta option:selected');
  var evaluarEstado = estadoSeleccionado.val();

  var  estadoUser =$("#estadouser").val();

  var  id =$('#codigoActualizar').val();

  $.ajax({
    url: 'Modelos/usuarios/actualizar-cuenta-candidatos.php' ,
    type: 'post' ,
    data: {Nombres:Nombres,Apellidos:Apellidos,email:email,id:id , evaluarEstado:evaluarEstado , estadoUser:estadoUser},

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
  .done(function(response){

    swal({title:'éxito',text:'Se ha actualizado el usuario',type:'success'  , timer: 2000});
    $('#Nombres').val("");
    $('#Apellidos').val("");
    $('#email').val("");
    $("#resultestatus2").html('');
    
    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrar(""));


  })
  .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
  .always(function(){

    $("#resultestatus2").html('');

  })



});



$('#btnEliminar').on('click', function() {

  var  id =$('#codigo2').val();

  $.ajax({
    url: 'Modelos/usuarios/eliminar-cuenta-candidatos.php' ,
    type: 'post' ,
    data: {id:id},

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
  .done(function(response){

    swal({title:'éxito',text:'Se ha eliminado el usuario',type:'success'  , timer: 2000});
    
    $("#resultestatus2").html('');
    $('#ModalEliminar').modal('hide');        
    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrar(""));


  })
  .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
  .always(function(){

    $("#resultestatus2").html('');

  })



});



$('#btnpassowrod').on('click', function() {



  var  email2 =$('#EmailActualizar').val();
  

  $.ajax({
    url: 'restablecer.php' ,
    type: 'post' ,
    data: {cooreo:email2},
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
  .done(function(response){

    swal({title:'éxito',text:'Se ha actualizado la contraseña del usuario',type:'success'  , timer: 2000});
    
    $("#resultestatus2").html('');
    
    


  })
  .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
  .always(function(){

    $("#resultestatus2").html('');

  })



});



$('#btnAgregar').on('click', function() {

  var ExisteCorreo = $('#validez').val();

  if (ExisteCorreo == 1){
    swal({title:'Aviso',text:'E-mail ya se encuentra en uso',type:'warning' , timer: 2000 });
    return false;
  }else{

   var  Nombres =$('#Nombres').val();
   var  Apellidos =$('#Apellidos').val();
   var  email =$('#email').val();

   $.ajax({
    url: 'agregar-empresa.php' ,
    type: 'post' ,
    data: {Nombres:Nombres,Apellidos:Apellidos,email:email},
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
   .done(function(response){

    swal({title:'éxito',text:'Se ha agregado el usuario',type:'success'  , timer: 2000});
    $('#Nombres').val("");
    $('#Apellidos').val("");
    $('#email').val("");
    $("#resultestatus2").html('');
    
    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrar(""));


  })
   .fail(function(request, errorType, errorMessage){
      //timeout, error, abort, parseerror
      swal({title:'alerta',text:'Intente de nuevo para procesar el envio',type:'error'});
      console.log(errorType);
      alert(errorMessage);
    })
   .always(function(){

    $("#resultestatus2").html('');

  })

 }

});


$(document).on('keyup','#email', function(){
  var valor = $(this).val();
  if (valor != "") {
   buscar_datos(valor);
 }
});

$(buscar_datos());

function buscar_datos(consulta){
  $.ajax({
    url: '../../main/ModelosUsuarioCuentas/ValidarUsuarioCorreo.php' ,
    type: 'POST' ,
    dataType: 'html',
    data: {consulta: consulta},
  })
  .done(function(respuesta){
    $("#respuesta").html(respuesta);
  })
  .fail(function(){
    console.log("error");
  });
}


</script>