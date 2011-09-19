<? 
include_once '../script/php/functions.php';
session_start();
conectar();
$usr=$_POST['usr'];
$query="SELECT * FROM usuarios_ss_fca WHERE usuario='$usr' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

if($rows=mysql_fetch_array($result)){
	


?>
<div id="datos">

<h3>Datos del usuario:<?echo $usr; ?></h3>
<input type="hidden" id="usr" value="<?echo $usr;?>" />
<p>
<strong>Nivel:</strong>
	<select id="nivel">
		<option value="evaluador" <?if($rows['nivel']=="evaluador"){ echo "selected=\"selected\"";} ?> >Evaluador</option>
		<option value="admin" <?if($rows['nivel']=="admin"){ echo "selected=\"selected\"";} ?>  >Administrador</option>
	</select>	
<br /><br />
<strong>Nombre:</strong>
<input type="text" id="nomb" size="30" maxlength="30" value="<? echo $rows['nombre']; ?>" /> 
<br /><br />
<strong>Cambiar contraseña:</strong>
<input type="text" id="pass" size="15" maxlength="15" /> 
</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:cargarContenido('listaUsuarios.php');" />
<input name="modificar" id="modificar" type="button" value="Borrar" onclick="javascript:borrarUsuario();" />
<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:modificarUsuario();" />
</div>
<?	}	?>