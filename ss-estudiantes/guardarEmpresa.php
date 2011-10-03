<?
include_once '../script/php/functions.php';
session_start();
conectar();


foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
   $nombre_campo=trim($nombre_campo);
   if($nombre_campo=="NombreEmp" || $nombre_campo=="EstadoEmp" || $nombre_campo=="MunicipioEmp" || $nombre_campo=="LocalidadEmp" || $nombre_campo=="ClasificacionEmp" ){
   		$valor=strtoupper($valor);
   }
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
   
   
   /*if($NombreEmp){
   	   $query="UPDATE `historial_alumno_ss_fca` SET `Empresa`='$IdEmp' WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
	   $result=mysql_query($query) or die(mysql_error());	
   }*/
   
   
   $query="UPDATE `empresa_ss_fca` SET `$nombre_campo`='$valor' WHERE `IdEmp`=$IdEmp LIMIT 1;";
   $result=mysql_query($query) or die(mysql_error()); 
} 

?>