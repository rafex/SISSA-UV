
<p><strong>Creación de nuevos periodos escolares</strong></p>

<form name="periodos" method="post" action="" >
	<p>Crear el periodo:</p>
	<input name="periodo" id="periodo" type="text" maxlength="225" tabindex="1" title="Le sugerimos que ponga el mes y año juntos así como con un guión juntos por ejemplo ENERO2010-AGOSTO2010" placeholder="ENERO2011-AGOSTO2011" autofocus />
	<br>
	<input type="button" onclick="javascript:realizarOperacion('../ss-config/crearPeriodo.php','periodo');" value="Crear">
</form>
