<?
// index del alumno (ss-alumno)
	@ session_start();
	if(!($_SESSION['nivel']=='alumno')){
		header ("Location: ../index.php");
	}
	include_once('../header.php'); ?>

    <? include_once '../menus/menu_alu.php'; ?>
	<? include_once('../derecho.php');   ?>

	<div id="contenido">

        <h2>¡Bienvenido <?echo $_SESSION['nombre']?>!</h2>
        <p class="parr">Con este sistema de información podrá revisar y modificar sus datos del servicio social como son : <strong>personales</strong> y <strong>empresa</strong> 
        así como ver el progreso de su evaluación en: <strong>Experiencia Educativa</strong> del <strong>Servicio Social</strong>.</p>		
		<p>
        <img src="../images/estudiantes.png" width="400" heigth="400"/>

        </p>
	</div> <!-- Aqui termina Contenido -->

<? include_once('../footer.php'); ?>

