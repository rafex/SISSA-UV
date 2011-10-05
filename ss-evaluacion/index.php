<?
// index del evaluador (ss-evaluacion)
	@ session_start();
	if(!($_SESSION['nivel']=='evaluador')){
		header ("Location: ../index.php");
	}
    include_once('../header.php'); ?>

    <? include_once '../menus/menu_evaluador.php'; ?>
	<? include_once('../derecho.php');   ?>

	<div id="contenido">
        

        <h2>¡Bienvenido Evaluador!</h2>
        <p class="parr">Con este sistema de información podrá <strong>gestionar</strong> y <strong>administrar</strong> de manera optima a todos los estudiantes que estan cursando
        la <strong>Experiencia Educativa</strong> del <strong>Servicio Social</strong></p>		
		<p>
        <img src="../images/estudiantes.png" width="400" heigth="400"/>

        </p>
	</div> <!-- Aqui termina Contenido -->

<? include_once('../footer.php'); ?>

