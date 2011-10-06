<?
include_once '../script/php/functions.php';
conectar();
$sql="SELECT DISTINCT `periodo` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die(mysql_error());
?>
<h3>Modificar la contraseña de un alumno.</h3>

<form>
	<p>Matrícula del alumno
		<input id="alu" name="alu" type="text"  />
		<select name="periodo" id="periodo">
	    <? while($fila=mysql_fetch_array($result)){ ?>
	        <option value="<?echo $fila['periodo'];?>"><?echo $fila['periodo'];?></option>
	    <? } ?>
		</select>
	</p>
	<p>Nueva contraseña
		<input id="clave" name="clave" type="password"  />
	</p>
	<?
	@ session_start();
	if($_SESSION['nivel']=='editor'){ ?>
		
		<input type="button" value="Modificar contraseña" onclick="javascript:metodoAgil('../ss-admin/modificarPass.php','clave,alu,periodo','Contraseña modificada con exito.','../ss-admin/passAlu.php');" />
	<? }else{ ?>
		<input type="button" value="Modificar contraseña" onclick="javascript:metodoAgil('modificarPass.php','clave,alu,periodo','Contraseña modificada con exito.','passAlu.php');" />
	<? }	?>
</form>