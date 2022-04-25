<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();


?>
<title>Soporte | Paises</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">

  #imgbanner{

    background: url('../assets/media/photos/Soporte_Tecnico.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height:auto;
  }  

</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner">
    <div class="">
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Panel Países </h2>
        </div>
      </div>
    </div>
  </div>


  <div style="margin-right:2%; margin-left:2%;">

    <div class="bg-body-light border-b">
      <div class="content py-5 text-center">
        <nav class="breadcrumb bg-body-light mb-0">
          <a class="breadcrumb-item" href="soporte-base-de-datos.php">Mantenimiento a la tabla </a>
          <span class="breadcrumb-item active"><b>Países</b></span>

        </nav>
      </div>
    </div>

    <div class="content py-5 text-center">


      <br>
      <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>

      <a href="departamentos-pais" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i> Departamentos</a>

  </div>

  <div class="block block-themed block-rounded">
    <div class="block-header " style="background: #0B3486;">
      <h3 class="block-title"><b>Control de los países</b></h3>
      <div class="block-options">

        <a class="btn btn-light" href="javascript:void(0)" class="btn-block-option"  data-toggle="modal" data-target="#ModalAgregar">
          <i class="fa fa-caret-right fa-2x5"> </i> <b>Nuevo</b>
        </a>

      </div>
    </div>

    <div class="block-content">

      <div class="table-responsive">

        <table id="resultTablas" class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>#Codigo</th>
              <th>Nombre del País</th>
              <th>Opciones</th>
            </tr>
          </thead>
          <tbody style="font-size: 20px;">                           
          </tbody>        
        </table>               
      </div>

    </div>
  </div>





</main>


<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Nombre del pais</h5>
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
                  <label for="" class="col-form-label">Nombre del pais:</label>
                  <input type="text" class="form-control" id="pais">
                  <input type="hidden" class="form-control" id="codigoPais">
                </div>
              </div>

            </div>

            <div>
              <center>
                <div id="resultestatus"></div>
              </center>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnActualizar" class="btn btn-warning"><b>Actualizar</b></button>
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
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo pais</h5>
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
                  <label for="" class="col-form-label">Nombre del pais:</label>
                  <input type="text" class="form-control" id="nuevoPais" >
                  
                </div>
              </div>

            </div>

            <div>
              <center>
                <div id="resultestatus"></div>
              </center>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnAgregar" class="btn btn-warning" style="color:#0B3486; font-weight: bold;">Guardar </button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>



<!-- Terms Modal -->
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Eliminar Pais</h3>
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
                    <label for="" class="col-form-label">Nombre del pais:</label>
                    <input type="text" class="form-control" id="paisEliminar" disabled>
                    <input type="hidden" class="form-control" id="codigo">
                  </div>
                </div>

              </div>

              <div>
                <center>
                  <div id="resultestatus"></div>
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








<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
include_once 'templates/Instrucciones.php'
?>

<script type="text/javascript">




  $(mostrarPaises(""));
  function mostrarPaises(){

   tablaUsuarios = $('#resultTablas').DataTable({  
    "ajax":{            
      "url": "Modelos/paises/mostrar-paises.php", 

      "dataSrc":""
    },
    "columns":[
    {"data": "IDPais"},
    {"data": "Nombre"},
    {"defaultContent": "<div class='text-center'><div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fa fa-check fa-2x5'></i>Editar</button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa fa-trash-o fa-2x5'></i> Eliminar</button></div></div>"}
    ]
  });

 }


//accion para capturar los datos de la tabla
$(document).on("click", ".btnEditar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombrepais = fila.find('td:eq(1)').text();
    $("#pais").val(nombrepais);
    $("#codigoPais").val(id);
    $('#modalCRUD').modal('show');       
  });


$(document).on("click", ".btnBorrar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombrepais = fila.find('td:eq(1)').text();
    $("#paisEliminar").val(nombrepais);
    $("#codigo").val(id);
    $('#ModalEliminar').modal('show');       
  });



$('#btnActualizar').on('click', function() {

 var pais =$('#pais').val();
 var  codigo =$('#codigoPais').val();
 tipo="Se ha actualizado ";
 $.ajax({
  url: 'Modelos/paises/actualizar-pais.php' ,
  type: 'post' ,
  data: {Pais:pais,codigo:codigo},
  beforeSend: function() {   $("#resultestatus").html('<i class="fa fa-sun-o fa-spin text-warning"></i>');}
})
 .done(function(response){
  var result = response;

  if (result == 1){

    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrarPaises(""));
    
    swal({title:'éxito',text:'Se ha actualizado el pais',type:'success'  , timer: 2000});

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
   $("#resultestatus").html('');
   

 })

});



$('#btnAgregar').on('click', function() {


 var  Pais =$('#nuevoPais').val();

 $.ajax({
  url: 'Modelos/paises/agregar-pais.php' ,
  type: 'post' ,
  data: {Pais:Pais},
  beforeSend: function() {   $("#resultestatus").html('<i class="fa fa-sun-o fa-spin text-warning"></i>');}
})
 .done(function(response){
  var result = response;

  if (result == 1){
    swal({title:'éxito',text:'Se ha agregado el pais',type:'success'  , timer: 2000});
    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrarPaises(""));
    $('#nuevoPais').val("");

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
   $("#resultestatus").html('');
   
 })

});



$('#btnEliminar').on('click', function() {


 var  codigoPais =$('#codigo').val();

 $.ajax({
  url: 'Modelos/paises/eliminar-pais.php' ,
  type: 'post' ,
  data: {codigo:codigoPais},
  beforeSend: function() {   $("#resultestatus").html('<i class="fa fa-sun-o fa-spin text-warning"></i>');}
})
 .done(function(response){
  var result = response;

  if (result == 1){
    $('#ModalEliminar').modal('hide'); 
    
    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrarPaises(""));

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
   $("#resultestatus").html('');


 })

});




</script>