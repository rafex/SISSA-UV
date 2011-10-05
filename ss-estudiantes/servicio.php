<? 
include_once '../script/php/functions.php';
session_start();

conectar();
$matricula=$_SESSION['matricula'];
$periodo=$_SESSION['periodo'];
$query="SELECT * FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' AND periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());


	if($rows=mysql_fetch_array($result)){
		
	
	?>
	<div id="datos">
	
	<h3>Datos del servicio social</h3>
	
	<p>
	<strong> Nombre del programa:</strong> <?echo strtoupper($rows['NombrePrograma']);?>	
	<br /><br />
	<strong>Objetivo programa:</strong> <?echo strtoupper($rows['ObjetivoPrograma']); ?> 
	<br /><br />
	<strong>Naturaleza del programa:</strong> <?echo strtoupper($rows['FuncionHist']); ?>
	<br /><br />
	<strong>Tipo de servicio:</strong> <?echo strtoupper($rows['TipoHist']); ?>
	<br /><br />
	<strong>Area de trabajo:</strong> <?echo strtoupper($rows['AreaHist']); ?>
	</p>
	<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificarServicio.php');" />
	</div>
	<?	}else{	?>
		
		<input type="button" value="Cargar datos del servicio social" onclick="javascript:cargarContenido('cargarServicio.php');" />
	<? } ?>