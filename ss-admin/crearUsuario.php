<div id="datos">

<h3>Creando un usuario nuevo</h3>

<p>
<strong>Usuario:</strong>
<input type="text" id="usr" size="30" maxlength="30"  /> 
<br /><br />
<strong>Nivel:</strong>
	<select id="nivel">
		<option value="evaluador" >Evaluador</option>
		<option value="admin"  >Administrador</option>
	</select>	
<br /><br />
<strong>Nombre:</strong>
<input type="text" id="nomb" size="30" maxlength="30"  /> 
<br /><br />
<strong>Contraseña:</strong>
<input type="text" id="pass" size="15" maxlength="15" /> 
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('listaUsuarios.php');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearUsuario();" />

</div>