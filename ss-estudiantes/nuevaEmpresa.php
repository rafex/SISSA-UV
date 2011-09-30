<?
include_once '../script/php/functions.php';
session_start();
conectar();
$matricula=$_SESSION['matricula'];

foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
   $nombre_campo=trim($nombre_campo);
   if($nombre_campo=="NombreEmp" || $nombre_campo=="EstadoEmp" || $nombre_campo=="MunicipioEmp" || $nombre_campo=="LocalidadEmp" || $nombre_campo=="ClasificacionEmp" || $nombre_campo=="SectorEmp"){
   		$valor=strtoupper($valor);
   }
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
   
}

	$query="INSERT INTO  `empresa_ss_fca` (NombreEmp,DireccionEmp,EmailEmp,TelefonoEmp,Telefono2Emp,ClasificacionEmp,SectorEmp,AcuerdoEmp,GiroEmp,EstadoEmp,MunicipioEmp,LocalidadEmp,TipoEmp) 
	VALUES('$NombreEmp','$DireccionEmp','$EmailEmp','$TelefonoEmp','$Telefono2Emp','$ClasificacionEmp','$SectorEmp','$AcuerdoEmp','$GiroEmp','$EstadoEmp','$MunicipioEmp','$LocalidadEmp','$TipoEmp');";
	$result=mysql_query($query) or die(mysql_error()); 
	$IdEmp=mysql_insert_id();
	
	$query="UPDATE `historial_alumno_ss_fca` SET `Empresa`='$IdEmp' WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
   	$result=mysql_query($query) or die(mysql_error()); 
 

?>