 <?php #en caso de que haya fallado algun tipo de error se muestrar los siguientes errores
 if (isset($_SESSION['alertas'])) {
    
    if($_SESSION['alertas'] == 'Eliminado')
    {
      echo "<script>swal({title:'éxito',text:'Se a aliminado registro',type:'success'  , timer: 2000});</script>";
      $_SESSION['alertas'] = 'Funciona';
    }elseif($_SESSION['alertas'] == 'Nuevo'){

        echo "<script>swal({title:'éxito',text:'Se a  registrado con exito',type:'success' , timer: 2000 });</script>";
      $_SESSION['alertas'] = 'Funciona';
    }
    elseif($_SESSION['alertas'] == 'actualizar'){

        echo "<script>swal({title:'éxito',text:'Se a  actualizado con exito',type:'success' , timer: 2000 });</script>";
      $_SESSION['alertas'] = 'Funciona';
    }elseif($_SESSION['alertas'] == 'Fallo'){

        echo "<script>swal({title:'éxito',text:'A Fallado la ejecución',type:'error' , timer: 2000 });</script>";
      $_SESSION['alertas'] = 'Funciona';
    }else if($_SESSION['alertas'] == 'SubidaImg'){

           echo "<script>swal({title:'warning',text:'".$_SESSION['ms']."',type:'warning' , timer: 2000 });</script>";
        $_SESSION['alertas'] = 'Funciona';
    }elseif($_SESSION['alertas'] == 'PerdidaDatos'){

        echo "<script>swal({title:'warning',text:'El archivo dirigido no ha encontrado la ejecución',type:'error' , timer: 2000 });</script>";
      $_SESSION['alertas'] = 'Funciona';
    }
    elseif($_SESSION['alertas'] == 'Mensaje'){

         echo "<script>swal({title:'éxito',text:'".$_SESSION['ms']."',type:'success'  });</script>";
      $_SESSION['alertas'] = 'Funciona';
    } 
    elseif($_SESSION['alertas'] == 'Advertenicia'){

         echo "<script>swal({title:'Advertenicia',text:'".$_SESSION['ms']."',type:'error'  });</script>";
      $_SESSION['alertas'] = 'Funciona';
    }




}
 ?>