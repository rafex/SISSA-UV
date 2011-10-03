<?
include_once '../script/php/functions.php';

conectar();


foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
	
   $nombre_campo=trim($nombre_campo);
   
   if($nombre_campo=="NombreEnc" || $nombre_campo=="PuestoEnc" ){
   		$valor=strtoupper($valor);
   }
   
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
   
   
   /*if($NombreEnc){
   	   $query="UPDATE `historial_alumno_ss_fca` SET `JefeDirectoHist`='$NombreEnc' WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
	   $result=mysql_query($query) or die(mysql_error());	
   }*/
   
   
   $query="UPDATE `encargado_ss_fca` SET `$nombre_campo`='$valor' WHERE `IdEnc`=$IdEnc LIMIT 1;";
   $result=mysql_query($query) or die(mysql_error()); 
} 

?>