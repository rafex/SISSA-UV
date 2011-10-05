<? 
include_once '../script/php/functions.php';
session_start();
$carrera=$_POST['carrera'];
conectar();
$matricula=$_SESSION['matricula'];
$periodo=$_SESSION['periodo'];
$query="SELECT jefedirectohist FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' and periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$hayAlgo=mysql_num_rows($result);
$rows=mysql_fetch_array($result);
$jefe=$rows['jefedirectohist'];

$query="SELECT * FROM encargado_ss_fca WHERE IdEnc = '$jefe' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

	if($hayAlgo<=0){?>
		<p class="verde">Primero cargue sus datos de servicio social <a href="#" class="azul" onclick="javascript:cargarContenido('cargarServicio.php');">aquí.</a></p>
<?
	}else{

		if($rows=mysql_fetch_array($result)){
			
		
		
		?>
		<div id="datos">
		
		<h3>Datos del jefe directo</h3>
		
		<p>
		<strong>Nombre:</strong> <?echo strtoupper($rows['NombreEnc']);?>
		<br /><br />
		<strong>Puesto:</strong> <?echo strtoupper($rows['PuestoEnc']);?>
		<br /><br />
		<strong>Correo electrónico:</strong> <?echo $rows['EmailEnc']; ?> 
		
		</p>
		<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificarJefe.php');" />
		</div>
		<?	}else{	?>
			<input type="button" value="Cargar datos del jefe directo" onclick="javascript:cargarContenido('cargarJefe.php');" />
<?			} // if para guardar datos
	
	}
	
?>