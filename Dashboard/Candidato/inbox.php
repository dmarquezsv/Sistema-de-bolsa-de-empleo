<?php
include_once '../../BD/Conexion.php';
include_once '../../BD/Consultas.php';
include_once '../../main/funcionesApp.php';
include_once 'templates/head.php';
$Conexion = new Consultas();
$FuncionesApp = new funcionesApp();
include_once 'templates/validar-perfil.php';
$sql = "SELECT `IDNotificacion`,C.Nombre ,C.Correo, `Tipo` , `idSolicitud`, `EstadoSolicitud` , N.Estado , `FechaHora` , `Descripcion` FROM notificaciones N INNER JOIN usuarios_cuentas C ON N.idSolicitud = C.IDUsuario WHERE N.IDUsuario = ? ORDER BY N.IDNotificacion DESC ";
$stmt =  Conexion::conectar()->prepare($sql);
$stmt->execute(array($IDUser));


$IDNotificacion = base64_decode($_GET['solicitud']);
$Estado = base64_decode($_GET['estado']);

if ($Estado == "Enviado") {

  $sql4 = "UPDATE `notificaciones` SET `EstadoSolicitud` = 'Recibido', `Estado` = 'Visto' WHERE IDNotificacion=:IDNotificacion";
  $stmt4 =  Conexion::conectar()->prepare($sql4);
  $stmt4->bindParam('IDNotificacion', $IDNotificacion , PDO::PARAM_STR);
  $stmt4->execute();
}

?>
<title>Candidato | inbox</title>
<?php 
include_once 'templates/styles.php';
include_once 'templates/MenuRight.php';
include_once 'templates/MenuLeft.php';
include_once 'templates/header.php';
?>

