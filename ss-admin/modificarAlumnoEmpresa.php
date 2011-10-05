<? 
include_once '../script/php/functions.php';
session_start();

conectar();
$matricula=$_POST['matricula'];
$periodo=$_POST['periodo'];
$query="SELECT empresa FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula' AND PeriodoAlu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$rows=mysql_fetch_array($result);
$empresa=$rows['empresa'];

$query="SELECT * FROM empresa_ss_fca WHERE IdEmp = '$empresa' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());


while($rows=mysql_fetch_array($result)){
	


?>
<div id="datos">

<h3>Datos de la empresa</h3>
<input type="hidden" id="IdEmp" value="<?echo $empresa; ?>" />
<p>
<strong>Nombre:</strong> <input type="text" id="NombreEmp" size="40" value="<? echo strtoupper($rows['NombreEmp']); ?>" />
<br /><br /> 
<strong>Correo electronico:</strong> <input type="text" id="EmailEmp" size="30" value="<?echo $rows['EmailEmp']; ?>" />  
<br /><br />
<strong>Teléfono 1:</strong> <input type="text" id="TelefonoEmp" size="15" value="<?echo $rows['TelefonoEmp']; ?>" />
<br /><br />
<strong>Teléfono 2:</strong> <input type="text" id="Telefono2Emp" size="15" value="<?echo $rows['Telefono2Emp']; ?>" />
<br /><br />
<strong>Clasificación:</strong> <input type="text" id="ClasificacionEmp" size="10" value="<?echo utf8_decode($rows['ClasificacionEmp']); ?>" /> 
<strong> Sector:</strong>
	<select id="SectorEmp" name="SectorEmp" >
			<option value="primario" <? if($rows['SectorEmp']=='primario' || $rows['SectorEmp']=='PRIMARIO' ){ echo "selected=\"selected\"";} ?> >Primario</option>
			<option value="secundario" <? if($rows['SectorEmp']=='secundario' || $rows['SectorEmp']=='SECUNDARIO'){ echo "selected=\"selected\"";} ?> >Secundario</option>
			<option value="terciario" <? if($rows['SectorEmp']=='terciario' || $rows['SectorEmp']=='TERCIARIO'){ echo "selected=\"selected\"";} ?> >Terciario</option>		
			
		
	</select> 
 
<strong> Giro:</strong> <input type="text" id="GiroEmp" size="10" value="<?echo strtoupper($rows['GiroEmp']); ?>" />
<br /><br />
<strong>Acuerdo:</strong>
	<select id="AcuerdoEmp" name="AcuerdoEmp" >
			<option value="se tiene y se desea mantener" <?if($rows['AcuerdoEmp']=="se tiene y se desea mantener"){ echo "selected=\"selected\"";} ?> >Se tiene y se desea mantener</option>
			<option value="se tiene y NO se desea mantener" <?if($rows['AcuerdoEmp']=="se tiene y NO se desea mantener"){ echo "selected=\"selected\"";} ?> >Se tiene y NO se desea mantener</option>
			<option value="no se tiene y se desea firmar" <?if($rows['AcuerdoEmp']=="no se tiene y se desea firmar"){ echo "selected=\"selected\"";} ?> >No se tiene y se desea firmar</option>
			<option value="no se tiene y NO se desea firmar" <?if($rows['AcuerdoEmp']=="no se tiene y NO se desea firmar"){ echo "selected=\"selected\"";} ?> >No se tiene y NO se desea firmar</option>
	</select>
<br /><br />
<strong>Tipo empresa:</strong>
	<select id="TipoEmp" name="TipoEmp" >
			<option value="publica" <?if($rows['TipoEmp']=="publica"){ echo "selected=\"selected\"";} ?> >Pública</option>
			<option value="privada" <?if($rows['TipoEmp']=="privada"){ echo "selected=\"selected\"";} ?> >Privada</option>
			<option value="uv" <?if($rows['TipoEmp']=="uv"){ echo "selected=\"selected\"";} ?> >UV</option>
			
	</select>	
</p> 

<h3>Dirección</h3>

<p>
<strong>Dirección:</strong> <input type="text" id="DireccionEmp" size="45" value="<? echo $rows['DireccionEmp']; ?>" />
<br /><br />
<strong>Estado:</strong> <input type="text" id="EstadoEmp" size="10" value="<?echo strtoupper($rows['EstadoEmp']); ?>" /> 
<strong> Municipio:</strong> <input type="text" id="MunicipioEmp" size="10" value="<?echo strtoupper($rows['MunicipioEmp']); ?>" />
<strong> Localidad:</strong> <input type="text" id="LocalidadEmp" size="10" value="<?echo strtoupper($rows['LocalidadEmp']); ?>" />
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:crearContenidosArregloConMensaje('verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','','contenido');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('guardarAlumnoEmpresa.php','IdEmp,NombreEmp,EmailEmp,TelefonoEmp,Telefono2Emp,ClasificacionEmp,SectorEmp,GiroEmp,AcuerdoEmp,DireccionEmp,EstadoEmp,MunicipioEmp,LocalidadEmp,TipoEmp','vacio','contenido','verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo; ?>','Guardando...','Datos de la empresa modificados del alumno: <?php echo $matricula; ?>')" />

</div>
<?	}	?>