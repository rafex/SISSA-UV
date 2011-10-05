<? 
include_once '../script/php/functions.php';
session_start();

conectar();
$matricula=$_SESSION['matricula'];
$periodo=$_SESSION['periodo'];
$query="SELECT empresa FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' and periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$hayAlgo=mysql_num_rows($result);
$rows=mysql_fetch_array($result);
$empresa=$rows['empresa'];

$query="SELECT * FROM empresa_ss_fca WHERE IdEmp = '$empresa' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

	if($hayAlgo<=0){?>
		<p class="verde">Primero cargue sus datos de servicio social <a href="#" class="azul" onclick="javascript:cargarContenido('cargarServicio.php');">aquí.</a></p>
<?
	}else{

		if($rows=mysql_fetch_array($result)){	?>
		<div id="datos">
		
		<h3>Datos de la empresa</h3>
		
		<p>
		<strong>Nombre:</strong> <?echo strtoupper($rows['NombreEmp']);?>
		<br /><br /> 
		<strong>Correo electronico:</strong> <?echo $rows['EmailEmp']; ?> 
		<br /><br />
		<strong>Teléfono 1:</strong> <?echo $rows['TelefonoEmp']; ?>
		<br /><br />
		<strong>Teléfono 2:</strong> <?echo $rows['Telefono2Emp']; ?>
		<br /><br />
		<strong>Clasificación:</strong> <?echo utf8_decode(strtoupper($rows['ClasificacionEmp'])); ?> 
		<strong> Sector:</strong> <?echo strtoupper($rows['SectorEmp']); ?>
		<strong> Giro:</strong> <?echo strtoupper($rows['GiroEmp']); ?>
		<br /><br />
		<strong>Acuerdo:</strong> <?echo strtoupper($rows['AcuerdoEmp']); ?>  
		<br /><br />
		<strong>Tipo Empresa:</strong> <?echo strtoupper($rows['TipoEmp']); ?>
		</p>
		
		<h3>Dirección</h3>
		
		<p>
		<strong>Dirección:</strong> <? echo $rows['DireccionEmp']; ?>
		<br /><br />
		<strong>Estado:</strong> <?echo strtoupper($rows['EstadoEmp']); ?> 
		<strong> Municipio:</strong> <?echo strtoupper($rows['MunicipioEmp']); ?>
		<strong> Localidad:</strong> <?echo strtoupper($rows['LocalidadEmp']); ?>
		</p>
		
		<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificandoEmpresa.php');" />
		</div>
		<?	}else{	?>
			<input type="button" value="Cargar datos de la empresa" onclick="javascript:cargarContenido('cargarEmpresa.php');" />
<?			} // if para guardar datos
	
	}
	
?>