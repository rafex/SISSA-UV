<? 
include_once '../script/php/functions.php';
session_start();

conectar();
$matricula=$_SESSION['matricula'];
$query="SELECT jefedirectohist FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' LIMIT 1";
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
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('jefe.php');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('guardarJefe.php','IdEnc,NombreEnc,PuestoEnc,EmailEnc','vacio','contenido','jefe.php','nada','nada','Guardando...','Datos del jefe directo modificados con exito.')" />
<!-- input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('guardarJefe.php','IdEnc,NombreEnc,PuestoEnc,EmailEnc','Datos del jefe modificados exitosamente.','index.php')" -->
</div>
<?	}	?>