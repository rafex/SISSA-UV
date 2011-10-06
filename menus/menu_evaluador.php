<?php 
	@ session_start();
	if(!($_SESSION['nivel']=='evaluador') && !($_SESSION['activa']==true) ){
		header ("Location: ../index.php");
	}
?>
        <div id="menu">
	        <ul class="menu">
	        
                <li><a href="#">Evaluar</a>
                    <ul>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','la','../ss-evaluacion/seleccion.php');">Administración</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lc','../ss-evaluacion/seleccion.php');">Contaduría</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lg','../ss-evaluacion/seleccion.php');">Gestión</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lsca','../ss-evaluacion/seleccion.php');">Sistemas</a></li>                        
                        <li><a href="#" onclick="javascript:cargarContenido('../ss-evaluacion/buscandoAlumnos.php');">Filtro</a></li>
                    </ul>
                </li>
               

            </ul> <!--- Termina el ul de menu --->
        </div><!-- Termina el div de menu-->
