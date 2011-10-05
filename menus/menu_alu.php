<?php 
	@ session_start();
	if(!($_SESSION['nivel']=='alumno')){
		header ("Location: ../index.php");
	}
?>
        <div id="menu">
	        <ul class="menu">
	        
                <li><a href="#">Datos</a>
                    <ul>
                        <li><a href="#" onclick="javascript:cargarContenido('personales.php');">Personales</a></li>
                        <li><a href="#" onclick="javascript:cargarContenido('servicio.php');">Servicio</a></li>
                        <li><a href="#" onclick="javascript:cargarContenido('empresa.php');">Empresa</a></li>
                        <li><a href="#" onclick="javascript:cargarContenido('jefe.php');">Jefe</a></li>
                        
                    </ul>
                </li>
                <li><a href="#">Evaluación</a>
                    <ul>
                        <li><a href="#" onclick="javascript:cargarContenido('progreso.php');">Ver progreso</a></li>
                        
                    </ul>
                </li>
				<li><a href="nuevoPass.php">Cambiar Contraseña</a></li>

            </ul> <!--- Termina el ul de menu --->
        </div><!-- Termina el div de menu-->
