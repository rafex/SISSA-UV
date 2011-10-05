<?
include_once '../script/php/functions.php';
session_start();
conectar();
//$matricula=$_POST['matricula'];

foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
	
   $nombre_campo=trim($nombre_campo);
   
   if($nombre_campo=="NombreEnc" || $nombre_campo=="PuestoEnc" ){
   		$valor=strtoupper($valor);
   }
   
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
    
    
}

	$query="INSERT INTO  `encargado_ss_fca` (NombreEnc,PuestoEnc,EmailEnc) VALUES('$NombreEnc','$PuestoEnc','$EmailEnc');";
	$result=mysql_query($query) or die(mysql_error()); 
	$IdEnc=mysql_insert_id();
	
	$query="UPDATE `historial_alumno_ss_fca` SET `JefeDirectoHist`='$IdEnc' WHERE `MatriculaAlu`='$matricula' AND periodoalu='$periodo' LIMIT 1;";
   	$result=mysql_query($query) or die(mysql_error()); 

?>