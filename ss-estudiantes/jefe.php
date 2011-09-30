<? 
include_once '../script/php/functions.php';
session_start();
$carrera=$_POST['carrera'];
conectar();
$matricula=$_SESSION['matricula'];
$query="SELECT jefedirectohist FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$rows=mysql_fetch_array($result);
$jefe=$rows['jefedirectohist'];

$query="SELECT * FROM encargado_ss_fca WHERE IdEnc = '$jefe' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

if($rows=mysql_fetch_array($result)){
	


?>
<div id="datos">

<h3>Datos del jefe directo</h3>

<p>
<strong>Nombre:</strong> <?echo strtoupper($rows['NombreEnc']);?>p	
<br /><br />
<strong>Puesto:</strong> <?echo strtoupper($rows['PuestoEnc']);?>p
<br /><br />
<strong>Correo electrónico:</strong> <?echo $rows['EmailEnc']; ?> 

</p>
<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificarJefe.php');" />
</div>
<?	}else{	?>

<input name="modificar" id="modificar" type="button" value="Cargar datos" onclick="javascript:cargarContenido('cargarJefe.php');" />
<?	}	?>