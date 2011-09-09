<? 
include_once '../script/php/functions.php';
conectar();

$empresa=$_POST['IdEmp'];

$query="SELECT * FROM empresa_ss_fca WHERE IdEmp = '$empresa' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());


if($rows=mysql_fetch_array($result)){
	


?>
<div id="datos">

<h3>Datos de la empresa</h3>

<p>
<strong>Nombre:</strong><em> <?echo strtoupper($rows['NombreEmp']);?></em>
<br /><br /> 
<strong>Correo electronico:</strong><em> <?echo $rows['EmailEmp']; ?></em> 
<br /><br />
<strong>Teléfono 1:</strong><em> <?echo $rows['TelefonoEmp']; ?></em>
<br /><br />
<strong>Teléfono 2:</strong><em> <?echo $rows['Telefono2Emp']; ?></em>
<br /><br />
<strong>Clasificación:</strong><em> <?echo utf8_decode(strtoupper($rows['ClasificacionEmp'])); ?></em> 
<strong> Sector:</strong><em> <?echo strtoupper($rows['SectorEmp']); ?></em>
<strong> Giro:</strong><em> <?echo strtoupper($rows['GiroEmp']); ?></em>
<br /><br />
<strong>Acuerdo:</strong><em> <?echo strtoupper($rows['AcuerdoEmp']); ?></em>  
</p>

<h3>Dirección</h3>

<p>
<strong>Dirección:</strong><em> <? echo $rows['DireccionEmp']; ?></em>
<br /><br />
<strong>Estado:</strong><em> <?echo strtoupper($rows['EstadoEmp']); ?></em> 
<strong> Municipio:</strong><em> <?echo strtoupper($rows['MunicipioEmp']); ?></em>
<strong> Localidad:</strong><em> <?echo strtoupper($rows['LocalidadEmp']); ?></em>
</p>

<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:crearContenidosArreglo('IdEmp','<? echo $empresa; ?>','../ss-empresa/modificandoEmpresa.php');" />
</div>
<?	}	?>
