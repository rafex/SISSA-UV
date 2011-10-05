<? 
include_once '../script/php/functions.php';
session_start();

conectar();
$matricula=$_SESSION['matricula'];

$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu,generoalu,edocivilalu,edadalu,nacionalidadalu,nacimientoalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor FROM alumno_ss_fca,datos_extra_alumno WHERE alumno_ss_fca.matriculaalu='$matricula' AND datos_extra_alumno.MatriculaAlu='$matricula' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());


while($rows=mysql_fetch_array($result)){
	


?>
<div id="datos">
<h3>Datos del alumno</h3>
<input type='hidden' id='periodo' value='<?php echo $rows['periodoalu']; ?>' />
<p> 
<strong>Nombre:</strong><input type="text" id="NombreAlu" size="30"  value="<?echo strtoupper($rows['nombrealu']);?>" />

<br /><br />
<strong>Carrera:</strong>
	<select id="CarreraAlu" name="CarreraAlu" >
		<option value="sin" <? if($rows['carreraalu']=='sin'){ echo "selected=\"selected\"";} ?> >Seleccione</option>		
		<option value="la" <? if($rows['carreraalu']=='la'){ echo "selected=\"selected\"";} ?> >Administración</option>
		<option value="lc" <? if($rows['carreraalu']=='lc'){ echo "selected=\"selected\"";} ?> >Contabilidad</option>
		<option value="lsca" <? if($rows['carreraalu']=='lsca'){ echo "selected=\"selected\"";} ?> >Sistemas</option>
		<option value="lg" <? if($rows['carreraalu']=='lg'){ echo "selected=\"selected\"";} ?> >Gestión</option>
		
	</select>  

 
<strong> Sección:</strong><input type="text" id="SeccionAlu" size="5" value="<?echo $rows['seccionalu']; ?>" /> 
<strong> Periodo:</strong>
<?

$sql22="SELECT DISTINCT `periodo` FROM `configuraciones_ss_fca`";
$result22=mysql_query($sql22) or die(mysql_error());
?>
		
		
		<select id="PeriodoAlu" name="PeriodoAlu" disabled>
			  <?  while($fila=mysql_fetch_array($result22)){ ?>
			  	
        		<option value="<? echo $fila['periodo'];?>" <? if($fila['periodo']==$rows['periodoalu']){ echo "selected=\"selected\"";} ?> ><? echo $fila['periodo'];?></option>
    		<? } ?>
		
		</select>  
 
<br /><br />
<strong>Corre electronico:</strong><input type="text" id="EmailAlu" size="25" value="<?echo $rows['emailalu']; ?>" /> 
<strong> Teléfono:</strong><input type="text" id="TelefonoAlu" size="20" value="<?echo $rows['telefonoalu']; ?>" />
<br /><br />
<strong>Genero:</strong>
	<select id="generoalu" name="generoalu" >
		<option value="i" <? if($rows['generoalu']=='i'){ echo "selected=\"selected\"";} ?> >Seleccione</option>
		<option value="m" <? if($rows['generoalu']=='m'){ echo "selected=\"selected\"";} ?> >Masculino</option>
		<option value="f" <? if($rows['generoalu']=='f'){ echo "selected=\"selected\"";} ?> >Femenino</option>		
	</select>   
<strong> Estado Civil:</strong>
	<select id="edocivilalu" name="edocivilalu" >
		<option value="solter@" <? if( $rows['edocivilalu']=='solter@'){ echo "selected=\"selected\"";} ?>  >Soltero(a)</option>
		<option value="casad@" <? if( $rows['edocivilalu']=='casad@'){ echo "selected=\"selected\"";} ?> >Casado(a)</option>
	</select>
		
<br /><br />
<strong>Nacionalidad:</strong><input type="text" id="nacionalidadalu" size="20" value="<?echo strtoupper($rows['nacionalidadalu']); ?>" />  
<strong> Fecha de nacimiento:</strong><input type="text" id="nacimientoalu" size="10" value="<? if($rows['nacimientoalu']=='0000-00-00'){ echo 'AAAA-MM-DD'; }else{ echo $rows['nacimientoalu']; }?>" />
<strong> Edad:</strong><input type="text" id="edadalu" size="3" value="<?echo $rows['edadalu']; ?>" />
<strong> Lugar de nacimiento:</strong><input type="text" id="lugarnacimientoalu" size="15" value="<?echo strtoupper($rows['lugarnacimientoalu']); ?>" />
</p>
<h3>Dirección</h3>
<p>
<strong>Calle:</strong><input type="text" id="calledireccion" size="30" value="<?echo $rows['calledireccion'];?>" />
<strong> Numero:</strong><input type="text" id="numdireccion" size="5" value="<?echo $rows['numdireccion'];?>" /> 
<strong> Colonia:</strong><input type="text" id="coloniadireccion" size="15" value="<?echo $rows['coloniadireccion']; ?>" /> 
<strong> C.P.:</strong><input type="text" id="cpdireccion" size="5" value="<?echo $rows['cpdireccion']; ?>" /> 
<br /><br />
<strong>Estado:</strong><input type="text" id="estadoalu" size="10" value="<?echo strtoupper($rows['estadoalu']); ?>" /> 
<strong> Municipio:</strong><input type="text" id="municipioalu" size="10" value="<?echo strtoupper($rows['municipioalu']); ?>" />
<strong> Localidad:</strong><input type="text" id="localidadalu" size="10" value="<?echo strtoupper($rows['localidadalu']); ?>" />
</p>
<h3>Tutor</h3>
<p>
<strong>Nombre:</strong><input type="text" id="tutoralu" size="40" value="<?echo strtoupper($rows['tutoralu']); ?>" />
<br /><br />
<strong> Direccion:</strong><input type="text" id="direcciontutor" size="40" value="<?echo $rows['direcciontutor']; ?>" />
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('personales.php');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('guardarPersonal.php','periodo,NombreAlu,CarreraAlu,SeccionAlu,PeriodoAlu,EmailAlu,TelefonoAlu,generoalu,edocivilalu,nacionalidadalu,nacimientoalu,edadalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor','vacio','contenido','personales.php','nada','nada','Guardando...','Datos personales modificados con exito.')" />
<!-- input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('guardarPersonal.php','NombreAlu,CarreraAlu,SeccionAlu,PeriodoAlu,EmailAlu,TelefonoAlu,generoalu,edocivilalu,nacionalidadalu,nacimientoalu,edadalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor','Datos modificados correctamente','index.php')" -->
</div>
<?	}	?>