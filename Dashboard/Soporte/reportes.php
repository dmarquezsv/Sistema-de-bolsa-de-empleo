<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();


$sql="SELECT `IDEmpresa` , `Nombre` FROM empresa_perfil";
$stmt = $Conexion->ejecutar_consulta_simple($sql);




include_once 'templates/seguridadCpanel.php';
?>
<title>Empresa | Reportes</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>


<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Reportes_Estadísticas.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    height: auto;
  }
</style>

<main id="main-container">

  <div class="bg-image bg-image-bottom" id="imgbanner" >
    <div>
      <div class="content content-top text-center overflow-hidden">
        <div class="pt-40 pb-20">
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Reportes</h3>
        </div>
      </div>
    </div>
  </div>



  <div style="margin-right:2%; margin-left:2%;">

   <!-- Page Content -->
   <div class="content">

    <div class="text-center">
      <a href="./" class="btn btn-rounded btn-noborder btn-alt-primary mr-5 mb-5"> <i class="si si-action-undo fa-2x5"> </i> Ir al panel</a>
      
    </div>
    <br><br>

    <div class=" text-center">

      <p>Esta plataforma cuenta con las herramientas para generar los reportes generales de las empresas.</p>

      <br><br>

      <div class="row">

        <div class="col-lg-3 col-md-4 col-12">
          <label>Empresas</label>
          <select class="js-select2 form-control" id="example-select2" name="idempresa" style="width: 100%;" data-placeholder="Selecciona la empresa" >
            <option></option>
             <?php 
                   while ($item=$stmt->fetch())
                   {
                     echo "<option value=".$item['IDEmpresa'].">".$item['Nombre']."</option>";
                   }

                   ?>
          </select>
        </div>

        <div class="col-lg-3 col-md-4 col-12">
          <label>Tipos de reportes</label>
          <select class="js-select2 form-control" id="example-select" name="idarea" style="width: 100%;" data-placeholder="Selecciona tipo reporte" >
            <option></option>
            <option  value="Perfiles vistos" >Perfiles vistos</option>
            <option  value="Curriculum Vitae descargado" >Curriculum Vitae descargado</option>
            <option  value="Busquedas realizadas" >Busquedas realizadas</option>
            <option  value="Ofertas publicadas" >Ofertas publicadas</option>
            <option  value="Ofertas publicadas" >Curriculum Vitae enviados por e-mail</option>
            <option  value="Seguimientos realizados" >Seguimientos realizados</option>
          </select>
        </div>

        <div class="col-lg-2 col-md-2 col-12">
          <label>Fecha Inicial</label>
          <input type="date" name="fechaInicial" id="fechaInicial" class="form-control">
        </div>

        <div class="col-lg-2 col-md-2 col-12">
          <label>Fecha Final</label>
          <input type="date" name="fechaFinal" id="fechaFinal" class="form-control">
        </div>


        <div class="col-lg-2 col-md-4 col-12">
          <br>
          <center>
            <input type="submit" name="btnReporte" id="btnReporte" value="Generar Reporte" class="btn btn-alt-primary  btn-block btn-rounded">
          </center>
        </div>
        
      </div>

    </div>

    <br>  

    <div class="block" >
      <div class="block-content block-content-full"><br>
        <h3>Reporte general </h3>

        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive">        
              <table id="TablasReportes" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Tipo°</th>
                    <th>Fecha</th>
                    <th>Total</th>
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


</div>




</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

<script type="text/javascript">


  $(MostrarReportes("",""));
  function MostrarReportes(empresa,buscar , Tiporeporte , FechaInicial , FechaFinal){



   tablaUsuarios = $('#TablasReportes').DataTable({
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
        "url": "Modelos/ModelosReportes/reportes-generales.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{empresa:empresa,buscar:buscar , Tiporeporte:Tiporeporte , FechaInicial:FechaInicial , FechaFinal:FechaFinal
        }, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
      },
      "columns":[
      {"data": "Tipo"},
      {"data": "fecha"},
      {"data": "contador"},
      
      ]
      
    });


 }


 $("#btnReporte").click(function(){



  var table = $('#TablasReportes').DataTable();
  table.destroy();

  var tipoReporte = $('#example-select option:selected');
  var evaluarReporte = tipoReporte.val();

  var FechaInicial=$('#fechaInicial').val();
  var FinalFecha=$('#fechaFinal').val();

  var empresa = $('#example-select2 option:selected');
  var evaluarEmpresa = empresa.val();

  if(evaluarEmpresa == ""){
    swal({title:'alerta',text:'Debe seleccionar el tipo de empresa',type:'error'});
  }
  else if(evaluarReporte == ""){
    swal({title:'alerta',text:'Debe seleccionar el tipo de reporte',type:'error'});
  }else if(FechaInicial == ""){
    swal({title:'alerta',text:'Debe seleccionar la fecha inicial',type:'error'});
  }else if(FinalFecha == ""){
    swal({title:'alerta',text:'Debe seleccionar la fecha final',type:'error'});
  }
  else{

    $(MostrarReportes(evaluarEmpresa,"GenerarReporte",evaluarReporte , FechaInicial , FinalFecha));
  }

  

});


</script>