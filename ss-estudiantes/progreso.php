<?php
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
session_start();
conectar();

$matricula=$_SESSION['matricula'];
$carrera=$_POST['carrera'];
$periodo=$_SESSION['periodo'];

$query="SELECT criterioalu,nombrealu FROM alumno_ss_fca WHERE MatriculaAlu='$matricula' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());
$row2=mysql_fetch_array($result);

$criterio=$row2[0];
$nombre=$row2[1];
$evaluar=new Evaluar($matricula,$criterio);

?>

<p>Matricula:<strong><? echo strtoupper($matricula); ?></strong></p>
<? $i=0; for(;$i<$evaluar->numCampos();$i++) { ?>

<label class="etiqueta"><? echo $evaluar->listaCampos($i)." (max: ".$evaluar->listaValoresCampos($i)."pts.)"; ?>
<input class="camp" name="campo<? echo ($i+1); ?>" tabindex="<? echo ($i+1); ?>" min="0" max="<? echo $evaluar->listaValoresCampos($i); ?>" size="5" type="number" <? if($evaluar->mostrarCalif(($i+1),$periodo)!=-1){ $total+=$evaluar->mostrarCalif(($i+1),$periodo); echo 'value="'.$evaluar->mostrarCalif(($i+1),$periodo).'"';  } ?> readonly />

<a href="#" onclick="window.open('../ss-evaluacion/comentario.php?criterio=<? echo $criterio; ?>&campoEvaluar=<? echo $evaluar->evaluacion($i); ?>&matricula=<? echo $matricula; ?>&alumno=<?echo $nombre;?>&periodo=<?echo $periodo?>','','width=450,height=250,left=300,top=300,scrollbars=no, menubar=no, location=no, resizable=no' )" ><img class="nota" src="../images/32px/nota3.png" title="Aquí podrás leer el motivo de tu calificación de: <? echo $evaluar->evaluacion($i); ?>" /></a>
</label>

<? } ?>
<label class="etiqueta">Total
<input class="camp" name="campo<? echo ($i+1); ?>" tabindex="<? echo ($i+1); ?>" size="5" type="number" value="<? echo $total; ?>">
</label>

