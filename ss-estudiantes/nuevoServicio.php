<?
include_once '../script/php/functions.php';
session_start();
conectar();
$matricula=$_SESSION['matricula'];

foreach($_POST as $nombre_campo => $valor){
   $valor=trim($valor);
	
   $nombre_campo=trim($nombre_campo);
   
   if($nombre_campo!="TipoHist" ){
   		$valor=strtoupper($valor);
   }
   
   $asignacion = "\$".$nombre_campo."='".$valor."';"; 
   eval($asignacion);
    
    
}

	
	$query="INSERT INTO `historial_alumno_ss_fca` (MatriculaAlu,NombrePrograma,ObjetivoPrograma,FuncionHist,TipoHist,AreaHist) VALUES('$matricula','$NombrePrograma','$ObjetivoPrograma','$FuncionHist','$TipoHist','$AreaHist') ";
   	$result=mysql_query($query) or die(mysql_error()); 

?>