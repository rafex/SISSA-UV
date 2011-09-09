<?
include_once '../script/php/functions.php';

conectar();


foreach($_POST as $nombre_campo => $valor){
   
	
    if($nombre_campo=="nom" || $nombre_campo=="pass" ){
   		$valor=sin_acentos_espacios($valor);
   }
   
     
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
      
} 

	if($borrar==1){
		$query="DELETE FROM `usuarios_ss_fca` WHERE `usuario`='$usr' LIMIT 1;";
		$result=mysql_query($query) or die(mysql_error());
		echo '<h3>El usuario "'.$usr.'" fue eliminado con exito</h3>
<a href="#" onclick="cargarContenido(\'listaUsuarios.php\');" >[ Atras ]</a>'; 
	}elseif ($crear==1){
		$query="INSERT INTO `usuarios_ss_fca` (`usuario`, `contrasenia`, `nombre`, `nivel`) VALUES ('$usr', password('$pass'), '$nom', '$nivel');";
		$result=mysql_query($query) or die(mysql_error());
		echo '<h3>El usuario "'.$usr.'" fue creado con exito</h3>
<a href="#" onclick="cargarContenido(\'listaUsuarios.php\');" >[ Atras ]</a>';
	}elseif($modi==1){
		
	
		if($no=='true'){
			$query="UPDATE `usuarios_ss_fca` SET nivel='$nivel' , nombre='$nom' , contrasenia=password('$pass') WHERE `usuario`='$usr' LIMIT 1;";
			$result=mysql_query($query) or die(mysql_error());
				
		}else{
			$query="UPDATE `usuarios_ss_fca` SET nivel='$nivel' , nombre='$nom'  WHERE `usuario`='$usr' LIMIT 1;";
			$result=mysql_query($query) or die(mysql_error());
		}
		echo '<h3>Modificación al usuario "'.$usr.'" con exito</h3>
<a href="#" onclick="cargarContenido(\'listaUsuarios.php\');" >[ Atras ]</a>'; 
	}
	

?>
