<?
include_once'clases/conectar.php';
include_once'clases/functions.php';

$conx=new Conexion();
$conx->getConexion();
$turno=$_POST['turno'];
$beca=$_POST['beca'];
$tipo=$_POST['tipo'];
$sector=$_POST['actividad'];
//$habilidades=sin_acentos_espacios($_POST['habilidades']);
$conocimientos=sin_acentos_espacios($_POST['conocimientos']);
$actitudes=sin_acentos_espacios($_POST['actitudes']);

$empresas=mysql_query("SELECT * FROM empresa WHERE tipo_empresa='$tipo' AND sector_empresa='$sector' ;");

?>
<!DOCTYPE html>
<html>
<head>

<title>
Apoyo a la selección del Servicio Social
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Bluefish 2.0.3" />

<!-- CSS -->
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />
<link rel="stylesheet" href="css/tagbox.css" type="text/css" />

<!-- JavaScript -->
<script type="text/javascript" src="scripts/wufoo.js"></script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container">

<h1 id="logo">
	<a href="index.html" title="" >*</a>
	</h1>
<center>

<h1>Registro realizado con exito</h1>
<p><a href="index.php" > [ Volver ] </a></p>
	 
</center>
</div><!--container-->


<style type="text/css">
@import url(/css/global/power.14617.css);
</style>

<a class="powertiny" href="http://rafex.com.mx" title=""
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">
<span style="background:url(./images/powerlogo.png) no-repeat center 7px; margin:0 auto;display:inline-block !important;visibility:visible !important;text-indent:-9000px !important;position:static !important;overflow: auto !important;width:62px !important;height:30px !important">Wufoo</span>
<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">by Rafex</b>
</a>
</body>
</html>
