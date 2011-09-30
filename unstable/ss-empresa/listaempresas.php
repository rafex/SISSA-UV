<?php
include_once '../script/php/functions.php';
session_start();
conectar();
$query1="SELECT IdEmp,NombreEmp FROM empresa_ss_fca";
$result1=mysql_query($query1) or die(mysql_error());


?>
<? if($_SESSION['nivel']=='admin'){ ?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,carrera',document.buscar.patron.value+',<?echo $carrera;?>','../ss-evaluacion/buscar.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,carrera',document.buscar.patron.value+',<?echo $carrera;?>','buscar.php');">
<? } ?>
    <input type="text" name="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <input type="submit" value="Buscar"  />
</form>


<table id="listaempresas" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Nombre</th>
  </tr>
<? $n=1; while($rows = mysql_fetch_array($result1)){ ?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('IdEmp','<? echo $rows['IdEmp']; ?>','../ss-empresa/empresa.php');"><? echo utf8_encode($rows['NombreEmp']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('IdEmp','<? echo $rows['IdEmp']; ?>','../ss-empresa/empresa.php');"><? echo utf8_encode($rows['NombreEmp']); ?></a></td>
    <? } ?>

  </tr>
<? }?>
</table>

