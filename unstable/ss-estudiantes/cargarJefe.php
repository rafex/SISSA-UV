
<div id="datos">

<h3>Datos del jefe directo</h3>

<p>
<strong>Nombre:</strong> <input type="text" id="NombreEnc" size="40" />	
<br /><br />
<strong>Puesto:</strong> <input type="text" id="PuestoEnc" size="40" />
<br /><br />
<strong>Correo electrónico:</strong> <input type="text" id="EmailEnc" size="40" /> 

</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('jefe.php');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion2('nuevoJefe.php','NombreEnc,PuestoEnc,EmailEnc','Datos del jefe agregados exitosamente.','index.php')" />
</div>
