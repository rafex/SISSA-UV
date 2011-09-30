<?
// index del alumno (ss-alumno)
	session_start();
	$_SESSION['activa']=true;
	include_once('../header.php'); ?>

    <? //include_once '../menus/menu_alu.html'; ?>
	<? include_once('../derecho.php');   ?>

	<div id="contenido">

        <h3>Genere su contraseña.</h3>
        <p>En este momento usted debera crear su contraseña <em>(clave de acceso)</em> que será registrada y asociada con su matricula.</p>
        <form>
			<input id="clave" name="clave" type="password" autofocus />
			
			<input type="button" value="Guardar" onclick="javascript:realizarOperacionConMensajeAccion('crearpw.php','clave','Contraseña creada con exito. Ahora vuelva a iniciar sesión con su contraseña nueva.','../login.php?cerrar=1');" />
		</form>

        
	</div> <!-- Aqui termina Contenido -->

<? include_once('../footer.php'); ?>


