<?  session_start();
    include_once 'script/php/functions.php'; 
    include_once 'clases/sesion.php';
    $sesion=new Sesion();    
	if(!$_SESSION['activa']){
		header ("Location: ../index.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
<!--meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Author" content="Raul Eduargo Gonzalez Argote" />
<meta name="Date" content="Feb 15, 2011" />
<meta name="robots" content="all">
<meta name="keywords" content="servicio,social,universitario,universidad,uv,veracruzana,xalapa,sistema,informacion" />
<meta name="description" content="Sistema de Informacion del Departamento de Servicio Social de la Facultad de Contaduría y Administracion Campus Xalapa, Universidad Veracruzana. Administrando y Gestionando la información que se genera y recibe en este departamento." />


<title>SISSA - UV </title>
<link href="../images/logouv.ico" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/dialog_box.css" />
<link rel="stylesheet" type="text/css" href="../css/index.css">
<script type="text/javascript" src="../script/js/index.js"></script>
<script type="text/javascript" src="../script/js/script.js"></script>
<script type="text/javascript" src="../script/js/togglemenu.js"></script>
<script type="text/javascript" src="../script/js/jquery-1.6.1.min.js" ></script>
<script type="text/javascript" src="../script/js/dialog_box.js"></script>


</head>

<body>

 <div id="container">
    <a href="../index.php"><div id="header"></div></a>

