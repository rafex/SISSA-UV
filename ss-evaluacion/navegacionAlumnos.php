<?php 
include_once '../script/php/functions.php';
conectar();

	$queryAlumnos="SELECT  matriculaalu,nombrealu FROM alumno_ss_fca WHERE periodoalu='$periodoX' and criterioalu='$criterio' and carreraalu='$carrera' order by nombrealu";
	$resultAlumnos=mysql_query($queryAlumnos) or die(mysql_error());
	$alumnoAnterior="nada";
	$alumnoSiguiente="nada";
	$AnteriorNombre="nada";
	$SiguienteNombre="nada";
	$soloUno=0;
	$primero=0;
	$noAtras=true;
	$matricula=trim($matricula);
	while($rowsAlumnos = mysql_fetch_array($resultAlumnos)){
		$matr=utf8_encode(strtoupper(trim($rowsAlumnos['matriculaalu'])));
		
		   
		if(strncasecomp($matricula,$matr)==0){
			$soloUno=1;
			
		}else{
			$alumnoAnterior=strtoupper($rowsAlumnos['matriculaalu']);
			$AnteriorNombre=$rowsAlumnos['nombrealu'];
		}
		
		if($soloUno==1){
			$alumnoSiguiente=strtoupper($rowsAlumnos['matriculaalu']);
			$SiguienteNombre=$rowsAlumnos['nombrealu'];
			$soloUno=2;
			
		}
		
	}
	if($_SESSION['nivel']=='admin'){
		if($noAtras){
			echo "<a href=\"#\" class=\"azul\" onclick=\"javascript:evaluar('matricula,nombre,criterio,carrera,periodoA','$alumnoAnterior,$AnteriorNombre,$criterio,$carrera,$periodoX','../ss-evaluacion/evaluacion.php'); \" ><< Anterior</a> - <a href=\"#\" class=\"azul\" onclick=\"javascript:evaluar('matricula,nombre,criterio,carrera,periodoA','$alumnoSiguiente,$SiguienteNombre,$criterio,$carrera,$periodoX','../ss-evaluacion/evaluacion.php'); \" >Siguiente >></a>";	
		}else{
			echo "<a href=\"#\" class=\"azul\" onclick=\"javascript:evaluar('matricula,nombre,criterio,carrera,periodoA','$alumnoSiguiente,$SiguienteNombre,$criterio,$carrera,$periodoX','../ss-evaluacion/evaluacion.php'); \" >Siguiente >></a>";
		}
		
	}elseif($_SESSION['nivel']=='evaluador'){
		if($noAtras){
			echo "<a href=\"#\" class=\"azul\" onclick=\"javascript:evaluar('matricula,nombre,criterio,carrera,periodoA','$alumnoAnterior,$AnteriorNombre,$criterio,$carrera,$periodoX','evaluacion.php'); \" ><< Anterior</a> - <a href=\"#\" class=\"azul\" onclick=\"javascript:evaluar('matricula,nombre,criterio,carrera,periodoA','$alumnoSiguiente,$SiguienteNombre,$criterio,$carrera,$periodoX','evaluacion.php'); \" >Siguiente >></a>";	
		}else{
			echo "<a href=\"#\" class=\"azul\" onclick=\"javascript:evaluar('matricula,nombre,criterio,carrera,periodoA','$alumnoSiguiente,$SiguienteNombre,$criterio,$carrera,$periodoX','evaluacion.php'); \" >Siguiente >></a>";
		}
		
	}
?>