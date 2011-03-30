<?
include_once 'clases/sesion.php';
$sesion=new Sesion();
$usr=$_POST['usuario'];
$pass=$_POST['contrasenia'];
$cerrar=$_GET['cerrar'];

?>
<? include('header.php'); ?>

    <? include('menu.php'); ?>
	<? include('derecho.php');   ?>

	<div id="contenido">

<?
if($cerrar==1){
    $sesion->cerrar();?>

	    <h2>Inicio de Sesión</h2>
        <form id="sesion" name="sesion" method="post" action="javascript:validarIni();">
            <label>Usuario
                <input type="text" class="inisesion" name="usuario" id="usuario" tabindex="1" size="15" placeholder="Usuario" autofocus/>
            </label>
            
            <label>Contraseña
                <input type="password" class="inisesion" name="contrasenia" id="contrasenia" tabindex="2" size="15" placeholder="Contraseña"/>
            </label>    
            <!--input type="submit" value="Iniciar" tabindex="3"  /-->
            <input value="Iniciar" tabindex="3" type="submit" />
        </form>    
<?}else{
if(!($_SESSION['activa']==true)) { 
    if(!$usr && !$pass) { ?>
    
	    <h2>Inicio de Sesión</h2>
        <form id="sesion" name="sesion" method="post" action="javascript:validarIni();">
            <label>Usuario
                <input type="text" class="inisesion" name="usuario" id="usuario" tabindex="1" size="15" placeholder="Usuario" autofocus />
            </label>
            
            <label>Contraseña
                <input type="password" class="inisesion" name="contrasenia" id="contrasenia" tabindex="2" size="15"placeholder="Contraseña" />
            </label>    
            <!--input type="submit" value="Iniciar" tabindex="3"  /-->
            <input value="Iniciar" tabindex="3" type="submit" />
        </form>
<?  }else { 
    if($sesion->iniciar($usr,$pass)){ ?>

        <script>
            cargarContenido('principal.php');

        </script>      
    <? }else{ ?>
        <script>
            alert('Error al Iniciar Sesión');
        </script>
	    <h2>Inicio de Sesión</h2>
        <form id="sesion" name="sesion" method="post" action="javascript:validarIni();">
            <label>Usuario
                <input type="text" class="inisesion" name="usuario" id="usuario" tabindex="1" size="15" placeholder="Usuario" autofocus />
            </label>
            
            <label>Contraseña
                <input type="password" class="inisesion" name="contrasenia" id="contrasenia" tabindex="2" size="15" placeholder="Contraseña" />
            </label>    
            <!--input type="submit" value="Iniciar" tabindex="3"  /-->
            <input value="Iniciar" tabindex="3" type="submit" />
        </form>        
    <? }


    } 
}else{?>	

        <script>
            cargarContenido('principal.php');
                
        </script>

<? } // si la sesion ya inicio
}// este cierra la sesion?>

	</div> <!-- Aqui termina Contenido -->
	






<? include('footer.php'); ?>

