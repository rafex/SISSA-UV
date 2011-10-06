<?        
@ session_start();
if(!($_SESSION['nivel']=='admin')){
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
                
                <li><a href="#">Empresa</a>
                    <ul>
                        <li><a href="#" onclick="cargarContenido('../ss-empresa/listaempresas.php');">Lista</a></li>
                        
                    </ul>
                </li>
                
                <li><a href="#">Alumnos</a>
                    <ul>
                    	<li><a href="#">Lista</a>
                    		<ul>
                    			<li><a href="#" onclick="javascript:crearContenidos('carrera','la','seleccion.php');">L.A.</a></li>
                        		<li><a href="#" onclick="javascript:crearContenidos('carrera','lc','seleccion.php');">L.C.</a></li>
		                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lg','seleccion.php');">L.G</a></li>
		                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lsca','seleccion.php');">L.S.C.A.</a></li>
                    		</ul>
                    		
                    	</li>
                        <li><a href="#" onclick="cargarContenido('passAlu.php');">Contraseña</a></li>
                        <li><a href="#" onclick="cargarContenido('limpiarAlu.php');">Limpiar</a></li>                        
                    </ul>
                </li>
                
                <li><a href="#">Usuarios</a>
                    <ul>
                        <li><a href="#" onclick="cargarContenido('listaUsuarios.php');">Lista</a></li>
                        
                    </ul>
                </li>
                
                <li><a href="#">Configuraciones</a>
                    <ul>
                        <li><a href="#" onclick="cargarContenido('../ss-config/criterios.html');">Crear Criterios</a></li>
                        <li><a href="#" onclick="cargarContenido('../ss-config/periodos.php');">Periodos</a></li>
                        <li><a href="#" onclick="cargarContenido('correo.php');">Correo</a></li>
                    </ul>
                </li>

            </ul> <!--- Termina el ul de menu --->
        </div><!-- Termina el div de menu-->
