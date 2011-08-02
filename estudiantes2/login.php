<?
include_once 'clases/sesion.php';
$usr=$_POST['usr'];
$pw=$_POST['pw'];
$c=$_GET['c'];
$sesion= new Sesion();
if(!empty($usr) && !empty($pw)){

	$sesion= new Sesion();
	
	if($sesion->iniciar($usr,$pw)){
		header ("Location: formulario.php");
	}else{
		header ("Location: index.php");
	}

//	echo 'puto';
}else{
//	echo 'nel';
	header ("Location: index.php");
}

if(!empty($c)){
	if($c==1){
		$sesion->cerrar();
	}

	
}

?>
