<?php 
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
$carrera=$_POST['carrera'];
$periodo=$_POST['periodo'];
$criterioS=$_POST['criterio'];
conectar();
$result=mysql_query("SELECT MatriculaAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ") or die(mysql_error());
$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='$criterioS' ; ") or die(mysql_error());

$j=mysql_num_rows($result2);


	while($rows = mysql_fetch_array($result)){  
		
		$evaluar=new Evaluar(utf8_encode($rows['MatriculaAlu']),$criterioS);
		$total=0; 
 		for($i=0;$i<$j;$i++){
     		$calfif=$evaluar->mostrarCalif($i+1,$periodo); 
     		if(!($calfif==-1)) { 
     			$total+=$calfif; 
     		}
 		}
 		//$mat=$rows['MatriculaAlu'];
 		//echo "$mat - $total <br>";
 		$query="UPDATE historial_alumno_ss_fca SET EvaluacionHist='$total' WHERE MatriculaAlu='".utf8_encode($rows['MatriculaAlu'])."'" ;
		mysql_query($query) or die("Error al cerrar la calificación del alumno: ".utf8_encode($rows['MatriculaAlu'])." ".mysql_error());
 	}
 	
 	$query="UPDATE configuraciones_ss_fca SET activo='0' WHERE periodo='$periodo' AND carrera='$carrera' " ;
	mysql_query($query) or die("Error al cerrar el acta de la carrera: $carrera con periodo: $periodo".mysql_error());
	
?>