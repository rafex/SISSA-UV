<?php 
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
$carrera=$_POST['carrera'];
$periodo=$_POST['periodo'];

conectar();

 	
 	$query="UPDATE configuraciones_ss_fca SET activo='1' WHERE periodo='$periodo' AND carrera='$carrera' " ;
	mysql_query($query) or die("Error al abrir el acta de la carrera: $carrera con periodo: $periodo".mysql_error());
	
?>