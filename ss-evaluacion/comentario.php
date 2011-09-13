<?
include_once '../clases/evaluar.php';
$alumno=$_GET['alumno'];
$campoEvaluar=$_GET['campoEvaluar'];
$matricula=$_GET['matricula'];
$nota=$_GET['comentario'];
$criterio=$_GET['criterio'];
$evaluar=new Evaluar($matricula,$criterio);
$evaluar->comentario($campoEvaluar,$nota);
session_start();
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

<link rel="stylesheet" href="../css/style.css" type="text/css" />

<script type="text/javascript" src="../script/js/script.js"></script>
<!--script type="text/javascript" src="script/js/jquery-1.5.js"></script-->



</head>

<body>

 <div id="comentario">
    <p>Comentando la evaluación:  <?echo $campoEvaluar;?><p>
    <p>Alumno:  <? echo $evaluar->alumno();?><p>
    	<?php if(!($_SESSION['nivel']=='alumno')) {?>
        <form name="comentarios" method="get" action="comentario.php">
        <?php } ?>
            <input type="hidden" name="alumno" value="<? echo $alumno;?>">
            <input type="hidden" name="matricula" value="<? echo $matricula;?>">
            <input type="hidden" name="criterio" value="<? echo $criterio;?>">
            <input type="hidden" name="campoEvaluar" value="<? echo $campoEvaluar;?>">
            <textarea name="comentario" cols="40" rows="5" autofocus <?php if($_SESSION['nivel']=='alumno') { echo 'readonly'; } ?> ><?echo $evaluar->hayComentario($campoEvaluar);?></textarea>
            <br>
            <?php if(!($_SESSION['nivel']=='alumno')) {?>
            <input type="submit" value="Guardar" />
            <?php } ?>
        </form>

 </div>

</body>
</html>
