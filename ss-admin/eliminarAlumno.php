<? 

include_once '../script/php/functions.php';
conectar();

$matricula=$_POST['matricula'];
$periodo=$_POST['periodo'];
if(empty($periodo) && empty($matricula)){
	
}else{

	$query="SELECT CriterioAlu FROM `alumno_ss_fca` WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_fetch_array($result);
	$criterio=$rows['CriterioAlu'];
	
	$query="DELETE FROM `evaluacion_$criterio` WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());
	
	$query="DELETE FROM `notas_ss_fca` WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());
	
	$query="DELETE FROM `alumno_ss_fca` WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());
	
	$query="DELETE FROM `datos_extra_alumno` WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());
	
	$query="SELECT Empresa,JefeDirectoHist FROM `historial_alumno_ss_fca` WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());
	
	$rows=mysql_fetch_array($result);
	$empresa=$rows['Empresa'];
	$jefe=$rows['JefeDirectoHist'];
	
	if(!(empty($empresa)) && !(empty($jefe)) ){
		$query="DELETE FROM `empresa_ss_fca` WHERE `IdEmp`='$empresa' LIMIT 1;";
		$result=mysql_query($query) or die(mysql_error());
		$query="DELETE FROM `encargado_ss_fca` WHERE `IdEnc`='$jefe' LIMIT 1;";
		$result=mysql_query($query) or die(mysql_error());
	}elseif(!(empty($empresa)) && empty($jefe)){
		$query="DELETE FROM `empresa_ss_fca` WHERE `IdEmp`='$empresa' LIMIT 1;";
		$result=mysql_query($query) or die(mysql_error());
	}elseif(!(empty($jefe)) && empty($empresa)){
		$query="DELETE FROM `encargado_ss_fca` WHERE `IdEnc`='$jefe' LIMIT 1;";
		$result=mysql_query($query) or die(mysql_error());
	}
	
	$query="DELETE FROM `historial_alumno_ss_fca` WHERE `MatriculaAlu`='$matricula' AND PeriodoAlu='$periodo' LIMIT 1;";
	$result=mysql_query($query) or die(mysql_error());

}


?>