<style type="text/css">
  #imgbanner{

    background: url('../assets/media/photos/Alertas_de_Trabajo.jpg');
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
          <h3 class="font-size-h2 font-w300 mt-20"  data-toggle="appear" data-class="animated flipInY" id="titulos" style="color: white;">Notificaciones </h3>
        </div>
      </div>
    </div>
  </div>




  <div style="margin-right:2%; margin-left:2%;">

    <div class="content">
      <div class="row">
        <div class="col-md-12 col-xl-12">
          <!-- Message List -->
          <div class="block">
            <div class="block-header block-header-default">

              <div class="block-options">
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                  <i class="si si-refresh"></i>
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
              </div>
            </div>
            <div class="block-content">



              <!-- Messages -->
              <!-- Checkable Table (.js-table-checkable class is initialized in Helpers.tableToolsCheckable()) -->
              <table class="js-table-checkable table table-hover table-vcenter">
                <tbody>
                  <?php
                  $n=1;
                  while ($item=$stmt->fetch())
                  {

                    if ($item['Tipo'] == "Contacto") {

                      echo '<td class="text-center" style="width: 100px;">
                      <a class="btn btn-rounded btn-alt-primary float-right" href="chat?chats='.base64_encode($item['idSolicitud']).'&solicitud='.base64_encode($item['IDNotificacion']).'&estado='.base64_encode($item['EstadoSolicitud']).'&reclutador=notificar">Chat</a>
                      </td>
                      <td class="d-none d-sm-table-cell font-w600" style="width: 140px;">'.$item['Nombre'].'</td>
                      <td>
                      <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">'.$item['Tipo'].'</a>
                      <div class="text-muted mt-5">'.$item['Descripcion'].'</div>
                      </td>
                      <td class="d-none d-xl-table-cell font-w600 font-size-sm text-muted" style="width: 120px;">'.$item['FechaHora'].'</td>
                      </tr>
                      ';

                    }elseif($item['Tipo'] == "Actualizar CV"){

                      $comentario = '';
                      if ($item['EstadoSolicitud'] == "notificado") {
                        $comentario = 'Se ha notificado al usuario';
                      }else{
                        $comentario = ' <a href="Modelos/notificaciones/notificar-reclutador-perfil-actualizado.php?userReclutador='.$item['idSolicitud'].'&idnotificacion='.$item['IDNotificacion'].'" class="btn btn-rounded btn-alt-primary float-right">Notificar a</a>';  
                      }


                      echo '<td class="text-center" style="width: 100px;">
                      '.$comentario.'
                      </td>
                      <td class="d-none d-sm-table-cell font-w600" style="width: 140px;">'.$item['Nombre'].'</td>
                      <td>
                      <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">'.$item['Tipo'].'</a>
                      <div class="text-muted mt-5">'.$item['Descripcion'].'</div>
                      </td>
                      <td class="d-none d-xl-table-cell font-w600 font-size-sm text-muted" style="width: 120px;">'.$item['FechaHora'].'</td>
                      </tr>
                      ';

                    }else if($item['Tipo'] == "Comentario"){

                      $Notificar = ''; 

                      if ($item['EstadoSolicitud'] == "Aprobado") {
                        $Notificar = 'Se ha notificado al usuario';
                      }else{
                        $Notificar = '<button type="button"class="btn btn-rounded btn-alt-primary float-right" data-toggle="modal" data-target="#modal-compose">Notificar</button>';  
                      }

                      echo '<td class="text-center" style="width: 100px;">
                      '.$Notificar.'
                      </td>
                      <td class="d-none d-sm-table-cell font-w600" style="width: 140px;">'.$item['Nombre'].'</td>
                      <td>
                      <a class="font-w600" data-toggle="modal" data-target="#modal-message" href="#">'.$item['Tipo'].'</a>
                      <div class="text-muted mt-5">'.$item['Descripcion'].'</div>
                      </td>
                      <td class="d-none d-xl-table-cell font-w600 font-size-sm text-muted" style="width: 120px;">'.$item['FechaHora'].'</td>
                      </tr>
                      ';

                    }

                  }

                  ?>








                </tbody>
              </table>
              <!-- END Messages -->
            </div>
          </div>
          <!-- END Message List -->
        </div>
      </div>
    </div>
    <!-- END Page Content -->

  </div>

  <!-- Compose Modal -->
  <div class="modal fade" id="modal-compose" tabindex="-1" role="dialog" aria-labelledby="modal-compose" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top" role="document">
      <div class="modal-content">
        <div class="block block-themed block-transparent mb-0">
          <div class="block-header">
            <h3 class="block-title">
              <i class="fa fa-pencil mr-5"></i> Nuevo mensaje
            </h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                <i class="si si-close"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <form class="my-10" action="be_pages_generic_inbox.html" method="post" onsubmit="return false;">

              <div class="form-group row">
                <div class="col-12">
                  <div class="form-material form-material-primary input-group">
                    <input type="text" class="form-control" id="message-subject" name="message-subject" placeholder="¿De qué se trata esto?">
                    <label for="message-subject">Agregar un asunto</label>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="si si-book-open"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-12">
                  <div class="form-material form-material-primary">
                    <textarea class="form-control" id="message-msg" name="message-msg" rows="6" placeholder="escribe tu mensaje.."></textarea>
                    <label for="message-msg">Mensaje</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-alt-primary" data-dismiss="modal">
                  <i class="fa fa-send mr-5"></i> Enviar mensaje
                </button>
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Compose Modal -->


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Mensaje</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="Modelos/ModelosExperiencia/EliminarExperiencia.php" method="POST">
            <p>Seguro que desea eliminar</p>
            <input type="text" name="" id="Nombre" class="form-control"  disabled="true">
            <input type="hidden" name="IDEliminar"  id="IDEliminar">


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            <input type="submit" name="Eliminar" value="Eliminar" class="btn btn-danger">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


</main>



<?php include_once 'templates/footer.php';
include_once 'templates/script.php';
include_once '../../templates/alertas.php';
?>

