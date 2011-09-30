
<p><strong>Limpia algun rastro del alumno si es que existe.</strong></p>

<form name="periodos" method="post" action="" >
	<p>Inserte matrícula:</p>
	<input name="matricula" id="matricula" type="text" maxlength="15" tabindex="1" autofocus />
	<p>
	<input type="checkbox" name="todo" id="todo" value="true"> Borrar todo <em>(hasta las calificaciones)</em></p>
	<br>
	<input type="button" onclick="javascript:realizarOperacion('limpiando.php','matricula,todo');" value="Lmipiar...">
</form>
