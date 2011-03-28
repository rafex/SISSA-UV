<?php
$carrera=$_POST['carrera'];
//include_once '../clases/conectar.php';
$db= new Conexion();

$result=mysql_query("SELECT NombreAlu,MatriculaAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera'") or die(mysql_error());
$result2=mysql_query("SELECT nombreCriterio FROM criterios_ss_fca");
?>

<table width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col"></th>
    <th  class="ancho1">Nombre</th>
    <th  class="ancho2">Platica</th>
    <th  class="ancho2">Carta Aceptaci&oacute;n Presentaci&oacute;n</th>
    <th  scope="col">Solicitud de Registro </th>
    <th  scope="col">Programa de Trabajo </th>
    <th  scope="col">Acuerdo de Colaboraci&oacute;n </th>
    <th  scope="col">Info 1&deg; Bimestre </th>
    <th  scope="col">Info 2 &deg; Bimestre</th>
    <th  scope="col">Info 3 &deg; Bimestre</th>
    <th scope="col">Informe Final </th>
    <th  scope="col">Evaluaci&oacute;n del Jefe </th>

  </tr>
<? $i=1; while($rows = mysql_fetch_array($result)){ ?>
  <tr>

    <td><? echo $i++; ?></td>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>','ss-evaluacion/evaluacion.php');"><? $h=new Hi(); echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
<? }?>
</table>

