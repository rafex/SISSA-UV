<? 
include_once '../script/php/functions.php';
conectar();
$matricula=$_POST['matricula'];
$periodo=$_POST['periodo'];
$query="SELECT jefedirectohist FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' and periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$rows=mysql_fetch_array($result);
$jefe=$rows['jefedirectohist'];

$query="SELECT * FROM encargado_ss_fca WHERE IdEnc = '$jefe' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

while($rows=mysql_fetch_array($result)){
	


?>
<div id="datos">

<h3>Datos del jefe directo</h3>
<input type="hidden" id="IdEnc" value="<?echo $jefe; ?>" />
<p>
<strong>Nombre:</strong> <input type="text" id="NombreEnc" size="40" value="<?echo strtoupper($rows['NombreEnc']); ?>" />	
<br /><br />
<strong>Puesto:</strong> <input type="text" id="PuestoEnc" size="40" value="<?echo strtoupper($rows['PuestoEnc']); ?>" />
<br /><br />
<strong>Correo electrónico:</strong> <input type="text" id="EmailEnc" size="40" value="<?echo $rows['EmailEnc']; ?>" /> 

</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:crearContenidosArregloConMensaje('verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('guardarAlumnoJefe.php','IdEnc,NombreEnc,PuestoEnc,EmailEnc','vacio','contenido','verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','Guardando...','Datos del jefe directo modificados del alumno: <?php echo $matricula; ?>')" />

</div>
<?	}	?>