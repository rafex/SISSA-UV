<? 
include_once '../script/php/functions.php';
session_start();
conectar();
$matricula=$_POST['matricula'];
$periodo=$_POST['periodo'];
$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu,generoalu,edocivilalu,edadalu,nacionalidadalu,nacimientoalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor FROM alumno_ss_fca,datos_extra_alumno WHERE alumno_ss_fca.matriculaalu='$matricula' AND datos_extra_alumno.MatriculaAlu='$matricula' AND alumno_ss_fca.periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$hayDatos=mysql_num_rows($result);
if($hayDatos<=0){
	$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu FROM alumno_ss_fca WHERE alumno_ss_fca.matriculaalu='$matricula' AND alumno_ss_fca.periodoalu='$periodo' LIMIT 1";
	$result=mysql_query($query) or die(mysql_error());
}


?>
<div id="datos">
<?	
if($rows=mysql_fetch_array($result)){
	

$carrera=$rows['carreraalu'];
$carrera2;
if($carrera=='lsca'){
    $carrera2='Sistemas Computacionales Administrativos';
}elseif($carrera=='lc'){
    $carrera2='Contaduría';
}elseif($carrera=='la'){
    $carrera2='Administración';
}elseif($carrera=='lg'){
    $carrera2='Gestion de Negocios';
}
$genero=$rows['generoalu'];
if($genero=='m'){
	$genero="Masculino";	
}elseif($genero=='m'){
	$genero="Femenino";
}
?>


<h3>Datos del alumno</h3>
<p>
<strong>Nombre:</strong> <?echo $rows['nombrealu'];?>
<strong> Matricula:</strong> <?echo strtoupper($matricula);?>
<br /><br />
<strong>Carrera:</strong> <?echo $carrera2;?> 
<strong> Sección:</strong> <?echo $rows['seccionalu']; ?> 
<strong> Periodo:</strong> <?echo $rows['periodoalu']; ?> 
<br /><br />
<strong>Corre electronico:</strong> <?echo $rows['emailalu']; ?> 
<strong> Teléfono:</strong> <?echo $rows['telefonoalu']; ?>
<br /><br />
<strong>Genero:</strong> <? if($genero=="f"){ echo "FEMENINO"; }else{ echo "MASCULINO"; } ?> 
<strong> Estado Civil:</strong> <?echo $rows['edocivilalu']; ?>
<br /><br />
<strong>Nacionalidad:</strong> <?echo $rows['nacionalidadalu']; ?>  
<strong> Fecha de nacimiento:</strong> <?echo $rows['nacimientoalu']; ?>
<strong> Edad:</strong> <?echo $rows['edadalu']; ?>
<strong> Lugar de nacimiento:</strong> <?echo $rows['lugarnacimientoalu']; ?>
</p>
<h3>Dirección</h3>
<p>
<strong>Calle:</strong> <?echo $rows['calledireccion'];?>
<strong> Numero:</strong> <?echo $rows['numdireccion'];?> 
<strong> Colonia:</strong> <?echo $rows['coloniadireccion']; ?> 
<strong> C.P.:</strong> <?echo $rows['cpdireccion']; ?> 
<br /><br />
<strong>Estado:</strong> <?echo $rows['estadoalu']; ?> 
<strong> Municipio:</strong> <?echo $rows['municipioalu']; ?>
<strong> Localidad:</strong> <?echo $rows['localidadalu']; ?>
</p>
<h3>Tutor</h3>
<p>
<strong>Nombre:</strong> <?echo $rows['tutoralu']; ?>
<br /><br />
<strong> Direccion:</strong> <?echo $rows['direcciontutor']; ?>
</p>
<input name="modificar" id="modificar" type="button" value="Modificar datos personales" onclick="javascript:crearContenidosArregloConMensaje('modificarAlumnoPersonales.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />

<?	}/*else{
	
		$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu FROM alumno_ss_fca WHERE alumno_ss_fca.matriculaalu='$matricula' AND alumno_ss_fca.periodoalu='$periodo' LIMIT 1";
		$result=mysql_query($query) or die(mysql_error());

		if($rows=mysql_fetch_array($result)){
?>
		
		<h3>Datos del alumno</h3>
		<p>
		<strong>Nombre:</strong> <?echo $rows['nombrealu'];?>
		<strong> Matricula:</strong> <?echo strtoupper($matricula);?>
		<br /><br />
		<strong>Carrera:</strong> <?echo $carrera2;?> 
		<strong> Sección:</strong> <?echo $rows['seccionalu']; ?> 
		<strong> Periodo:</strong> <?echo $rows['periodoalu']; ?> 
		<br /><br />
		<strong>Corre electronico:</strong> <?echo $rows['emailalu']; ?> 
		<strong> Teléfono:</strong> <?echo $rows['telefonoalu']; ?>
		<br /><br />
	
<?	
		}	
	}*/


	

