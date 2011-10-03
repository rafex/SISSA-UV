<? 
include_once '../script/php/functions.php';


conectar();
$matricula=$_POST['matricula'];
$query="SELECT * FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

while($rows=mysql_fetch_array($result)){

?>
<div id="datos">
<input type="hidden" id="matricula" value="<?php echo $matricula;?>" />
<h3>Datos del servicio social</h3>
<input type="hidden" id="IdEmp" value="<?echo $rows['Empresa'];?>" />
<input type="hidden" id="IdEnc" value="<?echo $rows['JefeDirectoHist'];?>" />
<p>
<strong>Nombre del programa:</strong><input type="text" id="NombrePrograma" size="35" value="<?echo strtoupper($rows['NombrePrograma']);?>" />	
<br /><br />
<strong>Objetivo programa:</strong><input type="text" id="ObjetivoPrograma" size="35"  value="<?echo strtoupper($rows['ObjetivoPrograma']); ?>" /> 
<br /><br />
<strong>Naturaleza del programa:</strong><input type="text" id="FuncionHist" size="35"  value="<?echo strtoupper($rows['FuncionHist']); ?>" />
<br /><br />
<strong>Tipo de servicio:</strong>
	<select id="TipoHist" name="TipoHist" >
			<option value="ninguno" <? if($rows['TipoHist']=="ninguno"){ echo "selected=\"selected\""; } ?> >ninguno</option>
			<option value="becado" <? if($rows['TipoHist']=="becado"){ echo "selected=\"selected\""; } ?> >becado</option>
			<option value="uv" <? if($rows['TipoHist']=="uv"){ echo "selected=\"selected\""; } ?> >uv</option>
			<option value="brigada" <? if($rows['TipoHist']=="brigada"){ echo "selected=\"selected\""; } ?> >brigada</option>
			<option value="becado y uv" <? if($rows['TipoHist']=="becado y uv"){ echo "selected=\"selected\""; } ?> >becado y uv</option>
			<option value="becado , uv y brigada" <? if($rows['TipoHist']=="becado , uv y brigada"){ echo "selected=\"selected\""; } ?> >becado , uv y brigada</option>
			
		
	</select>
<br /><br />
<strong>Area de trabajo:</strong><input type="text" id="AreaHist" size="35"  value="<?echo strtoupper($rows['AreaHist']); ?>" />
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:crearContenidosArregloConMensaje('verAlumno.php','matricula,carrera','<?php echo $matricula; ?>,<?php echo $carrera;?>','','contenido');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('guardarAlumnoServicio.php','matricula,NombrePrograma,ObjetivoPrograma,FuncionHist,TipoHist,AreaHist','vacio','contenido','verAlumno.php','matricula,carrera','<?php echo $matricula; ?>,<?php echo $carrera;?>','Guardando...','Datos del Servicio modificados del alumno: <?php echo $matricula; ?>')" />

</div>
<?	}	?>