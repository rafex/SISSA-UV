<? 
include_once '../script/php/functions.php';
session_start();
$carrera=$_POST['carrera'];
conectar();
$matricula=$_SESSION['matricula'];
$query="SELECT * FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());


while($rows=mysql_fetch_array($result)){
	
/*$empresa=$rows['Empresa'];

$query2="SELECT NombreEmp FROM empresa_ss_fca WHERE IdEmp = '$empresa' LIMIT 1";
$result2=mysql_query($query2) or die(mysql_error());
$rows2=mysql_fetch_array($result2);
$empresa=$rows2['NombreEmp'];

$jefe=$rows['JefeDirectoHist'];	
$query3="SELECT NombreEnc FROM encargado_ss_fca WHERE IdEnc LIKE '%$jefe%' LIMIT 1";
$result3=mysql_query($query3) or die(mysql_error());
$rows3=mysql_fetch_array($result3);
$jefe=$rows3['NombreEnc'];*/
?>
<div id="datos">

<h3>Datos del servicio social</h3>

<p>
<strong> Nombre del programa:</strong> <?echo strtoupper($rows['NombrePrograma']);?>	
<!--br /><br />
<strong>Empresa:</strong> <?echo strtoupper($empresa);?></em-->
<br /><br />
<strong>Objetivo programa:</strong> <?echo strtoupper($rows['ObjetivoPrograma']); ?> 
<br /><br />
<strong>Naturaleza del programa:</strong> <?echo strtoupper($rows['FuncionHist']); ?>
<br /><br />
<strong>Tipo de servicio:</strong> <?echo strtoupper($rows['TipoHist']); ?>
<!--br /><br />
<strong>Jefe directo:</strong> <?echo utf8_decode(strtoupper($jefe)); ?></em--> 
<br /><br />
<strong>Area de trabajo:</strong> <?echo strtoupper($rows['AreaHist']); ?>
</p>
<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificarServicio.php');" />
</div>
<?	}	?>