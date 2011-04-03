<?php
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
$carrera=$_POST['carrera'];
$buscar=$_POST['buscar'];
$buscar=espacios_blancos($buscar);
$buscar=strtoupper($buscar);
session_start();
conectar();
$result;

if($buscar[0]=="S"){

    $result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND MatriculaAlu LIKE '%$buscar%' ;") or die(mysql_error());
}else{
    $result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND NombreAlu LIKE '%$buscar%' ;") or die(mysql_error());
}

$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='MEIFv1' ; ") or die(mysql_error());

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
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,carrera',document.buscar.patron.value+',<?echo $carrera;?>','buscar.php');">
    <input type="text" name="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <input type="submit" value="Buscar"  />
</form>
<table id="listaalu" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Nombre <? echo $_SESSION["usuario"];?></th>
<?
$j=0;
while($rows2=mysql_fetch_array($result2)){ $j++  ?>
    <th  class="ancho1"><? echo utf8_encode($rows2['evaluar']); ?></th>
<? } ?>
  </tr>
<? $n=1; while($rows = mysql_fetch_array($result)){  

$evaluar=new Evaluar(utf8_encode($rows['MatriculaAlu']),utf8_encode($rows['CriterioAlu']));
?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>','../ss-evaluacion/evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <? } ?>
<? for($i=0;$i<$j;$i++){ ?>
    <td><? $calfif=$evaluar->mostrarCalif($i+1); if($calfif==-1) { echo "-"; }else{ echo $calfif; }?></td>
<?}?>
  </tr>
<? }?>
</table>

