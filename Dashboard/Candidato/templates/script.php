  <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->
        <script src="../assets/js/codebase.core.min.js"></script>

        <!--
            Codebase JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_es6/main/app.js
        -->
        <script src="../assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/chartjs/Chart.bundle.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>

        <!-- Page JS Code -->
        <script src="../assets/js/pages/be_pages_dashboard.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="../assets/js/pages/be_tables_datatables.min.js"></script>
        <script src="../assets/js/plugins/ckeditor/ckeditor.js"></script>
        <script src="../assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <!--Plugin del programador-->
        <script src="js/RecordatorioInicio.js"></script>
        <script  src="../../assets/plugin/sweetalert/sweetalert2.js"></script>
        <script src="js/subidaImagen.js"></script>
        <script src="../assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        

        <script type="text/javascript">

            window.onload=function(){
                $("table tbody tr").click(function(){
        // Tomar la captura la información  de la tabla 
        var Carrera= $(this).find("td:eq(1)").text(); 
        document.getElementById('carrera').value=Carrer;
        

        
        
    });    
            }
        </script>

        <script>jQuery(function () {
            Codebase.helpers(['datepicker','ckeditor', 'maxlength', 'select2', 'tags-inputs']);
        });</script>

        <script>jQuery(function () {
            Codebase.helpers(['slimscroll']);
        });</script>


        <script type="text/javascript">

         $(document).ready(function() {

          $.ajax({
            url: 'Modelos/notificaciones/alertas.php' ,
            type: 'POST' ,
            dataType: 'html',
            data: {user: "<?php echo $IDUser; ?>" , "cuantas":"1"},
        })
          .done(function(respuesta){
            $("#cuantas").html(respuesta);
        })
          .fail(function(){
            console.log("error");
        });


      });

  </script>

  <script type="text/javascript">

     setInterval(function() { 

       $.ajax({
        url: 'Modelos/notificaciones/alertas.php' ,
        type: 'POST' ,
        dataType: 'html',
        data: {user: "<?php echo $IDUser; ?>" , "cuantas":"1"},
    })
       .done(function(respuesta){
        $("#cuantas").html(respuesta);
    })
       .fail(function(){
        console.log("error");
    });


   }, 3000);

</script>


<script type="text/javascript">

 $(document).ready(function() {

          $.ajax({
            url: 'Modelos/notificaciones/alertas.php' ,
            type: 'POST' ,
            dataType: 'html',
            data: {user2: "<?php echo $IDUser; ?>" , "datos":"1"},
        })
          .done(function(respuesta){
            $(".notis").html(respuesta);
        })
          .fail(function(){
            console.log("error");
        });


      });

</script>

<script type="text/javascript">

     setInterval(function() { 

       $.ajax({
            url: 'Modelos/notificaciones/alertas.php' ,
            type: 'POST' ,
            dataType: 'html',
            data: {user2: "<?php echo $IDUser; ?>" , "datos":"1"},
        })
          .done(function(respuesta){
            $(".notis").html(respuesta);
        })
          .fail(function(){
            console.log("error");
        });


   }, 3000);

</script>




</body>
</html>