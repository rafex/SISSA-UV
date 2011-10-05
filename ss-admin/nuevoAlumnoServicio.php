<?php 
$matricula=$_POST['matricula'];
$periodo=$_POST['periodo'];
?>
<div id="datos">

<h3>Datos del servicio social</h3>
<input type="hidden" id="matricula" value="<?php echo $matricula;?>" />
<input type="hidden" id="periodo" value="<?php echo $periodo;?>" />
<p>
<strong>Nombre del programa:</strong><input type="text" id="NombrePrograma" size="35" />	
<br /><br />
<strong>Objetivo programa:</strong><input type="text" id="ObjetivoPrograma" size="35"  /> 
<br /><br />
<strong>Naturaleza del programa:</strong><input type="text" id="FuncionHist" size="35"  />
<br /><br />
<strong>Tipo de servicio:</strong>
	<select id="TipoHist" name="TipoHist" >
			<option value="ninguno" >ninguno</option>
			<option value="becado" >becado</option>
			<option value="uv" >uv</option>
			<option value="brigada" >brigada</option>
			<option value="becado y uv" >becado y uv</option>
			<option value="becado , uv y brigada" >becado , uv y brigada</option>
			
		
	</select>
<br /><br />
<strong>Area de trabajo:</strong><input type="text" id="AreaHist" size="35"  />
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:crearContenidosArregloConMensaje('verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo;?>','','contenido');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('cargarAlumnoServicio.php','periodo,matricula,NombrePrograma,ObjetivoPrograma,FuncionHist,TipoHist,AreaHist','vacio','contenido','verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo;?>','Guardando...','Datos del Servicio modificados del alumno: <?php echo $matricula; ?>')" />

</div>
