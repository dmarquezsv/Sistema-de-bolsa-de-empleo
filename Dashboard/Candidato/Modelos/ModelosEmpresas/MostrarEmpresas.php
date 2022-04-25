<?php

include_once '../../../../BD/Conexion.php';
include_once '../../../../BD/Consultas.php';


define("NRO_REGISTROS",6);

$sql = "SELECT `IDEmpresa`,`logo` , TP.Area , EP.`Nombre` ,P.Nombre AS 'Pais' , PD.Nombre 'Departamento' , EP.Confidencial FROM empresa_perfil EP INNER JOIN soporte_tipo_empresa TP ON EP.IDTipoEmpresa = TP.IDTipoEmpresa LEFT JOIN soporte_paises_departamento PD ON EP.IDDepartamento = PD.IDDepartamento LEFT JOIN soporte_paises P ON EP.IDPais = P.IDPais WHERE EP.Confidencial = 'No'";


 /* Pagination Code starts */
          $per_page_html = '';
          $page = 1;
          $start=0;
          if(!empty($_POST["page"])) {
            $page = $_POST["page"];
            $start=($page-1) * NRO_REGISTROS;
          }
          $limit=" limit " . $start . "," . NRO_REGISTROS;
          $pagination_statement = Conexion::conectar()->prepare($sql);
          $pagination_statement->execute();

          $row_count = $pagination_statement->rowCount();
          if(!empty($row_count)){
            $per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
            $page_count=ceil($row_count/NRO_REGISTROS);
            if($page_count>1) {
              for($i=1;$i<=$page_count;$i++){
                if($i==$page){
                  $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current btn-alt-primary"  />';
                } else {
                  $per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page btn-alt-primary" />';
                }
              }
            }
            $per_page_html .= "</div>";
          }

   $query = $sql.$limit;
          $pdo_statement = Conexion::conectar()->prepare($query);
          $pdo_statement->execute();
          $resultados = $pdo_statement->fetchAll();



          if(!empty($resultados)) {
            foreach($resultados as $row) {

             echo '



             <div class="col-md-6 col-xl-4 invisible" data-toggle="appear">
             <!-- Property -->
             <div class="block block-rounded">
             <div class="block-content p-0 overflow-hidden">
             <a class="img-link" href="empresa?id='.base64_encode($row['IDEmpresa']).'">
             <img class="img-fluid rounded-top" src="../../main/img/LogosEmpresas/'.$row['logo'].'" class="img-fluid img-thumbnail" style="width: 100%; height: 19em;">
             </a>
             </div>
             <div class="block-content border-bottom">
             <h4 class="font-size-h5 font-w300 mb-5 text-center">'.$row['Nombre'].'</h4>
             <h5 class="font-size-h5 mb-10 text-center">'.$row['Area'].'</h5>
             </div>
             <div class="block-content border-bottom">
             <div class="row">
             <div class="col-6">
             <p>
             <i class="si si-globe fa-2x text-muted mr-5"></i>  '.$row['Pais'].'
             </p>
             </div>
             <div class="col-6">
             <p>
             <i class="si si-globe-alt fa-2x text-muted mr-5"></i>  '.$row['Departamento'].'
             </p>
             </div>
             </div>
             </div>
             <div class="block-content block-content-full">
             <div class="row">
             <div class="col-12">
             <a class="btn btn-alt-primary btn-lg btn-block btn-rounded" href="empresa?id='.base64_encode($row['IDEmpresa']).'">
             Ver Empresas
             </a>
             </div>

             </div>
             </div>
             </div>
             <!-- END Property -->
             </div>
             ';


           }



         }



?>