$query="SELECT * FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' AND periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());



	if($rows=mysql_fetch_array($result)){
		$empresa=$rows['Empresa'];
		$jefe=$rows['JefeDirectoHist'];
		
	?>
	
	
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
	<input name="modificar" id="modificar" type="button" value="Modificar datos servicio social" onclick="javascript:crearContenidosArregloConMensaje('modificarAlumnoServicio.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
	
	<? }else{	
		$hayAlgoE=true;
		$hayAlgoJ=true;
		?>
		<br /><br />
		<input type="button" value="Cargar datos del servicio social" onclick="javascript:crearContenidosArregloConMensaje('nuevoAlumnoServicio.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
	<?	} 
	
	/*$query="SELECT empresa FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' AND periodoalu='$periodo' LIMIT 1";
	$result=mysql_query($query) or die(mysql_error());
	$hayAlgo=mysql_num_rows($result);
	$rows=mysql_fetch_array($result);
	$empresa=$rows['empresa'];*/
	$hayAlgo=0;
	if(!empty($empresa) || $empresa==0){
		$hayAlgo=1;
		$query="SELECT * FROM empresa_ss_fca WHERE IdEmp = '$empresa' LIMIT 1";
		$result=mysql_query($query) or die(mysql_error());
	}
		
	if($hayAlgoE){?>
		<p class="verde">Para mostrar los datos de la empresa necesita cargar primero cargar con los datos de servicio social.</p>
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
		
		<input name="modificar" id="modificar" type="button" value="Modificar datos de la empresa" onclick="javascript:crearContenidosArregloConMensaje('modificarAlumnoEmpresa.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
		</div>
		<?	}else{	?>
			<br /><br />
			<input type="button" value="Cargar datos de la empresa" onclick="javascript:crearContenidosArregloConMensaje('nuevoAlumnoEmpresa.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
<?			} // if para guardar datos
	
	}
	
	/*$query="SELECT jefedirectohist FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' AND periodoalu='$periodo' LIMIT 1";
	$result=mysql_query($query) or die(mysql_error());
	$hayAlgo=mysql_num_rows($result);
	$rows=mysql_fetch_array($result);
	$jefe=$rows['jefedirectohist'];*/
	$hayAlgo=0;
	if(!empty($jefe) || $jefe==0){
		$hayAlgo=1;
		$query="SELECT * FROM encargado_ss_fca WHERE IdEnc = '$jefe' LIMIT 1";
		$result=mysql_query($query) or die(mysql_error());
	}
			
	if($hayAlgoJ){?>
		<p class="verde">Para mostrar los datos del jefe directo necesita cargar primero cargar con los datos de servicio social.</p>
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
		<input name="modificar" id="modificar" type="button" value="Modificar datos del jefe" onclick="javascript:crearContenidosArregloConMensaje('modificarAlumnoJefe.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
		</div>
		<?	}else{	?>
			<br /><br />
			<input type="button" value="Cargar datos datos del jefe" onclick="javascript:crearContenidosArregloConMensaje('nuevoAlumnoJefe.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
<?			} // if para guardar datos
	
	}
	
?>

</div>
