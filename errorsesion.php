<?php 
session_start();
if($_SESSION['activa']){

		if($_SESSION['nivel']=='admin')
		{ 
			header ("Location: ss-admin/index.php");

		}
		elseif($_SESSION['nivel']=='evaluador')
		{ 
			header ("Location: ss-evaluacion/index.php");
		}

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


<title>Iniciar Sesión en SISSA - UV </title>

<!-- CSS -->
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />

<!-- JavaScript -->
<script type="text/javascript" src="script/js/wufoo.js"></script>
<script type="text/javascript" src="script/js/script.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container">

<h1 id="logo">
		<a href="index.php" title="">*</a>
	</h1>
<script>
	alert('Error al Iniciar Sesión');
</script>
<form id="sesion" name="sesion" class="wufoo  page" autocomplete="off" enctype="multipart/form-data" method="post" action="javascript:validarIni();" novalidate>

<header id="header" class="info">
	<h2>Iniciar Sesión</h2>
	<div></div>
</header>

<ul>
		
		
		
	
<li id="foli1" 
		class="     ">
	<label class="desc" id="title2" for="Field2">
		Usuario:
			</label>
	<div>
		<input name="usuario" id="usuario" type="text" class="field text large" value="" maxlength="15" tabindex="1" placeholder="Usuario" autofocus/> 
	</div>

		
	</li>



<li id="foli2" 		class="     ">
	<label class="desc" id="title2" for="Field2">
		Password:
			</label>
	<div>
		<input name="contrasenia" id="contrasenia" type="password" class="field text large" value="" maxlength="15" tabindex="2" placeholder="Password"/> 
	</div>
		<p class="instruct" id="instruct2"><small>No revele a nadie su password.</small></p>
	</li>


 	
		
	<li class="buttons ">
		<div>
					
						<input tabindex="3" type="submit" class="btTxt submit" value="Entrar" />
							
				
				</div>
	</li>

	
</ul>
</form>

</div><!--container-->
<img id="bottom" src="images/bottom.png" alt="" />

<style type="text/css">
@import url(/css/global/power.14617.css);
</style>


<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:14px;color:#777;padding:0 0 0 3px;">Creado el 15 febrero del 2011, Por Raúl Eduardo González Argote by Rafex</b>

</body>
</html>
