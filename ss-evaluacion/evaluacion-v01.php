<?
include_once '../script/php/functions.php';
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
conectar();
$result=mysql_query("SELECT * FROM criterios_ss_fca") or die(mysql_error());
$max=mysql_fetch_array(mysql_query("SELECT count(nombreCriterio) as total FROM criterios_ss_fca;"));
$tabla=mysql_query("SELECT * FROM evaluacion_MEIFv1") or die(mysql_error());
$campo=array();

for($r=1;$r<=$max['total'];$r++){
    array_push($campo,mysql_field_name($tabla, $r));
  
}
//$campo=array_reverse($campo);


echo $campo[0]."*<br/>";
echo $campo[1]."*<br/>";
echo $campo[2]."*<br/>";
echo $campo[3]."*<br/>";
echo $campo[4]."*<br/>";
echo $campo[5]."*<br/>";
echo $campo[6]."*<br/>";
echo $campo[7]."*<br/>";
echo $campo[8]."*<br/>";
echo $campo[9]."*<br/>";




$serie_campos="";
?>

<p>Matricula:<? echo $matricula; ?></p>

<p>Alumno:<strong><?echo $nombre; ?></strong></p>
<form id="evaluacion" name="evaluacion" method="post" action="javascript:crearContenidosArreglo('matricula,nombre,<? if($j==11)  echo $serie_campos; ?>','<? echo $matricula; ?>,<? echo $nombre; ?>,','ss-evaluacion/evaluacion.php');">
<input type="hidden" value="<? echo $matricula; ?>" name="matricula"/>
<input type="hidden" value="<? echo $nombre; ?>" name="nombre"/>
  <label>Platica (max. 2%)
  <input class="camp" name="platica" tabindex="2" size="5" type="text">
  </label>
  <label>Carta de Presentación/Aceptación (max. 1%)
  <input class="camp" name="cartadepresentacion/aceptacion" tabindex="3" size="5" type="text">

  </label>
  <label>Solicitud de Registro (max. 2%)
  <input class="camp" name="solicitudderegistro" tabindex="4" size="5" type="text">
  </label>
  <label>Programa de Trabajo (max. 5%)
  <input class="camp" name="programadetrabajo" tabindex="5" size="5" type="text">
  </label>
  <label>Acuerdo de Colaboración (max. 5%)
  <input class="camp" name="acuerdodecolaboracion" tabindex="6" size="5" type="text">
  </label>

  <label>Informe Bimestral 1 (max. 10%)
  <input class="camp" name="informebimestral1" tabindex="7" size="5" type="text">
  </label>
  <label>Informe Bimestral 2 (max. 10%)
  <input class="camp" name="informebimestral2" tabindex="8" size="5" type="text">
  </label>
  <label>Informe Bimestral 3 (max. 10%)
  <input class="camp" name="informebimestral3" tabindex="9" size="5" type="text">
  </label>
  <label>Informe Final (max. 5%)
  <input class="camp" name="informefinal" tabindex="10" size="5" type="text">

  </label>
  <label>Evaluación del Jefe (max. 50%)
  <input class="camp" name="evaluaciondeljefe" tabindex="11" size="5" type="text">
  </label>

    <input name="guardar" value="Guardar" tabindex="11" type="submit">

</form>

