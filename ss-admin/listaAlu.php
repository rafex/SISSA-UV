<?php
$carrera=$_POST['carrera'];
$periodo=$_POST['periodo'];
$criterioS=$_POST['criterioS'];
$letra=$_POST['letra'];
$numero=$_POST['numero'];
$opcionElegidaN=$_POST['opEN'];
$opcionElegidaL=$_POST['opEL'];

include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
session_start();
conectar();

$total=$_POST['totalF'];
if(!empty($letra)){
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' AND NombreAlu LIKE '$letra%' ORDER BY NombreAlu   ") or die(mysql_error());
	$total=mysql_num_rows($result);
}elseif(!empty($numero)){
	$sql="SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu LIMIT $numero,10";
	$result=mysql_query($sql) or die(mysql_error());
	
}elseif($_POST['allR']){
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu ") or die(mysql_error());
	$total=mysql_num_rows($result);
}else{
	
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu ") or die(mysql_error());	
	$total=mysql_num_rows($result);
	
}





$texto;
if($carrera=='lsca'){
    $texto= "<p class='verde'><strong>Sistemas Computacionales Administrativos</strong> - $periodo ($total)</p>";
}elseif($carrera=='lc'){
    $texto= "<p class='verde'><strong>Contaduría</strong> - $periodo ($total)</p>";
}elseif($carrera=='la'){
    $texto= "<p class='verde'><strong>Administración</strong> - $periodo ($total)</p>";
}elseif($carrera=='lg'){
    $texto= "<p class='verde'><strong>Gestion de Negocios</strong> - $periodo ($total)</p>";
}

echo "$texto";
?>
<? if($_SESSION['nivel']=='admin'){ ?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodo,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','buscarAlumnoLista.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodo,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','buscarAlumnoLista.php');">
<? } ?>
    <input type="text" name="patron" id="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <input type="submit" value="Buscar"  />
</form>
<br/>

<? 	
	if($_SESSION['nivel']=='admin'){ 
		@ require_once 'listaAluLetra.php';
	}elseif($_SESSION['nivel']=='evaluador'){
		@ require_once 'listaporLetra.php';
 	}
 	
 	
?>

<table id="listaalu" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Matrícula</th>
    <th  class="ancho1">Nombre</th>
    
    

  </tr>
<? $n=1; while($rows = mysql_fetch_array($result)){  


?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','verAlumno.php');"><? echo utf8_encode($rows['MatriculaAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['MatriculaAlu']); ?></a></td>
    <? } ?>
    
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','verAlumno.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <? } ?>

   
  </tr>
<? }
desconectar();
?>
</table>

