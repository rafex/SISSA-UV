<?
include_once '../script/php/functions.php';
session_start();
conectar();
$matricula=$_SESSION['matricula'];
$periodo2=$_SESSION['periodo'];
foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
	
   $nombre_campo=trim($nombre_campo);
   
   if($nombre_campo=="NombreAlu" || $nombre_campo=="nacionalidadalu" || $nombre_campo=="lugarnacimientoalu" || $nombre_campo=="estadoalu" || $nombre_campo=="municipioalu" || $nombre_campo=="localidadalu" || $nombre_campo=="tutoralu" ){
   		$valor=strtoupper($valor);
   }
   
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
      
	//$query="UPDATE `encargado_ss_fca` SET `$nombre_campo`='$valor' WHERE `IdEnc`=$IdEnc LIMIT 1;";
   	//$result=mysql_query($query) or die(mysql_error()); 

} 
	
	$_SESSION['nombre']=$NombreAlu;
	$query="UPDATE `alumno_ss_fca` SET `NombreAlu`='$NombreAlu' , CarreraAlu='$CarreraAlu', SeccionAlu='$SeccionAlu' , EmailAlu='$EmailAlu' , TelefonoAlu='$TelefonoAlu' WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo2' LIMIT 1;";
   	$result=mysql_query($query) or die(mysql_error()); 

	$query="UPDATE `datos_extra_alumno` SET nacimientoalu='$nacimientoalu', generoalu='$generoalu' , edocivilalu='$edocivilalu' , edadalu='$edadalu' , nacionalidadalu='$nacionalidadalu' , lugarnacimientoalu='$lugarnacimientoalu' , calledireccion='$calledireccion' , numdireccion='$numdireccion' , coloniadireccion='$coloniadireccion' , cpdireccion='$cpdireccion' , estadoalu='$estadoalu' , municipioalu='$municipioalu' , localidadalu='$localidadalu' , tutoralu='$tutoralu' , direcciontutor='$direcciontutor' WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
   	$result=mysql_query($query) or die(mysql_error());  

?>