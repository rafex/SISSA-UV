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
$jefe=$rows3['NombreEnc']; */

?>
<div id="datos">

<h3>Datos del servicio social</h3>
<input type="hidden" id="IdEmp" value="<?echo $rows['Empresa'];?>" />
<input type="hidden" id="IdEnc" value="<?echo $rows['JefeDirectoHist'];?>" />
<p>
<strong>Nombre del programa:</strong><input type="text" id="NombrePrograma" size="35" value="<?echo strtoupper($rows['NombrePrograma']);?>" />	
<!--br /><br />
<strong>Empresa:</strong><input type="text" id="Empresa" size="35"  value="<?echo strtoupper($empresa);?>" -->
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

<!--br /><br />
<strong>Jefe directo:</strong><input type="text" id="JefeDirectoHist" size="35"  value="<?echo utf8_decode(strtoupper($jefe)); ?>" --> 
<br /><br />
<strong>Area de trabajo:</strong><input type="text" id="AreaHist" size="35"  value="<?echo strtoupper($rows['AreaHist']); ?>" />
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('servicio.php');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('guardarServicio.php','NombrePrograma,ObjetivoPrograma,FuncionHist,TipoHist,AreaHist','Datos del servicio modificados exitosamente.','index.php')" />
</div>
<?	}	?>