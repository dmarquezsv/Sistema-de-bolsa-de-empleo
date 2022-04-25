<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();

$sql = "SELECT * FROM `soporte_paises`";
$stmt = $Conexion->ejecutar_consulta_simple($sql);

?>
<title>Soporte | Empresas - Publicación</title>
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
          <h2 class="h4 font-w400  invisible" id="titulos"  style="color: white;" data-toggle="appear" data-class="animated fadeInUp">Habilitar Países </h2>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

    <div class="bg-body-light border-b">
      <div class="content py-5 text-center">
        <nav class="breadcrumb bg-body-light mb-0">
          <a class="breadcrumb-item" href="soporte-base-de-datos.php"><b>Empresa</b></a>
          <span class="breadcrumb-item active"><b>Países habilitados</b></span>

        </nav>
      </div>
    </div>

    <div class="content py-5 text-center">

      <br>
      <a href="empresa?iduser=<?php echo $_GET['iduser'];?>&idempresa=<?php echo $_GET['idempresa']?>" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Retroceder</a>


      
    </div>

    <br>


    <div class="block block-themed block-rounded">
      <div class="block-header " style="background: #0B3486;">
        <h3 class="block-title"><b>Control de la empresa</b></h3>
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
                <th>Países haiblitado</th>      
                <th>Opción</th>
              </tr>
            </thead >
            <tbody class="text-center" style="font-size: 20px;">                           
            </tbody>        
          </table>               
        </div>

      </div>
    </div>

  </div>
  

  <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Habilitar un país</h5>
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

                    <label>Seleccione un país</label>
                    <select class="js-select2 form-control pais" id="example-select2" name="OrigenPais" style="width: 100%;" data-placeholder="Selecciona una opción" >
                      <option selected value="" disabled>Selecciona una opción</option>
                      <?php 
                      while ($item=$stmt->fetch())
                      {
                       echo "<option value=".$item['IDPais'].">".$item['Nombre']."</option>";
                     }

                     ?>
                   </select>

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

 <!-- Terms Modal -->
  <div class="modal fade" id="ModalEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-slidedown" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header bg-primary-dark">
            <h3 class="block-title">Eliminar el país</h3>
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
                      <label for="" class="col-form-label">Nombres del país:</label>
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


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
include_once 'templates/Instrucciones.php'
?>

<script type="text/javascript">



  $(document).ready(function() {

    $("#example-select2").select2({
      dropdownParent: $("#ModalAgregar")
    });

    
  });


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
        "url": "Modelos/habilitar-paises-empresas/mostrar-paises-habilitado.php",
        "method": 'POST', //usamos el metodo POST
        "data":{id:<?php echo base64_decode($_GET['iduser']) ?>},
        "dataSrc":""
      },
      "columns":[
      {"data": "IDPaisesHabilitado"},
      {"data": "Nombre"},
      {"defaultContent": "<div class='text-center'><div class='text-center'><div class='btn-group'><button class='btn btn-danger btn-sm btnBorrar'><i class='fa fa-trash-o fa-2x5'></i> Eliminar</button> </div></div>"}
      ]
    });

 }

 $('#btnAgregar').on('click', function() {


  var pais = $('#example-select2 option:selected');
  var paiselejido = pais.val();


  $.ajax({
    url: 'Modelos/habilitar-paises-empresas/agregar-pais-habilitado.php' ,
    type: 'post' ,
    data: {paiselejido:paiselejido,id:<?php echo base64_decode($_GET['iduser']) ?>},
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

    swal({title:'éxito',text:'Se ha agregado el país',type:'success'  , timer: 2000});
    $('#Nombres').val("");
    $("#resultestatus2").html('');
    var table = $('#resultTablas').DataTable();
    table.destroy();
    $(mostrar(""));
    $("#example-select2").val($("#example-select2 option:first").val())


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

  $(document).on("click", ".btnBorrar", function(){           
    opcion = 2;//editar
    fila = $(this).closest("tr");         
    id = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
    nombres = fila.find('td:eq(1)').text();
    

    $("#nombreFacultad").val(nombres);
    
    $("#codigo2").val(id);
    $('#ModalEliminar').modal('show');       
  });


$('#btnEliminar').on('click', function() {

    var  id =$('#codigo2').val();
    
    $.ajax({
      url: 'Modelos/habilitar-paises-empresas/eliminar-pais-habilitado.php' ,
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

      swal({title:'éxito',text:'Se ha eliminado el país',type:'success'  , timer: 2000});
      
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