<?
include_once '../clases/evaluar.php';

$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$criterio=$_POST['criterio'];
$valores=$_POST['formulario'];
$evaluar=new Evaluar($matricula,$criterio);

$evaluar->inicia();
$evaluar->guardarCalf($valores);

?>

<p>Matricula:<? echo $matricula; ?></p>

<p>Alumno:<strong><?echo $nombre; ?></strong></p>
<p>Tipo de evaluación: <?echo $criterio; ?></p>
<form id="evaluacion" name="evaluacion" method="post" action="javascript:evaluar('matricula,nombre,criterio','<? echo $matricula; ?>,<? echo $nombre; ?>,<? echo $criterio; ?>','ss-evaluacion/evaluacion.php');">

<? $i=0; for(;$i<$evaluar->numCampos();$i++) { ?>

  <label class="etiqueta"><? echo $evaluar->listaCampos($i); ?>
  <input class="camp" name="campo<? echo ($i+1); ?>" tabindex="<? echo ($i+1); ?>" size="5" type="text" value="<? if($evaluar->mostrarCalif(($i+1))!=-1) echo $evaluar->mostrarCalif(($i+1)); ?>">
  <a href="#" onclick="window.open('ss-evaluacion/comentario.php?criterio=<? echo $evaluar->evaluacion($i); ?>&matricula=<? echo $matricula; ?>&alumno=<?echo $nombre;?>','','width=450,height=250,left=300,top=300,scrollbars=no, menubar=no, location=no, resizable=no' )" ><img class="nota" src="images/32px/nota3.png" /></a>
  </label>
<? } ?>


    <input value="Guardar" tabindex="<? echo ($i+1); ?>" type="submit" />

</form>

