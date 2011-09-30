<?
echo 'hola';
 	$connection = mysql_connect('localhost', 'sissaprincipal', '1r4L9j0') or die('Oops connection error -> ' . mysql_error());
	mysql_select_db('serviciosocial_fca_uv', $connection ) or die('Database error -> ' . mysql_error());
echo 'conecto';
	$query="select matriculaalu,periodoalu from alumno_ss_fca";
	$result=mysql_query($query) or die(mysql_error());
	
echo 'buscando';
	
	while($rows=mysql_fetch_array($result)){
		echo 'haciendo...<br/>';
		$periodo=$rows['periodoalu'];
		$matricula=$rows['matriculaalu'];
		$sql="UPDATE evaluacion_meifv1 SET PeriodoAlu='$periodo' WHERE MatriculaAlu='$matricula' ";
		$result2=mysql_query($sql) or die(mysql_error());
		
		$sql="UPDATE notas_ss_fca SET PeriodoAlu='$periodo' WHERE MatriculaAlu='$matricula' ";
		$result2=mysql_query($sql) or die(mysql_error());
		
		$sql="UPDATE historial_alumno_ss_fca SET PeriodoAlu='$periodo' WHERE MatriculaAlu='$matricula' ";
		$result2=mysql_query($sql) or die(mysql_error());
		
		if(mysql_affected_rows()>0){
			echo "Matricula: $matricula con periodo: $periodo <br />";
		}
	}

echo 'FIN';



?>