<h3>Modificar la contraseña de un alumno.</h3>

<form>
	<p>Matrícula del alumno
		<input id="alu" name="alu" type="text"  />
	</p>
	<p>Nueva contraseña
		<input id="clave" name="clave" type="password"  />
	</p>
	<?
	@ session_start();
	if($_SESSION['nivel']=='evaluador'){ ?>
		
		<input type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('../ss-admin/modificarPass.php','clave,alu','Contraseña modificada con exito.','index.php');" />
	<? }else{ ?>
		<input type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('modificarPass.php','clave,alu','Contraseña modificada con exito.','index.php');" />
	<? }	?>
</form>