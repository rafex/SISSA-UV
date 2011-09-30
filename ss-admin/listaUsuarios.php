<?php
include_once '../script/php/functions.php';
session_start();
conectar();
$query1="SELECT * FROM usuarios_ss_fca";
$result1=mysql_query($query1) or die(mysql_error());


?>
<input type="button" onclick="javascript:cargarContenido('crearUsuario.php');" value="Crear Usuario" />
<table id="listausuarios" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Usuario</th>
    <th  class="ancho1">Nombre</th>
  </tr>
<? $n=1;  while($rows = mysql_fetch_array($result1)){ ?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('usr','<? echo $rows['usuario']; ?>','usuario.php');"><? echo utf8_encode($rows['usuario']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('usr','<? echo $rows['usuario']; ?>','usuario.php');"><? echo utf8_encode($rows['usuario']); ?></a></td>
    <? } ?>
	<td><?echo $rows['nombre'];?></td>

  </tr>
<? }?>
</table>

