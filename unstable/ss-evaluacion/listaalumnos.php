<?php
$carrera=$_POST['carrera'];
$periodo=$_POST['periodo'];
$criterioS=$_POST['criterioS'];
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
session_start();
conectar();
$result=mysql_query("SELECT MatriculaAlu,NombreAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu  ") or die(mysql_error());
$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='$criterioS' ; ") or die(mysql_error());

if($carrera=='lsca'){
    echo '<p><strong>Sistemas Computacionales Administrativos</strong></p>';
}elseif($carrera=='lc'){
    echo '<p><strong>Cantaduría</strong></p>';
}elseif($carrera=='la'){
    echo '<p><strong>Administración</strong></p>';
}elseif($carrera=='lg'){
    echo '<p><strong>Gestion de Negocios</strong></p>';
}

?>

<? if($_SESSION['nivel']=='admin'){ ?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodoA,carrera',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>','../ss-evaluacion/buscar.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodoA,carrera',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>','buscar.php');">
<? } ?>
    <input type="text" name="patron" id="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <input type="submit" value="Buscar"  />
</form>

<table id="listaalu" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Nombre</th>
<?
$j=0;
while($rows2=mysql_fetch_array($result2)){ $j++  ?>
    <th  class="ancho1"><? echo utf8_encode($rows2['evaluar']); ?></th>
<? } ?>
	<th  class="ancho1">Total</th>
	<? if($_SESSION['nivel']=='admin'){ ?>
	<th  class="ancho1"></th>
	<? } ?>
  </tr>
<? $n=1; while($rows = mysql_fetch_array($result)){  

$evaluar=new Evaluar(utf8_encode($rows['MatriculaAlu']),$criterioS);
?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" title="<? echo utf8_encode($rows['MatriculaAlu']); ?>" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','../ss-evaluacion/evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" title="<? echo utf8_encode($rows['MatriculaAlu']); ?>" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <? } ?>
<? $total=0; for($i=0;$i<$j;$i++){ ?>
    <td title="<? //echo $evaluar->hayComentario(); ?>" ><? $calfif=$evaluar->mostrarCalif($i+1,$periodo); if($calfif==-1) { echo "-"; }else{ $total+=$calfif; echo $calfif; }?></td>
<? }?>
    <td><strong><? echo $total;?></strong></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onclick="javascript:eliminarAlumno('eliminarAlumno.php','matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','Alumno con la matricula:<? echo utf8_encode($rows['MatriculaAlu']); ?> fue eliminado.','../ss-evaluacion/seleccion.php','<?echo $carrera;?>','<?echo $periodo;?>','<?echo $criterioS;?>');"><img src="../images/cross.png" /></a></td>
    <? } ?>
  </tr>
<? }?>
</table>
