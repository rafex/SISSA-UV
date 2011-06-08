<?
include_once 'clases/sesion.php';
session_start();
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
		{ 
			header ("Location: ss-admin/index.php");

		}
		elseif($_SESSION['nivel']=='evaluador')
		{ 
			header ("Location: ss-evaluacion/index.php");
		}
	}else{
		
		header ("Location: errorsesion.php");
	}

}

if(!empty($c))
{
	if($c==1)
	{
		$sesion->cerrar();
	}
}
?>
