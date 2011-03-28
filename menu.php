        <div id="menu">
        <? if($_SESSION['nivel']=="admin"){ ?>
    
	        <ul class="menu">
	        
                <li><a href="#">Carreras</a>
                    <ul>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','la','ss-evaluacion/listaalumnos.php');">Administración</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lc','ss-evaluacion/listaalumnos.php');">Contaduría</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lg','ss-evaluacion/listaalumnos.php');">Gestión</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lsca','ss-evaluacion/listaalumnos.php');">Sistemas</a></li>                        
                    </ul>
                </li>
                <li><a href="#">Category 2</a>
                    <ul>
                        <li><a href="#">Submenu 2a</a></li>
                        <li><a href="#">Submenu 2b</a></li>
                    </ul>
                </li>
                <li><a href="#">Configuraciones</a>
                    <ul>
                        <li><a href="#" onclick="cargarContenido('ss-config/criterios.html');">Crear Criterios</a></li>
                        <li><a href="#">Submenu 3b</a></li>
                    </ul>
                </li>

            </ul> <!--- Termina el ul de menu --->
        <? }elseif($_SESSION['nivel']=="normal"){ ?>

	        <ul class="menu">
	        
                <li><a href="#">Carreras</a>
                    <ul>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','la','ss-evaluacion/listaalumnos.php');">Administración</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lc','ss-evaluacion/listaalumnos.php');">Contaduría</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lg','ss-evaluacion/listaalumnos.php');">Gestión</a></li>
                        <li><a href="#" onclick="javascript:crearContenidos('carrera','lsca','ss-evaluacion/listaalumnos.php');">Sistemas</a></li>                        
                    </ul>
                </li>
                <li><a href="#">Category 2</a>
                    <ul>
                        <li><a href="#">Submenu 2a</a></li>
                        <li><a href="#">Submenu 2b</a></li>
                    </ul>
                </li>


            </ul> <!--- Termina el ul de menu --->

        <? }else{ ?>
	        <ul class="menu">
                <li><a href="index.php">Inicio</a>

                </li>
                
            </ul>        
        <?}?>
        </div>
