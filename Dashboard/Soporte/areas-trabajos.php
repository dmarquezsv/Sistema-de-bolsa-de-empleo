<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();


?>
<title>Soporte | áreas trabajos</title>
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

          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Área de trabajo</h2>
        </div>
      </div>
    </div>
  </div>


<div style="margin-right:2%; margin-left:2%;">

  <div class="bg-body-light border-b">
    <div class="content py-5 text-center">
      <nav class="breadcrumb bg-body-light mb-0">
        <a class="breadcrumb-item" href="soporte-base-de-datos.php"><b>Mantenimiento a la tabla</b></a>
        <span class="breadcrumb-item active"><b>Áreas laborales</b></span>

      </nav>
    </div>
  </div>

  <div class="content py-5 text-center">


     <br>
     <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>

     <a href="cargos-trabajos" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i>Cargos de trabajos</a>

     <a href="tipos-empresas" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-redo fa-2x5"> </i>Categoria empresas</a>

</div>

<br>


<div class="block block-themed block-rounded">
  <div class="block-header " style="background: #0B3486;">
    <h3 class="block-title"><b>Control de las Áreas laborales</b></h3>
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
            <th>ID</th>
            <th>Áreas laborales</th>      
            <th>Opción</th>

          </tr>
        </thead >
        <tbody style="font-size: 20px;">                           
        </tbody>        
      </table>               
    </div>

  </div>
</div>




</main>



<div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar una  área laboral</h5>
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

                  <label for="" class="col-form-label">Nombre de la experiencia técnica:</label>
                  <input type="text" class="form-control" id="Nombres" placeholder="Nombres de la experiencia técnica">
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
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            <button type="button" id="btnAgregar" class="btn btn-warning" style="color:#0B3486; font-weight: bold;">Guardar </button>
          </div>
        </form> 
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar área laboral</h5>
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

                  <label for="" class="col-form-label">Nombre de la área laboral:</label>
                  <input type="text" class="form-control" id="NombreActualizar">

                  
                  <div id="respuesta2"></div>
                  

                  <input type="hidden" name="codigoActualizar" id="codigoActualizar">


                  
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

<!-- Terms Modal -->
<div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
    <div class="modal-content">
      <div class="block block-themed block-transparent mb-0">
        <div class="block-header bg-primary-dark">
          <h3 class="block-title">Eliminar la área laboral</h3>
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
                    <input type="text" class="form-control" id="nombreFacultad" disabled>

                    <input type="hidden" class="form-control" id="codigo2">
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





  $(mostrar(""));
  function mostrar(){

   tablasInformacion = $('#resultTablas').DataTable({  
    "ajax":{            
      "url": "Modelos/areas-trabajos/mostrar-areas-trabajos.php", 
      "dataSrc":""
    },
    "columns":[
    {"data": "IDCategoria"},
    {"data": "Nombre"},
    {"defaultContent": "<div class='text-center'><div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='fa fa-check fa-2x5'></i>Editar</button><button class='btn btn-danger btn-sm btnBorrar'><i class='fa fa-trash-o fa-2x5'></i> Eliminar</button> </div></div>"}
    ]
  });

 }


 $(document).on("click", ".btnEditar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombres = fila.find('td:eq(1)').text();

    $("#NombreActualizar").val(nombres);
    $("#codigoActualizar").val(id);
    $('#modalCRUD').modal('show');  

  });



 $(document).on("click", ".btnBorrar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombres = fila.find('td:eq(1)').text();
    

    $("#nombreFacultad").val(nombres);
    
    $("#codigo2").val(id);
    $('#ModalEliminar').modal('show');       
  });




 $('#btnAgregar').on('click', function() {




   var  Nombres =$('#Nombres').val();
   

   $.ajax({
    url: 'Modelos/areas-trabajos/agregar-areas-trabajos.php' ,
    type: 'post' ,
    data: {Nombres:Nombres},
    beforeSend: function() {   $("#resultestatus2").html('<i class="fa fa-sun-o fa-spin text-warning"></i>');}
  })
   .done(function(response){

    swal({title:'éxito',text:'Se ha agregado la área laboral',type:'success'  , timer: 2000});
    $('#Nombres').val("");
    
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


 $('#btnActualizar').on('click', function() {




  var  Nombres =$('#NombreActualizar').val();
  var  id =$('#codigoActualizar').val();

  $.ajax({
    url: 'Modelos/areas-trabajos/actualizar-areas-trabajos.php' ,
    type: 'post' ,
    data: {Nombres:Nombres,id:id},
    beforeSend: function() {   $("#resultestatus2").html('<i class="fa fa-sun-o fa-spin text-warning"></i>');}
  })
  .done(function(response){

    swal({title:'éxito',text:'Se ha actualizado la  área de trabajo ',type:'success'  , timer: 2000});
    
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
    url: 'Modelos/areas-trabajos/eliminar-areas-trabajos.php' ,
    type: 'post' ,
    data: {id:id},
    beforeSend: function() {   $("#resultestatus2").html('<i class="fa fa-sun-o fa-spin text-warning"></i>');}
  })
  .done(function(response){

    swal({title:'éxito',text:'Se ha eliminado la área laboral',type:'success'  , timer: 2000});
    
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



</script>