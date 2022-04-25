     $(document).ready(function() {
     	$('#valida2r').on('click', function() {

     		var img = $("#imgusu").val();

     		if (img == "") 
     		{
     			swal({title:'Error',text:'Por favor ,suba una imagen',type:'warning'});
     			return false;
     		}else{
     			var respuesta = '<i class="fa fa-2x fa-sun-o fa-spin text-warning"></i>'
     			$("#respuestaIMG").html(respuesta);	 	
     		}



     	});
     });
