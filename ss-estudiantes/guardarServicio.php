<?
include_once '../script/php/functions.php';
session_start();
conectar();
$matricula=$_SESSION['matricula'];
$periodo=$_SESSION['periodo'];

foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
	
   $nombre_campo=trim($nombre_campo);
   
   if($nombre_campo=="Empresa" || $nombre_campo=="JefeDirectoHist" ){
   		$valor=strtoupper($valor);
   }
   
   
   
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
   
   
   /*if($JefeDirectoHist){
   	
	
   	   	   
	   $query="UPDATE `encargado_ss_fca` SET `NombreEnc`='$JefeDirectoHist' WHERE `IdEnc`=$IdEnc LIMIT 1;";
   	   $result=mysql_query($query) or die(mysql_error());	   
	   		   	
   }else if($Empresa){
   	
	//$query="SELECT empresa FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' LIMIT 1";
	//$result=mysql_query($query) or die(mysql_error());
	//$rows=mysql_fetch_array($result);
	//$empresa=$rows['empresa'];
	
	   $query="UPDATE `empresa_ss_fca` SET `NombreEmp`='$Empresa' WHERE `IdEmp`=$IdEmp LIMIT 1;";
   	   $result=mysql_query($query) or die(mysql_error());		   	   	
   }*/
	
}	
 
	$query="UPDATE historial_alumno_ss_fca SET NombrePrograma='$NombrePrograma' , ObjetivoPrograma='$ObjetivoPrograma' , FuncionHist='$FuncionHist' , TipoHist='$TipoHist' ,AreaHist='$AreaHist' WHERE MatriculaAlu='$matricula' and periodoalu='$periodo' LIMIT 1;";
   	$result=mysql_query($query) or die(mysql_error()); 	


?>