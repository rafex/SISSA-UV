<?
include_once '../clases/evaluar.php';
session_start();
$matricula=$_POST['matricula'];
$nombre=$_POST['nombre'];
$criterio=$_POST['criterio'];
$valores=$_POST['formulario'];
$carrera=$_POST['carrera'];
$evaluar=new Evaluar($matricula,$criterio);

$evaluar->inicia();
$evaluar->guardarCalf($valores);

if($carrera=='lsca'){
    $carrera='Sistemas Computacionales Administrativos</strong>';
}elseif($carrera=='lc'){
    $carrera='Cantaduría';
}elseif($carrera=='la'){
    $carrera='Administración';
}elseif($carrera=='lg'){
    $carrera='Gestion de Negocios';
}
?>

<p>Matricula:<? echo $matricula; ?> Carrera: <?echo $carrera;?></p>

<p>Alumno:<strong><?echo $nombre; ?></strong></p>
<p>Tipo de evaluación: <?echo $criterio; ?></p>
<form id="evaluacion" name="evaluacion" method="post" action="javascript:evaluar('matricula,nombre,criterio','<? echo $matricula; ?>,<? echo $nombre; ?>,<? echo $criterio; ?>','ss-evaluacion/evaluacion.php');">

<? $i=0; for(;$i<$evaluar->numCampos();$i++) { ?>

  <label class="etiqueta"><? echo $evaluar->listaCampos($i); ?>
  <input class="camp" name="campo<? echo ($i+1); ?>" tabindex="<? echo ($i+1); ?>" size="5" type="text" value="<? if($evaluar->mostrarCalif(($i+1))!=-1) echo $evaluar->mostrarCalif(($i+1)); ?>">
    <? if($_SESSION['nivel']=='admin'){ ?>  
    <a href="#" onclick="window.open('../ss-evaluacion/comentario.php?criterio=<? echo $evaluar->evaluacion($i); ?>&matricula=<? echo $matricula; ?>&alumno=<?echo $nombre;?>','','width=450,height=250,left=300,top=300,scrollbars=no, menubar=no, location=no, resizable=no' )" ><img class="nota" src="/SISSA-UV/images/32px/nota3.png" /></a>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <a href="#" onclick="window.open('comentario.php?criterio=<? echo $evaluar->evaluacion($i); ?>&matricula=<? echo $matricula; ?>&alumno=<?echo $nombre;?>','','width=450,height=250,left=300,top=300,scrollbars=no, menubar=no, location=no, resizable=no' )" ><img class="nota" src="/SISSA-UV/images/32px/nota3.png" /></a>
    <? } ?>
  </label>

<? } ?>


    <input value="Guardar" tabindex="<? echo ($i+1); ?>" type="submit" />

</form>

