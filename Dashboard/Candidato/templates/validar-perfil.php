<?php  


$VerificaUsuarioSinPerfil = $Conexion->ejecutar_consulta_conteo("usuario_perfil" , "IDUsuario" , $IDUser);
$VerificaUsuarioEducacion= $Conexion->ejecutar_consulta_conteo("usuario_educacion" , "IDUsuario" , $IDUser);
$VerificaUsuarioExperiencia= $Conexion->ejecutar_consulta_conteo("usuario_experiencia" , "IDUsuario" , $IDUser);

$VerificaUsuarioDocumento = $Conexion->ejecutar_consulta_conteo("usuarios_documentos" , "IDUsuario" , $IDUser);

$VerificaUsuarioHabilidades= $Conexion->ejecutar_consulta_conteo("usuarios_habilidades" , "IDUsuario" , $IDUser);
$VerificaUsuarioConocimientos= $Conexion->ejecutar_consulta_conteo("usuarios_conocimentos" , "IDUsuario" , $IDUser);
$VerificaUsuarioIdiomas= $Conexion->ejecutar_consulta_conteo("usuarios_idiomas" , "IDUsuario" , $IDUser);

$VerificaUsuarioReferncia= $Conexion->ejecutar_consulta_conteo("usuario_referencia" , "IDUsuario" , $IDUser);




?>