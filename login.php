<?
include_once 'clases/sesion.php';
@ session_start();
$usr=$_POST['usuario'];
$pw=$_POST['contrasenia'];
$c=$_GET['cerrar'];
$sesion= new Sesion();
if(!empty($usr) && !empty($pw))
{

	$sesion= new Sesion();
	
	if($sesion->iniciar($usr,$pw))
	{
		
		if($_SESSION['nivel']=='admin')
		{ ?>
        	<script>
				location.href = "ss-admin/index.php";
			</script>
<?  	} 
		elseif($_SESSION['nivel']=='evaluador'){ ?>
            <script>
				location.href = "ss-evaluacion/index.php";
			</script>
<?  	}
	}
	else
	{
?>
            <script>
				location.href = "errorsesion.php";
			</script>
<?  		
		//header ("Location: errorsesion.php");
	}

}

if(!empty($c))
{
	if($c==1)
	{
		$sesion->cerrar();
?>
            <script>
				location.href = "index.php";
			</script>
<?		
		//header ("Location: index.php");
	}
}
?>
