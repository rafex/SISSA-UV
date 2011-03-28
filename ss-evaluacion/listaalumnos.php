<?php
$carrera=$_POST['carrera'];
include_once '../script/php/functions.php';

conectar();
$result=mysql_query("SELECT NombreAlu,MatriculaAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' ORDER BY NombreAlu  ") or die(mysql_error());
$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca") or die(mysql_error());

?>

<table width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Nombre <? echo $_SESSION["usuario"];?></th>
<?
$j=0;
while($rows2=mysql_fetch_array($result2)){ $j++  ?>
    <th  class="ancho1"><? echo utf8_encode($rows2['evaluar']); ?></th>
<? } ?>
  </tr>
<? $n=1; while($rows = mysql_fetch_array($result)){  ?>
  <tr>

    <td><? echo $n++; ?></td>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>','ss-evaluacion/evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
<? for($i=0;$i<$j;$i++){ ?>
    <td></td>
<?}?>
  </tr>
<? }?>
</table>

