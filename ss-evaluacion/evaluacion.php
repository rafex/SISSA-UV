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
if($carrera=='lsca'){
    $carrera='Sistemas Computacionales Administrativos</strong>';
}elseif($carrera=='lc'){
    $carrera='Cantaduría';
}elseif($carrera=='la'){
    $carrera='Administración';
}elseif($carrera=='lg'){
    $carrera='Gestión de Negocios';
}

$evaluar->guardarCalf($valores);
$total=0;// el total de la calificacion
?>

<p>Matricula:<strong><? echo $matricula; ?></strong> Carrera: <?echo $carrera;?></p>

<p>Alumno:<strong><?echo $nombre; ?></strong></p>
<p>Tipo de evaluación: <?echo $criterio; ?></p>
    <? if($_SESSION['nivel']=='admin'){ ?>  
<form id="evaluacion" name="evaluacion" method="post" action="javascript:evaluar('matricula,nombre,criterio,carrera','<? echo $matricula; ?>,<? echo $nombre; ?>,<? echo $criterio; ?>,<?echo $carrera;?>','../ss-evaluacion/evaluacion.php');">
    <? }elseif($_SESSION['nivel']=='evaluador'){?>
<form id="evaluacion" name="evaluacion" method="post" action="javascript:evaluar('matricula,nombre,criterio,carrera','<? echo $matricula; ?>,<? echo $nombre; ?>,<? echo $criterio; ?>,<?echo $carrera;?>','evaluacion.php');">	
    <? } ?>
		
<? $i=0; for(;$i<$evaluar->numCampos();$i++) { ?>



  <label class="etiqueta"><? echo $evaluar->listaCampos($i)." (max: ".$evaluar->listaValoresCampos($i)."pts.)"; ?>
  <input class="camp" name="campo<? echo ($i+1); ?>" tabindex="<? echo ($i+1); ?>" size="5" type="number" value="<? if($evaluar->mostrarCalif(($i+1))!=-1){ $total+=$evaluar->mostrarCalif(($i+1)); echo $evaluar->mostrarCalif(($i+1)); } ?>" <? if($_SESSION['nivel']=='evaluador'){ echo "readonly"; }  ?> />
    <? if($_SESSION['nivel']=='admin'){ ?>  
    <a href="#" onclick="window.open('../ss-evaluacion/comentario.php?criterio=<? echo $criterio; ?>&campoEvaluar=<? echo $evaluar->evaluacion($i); ?>&matricula=<? echo $matricula; ?>&alumno=<?echo $nombre;?>','','width=450,height=250,left=300,top=300,scrollbars=no, menubar=no, location=no, resizable=no' )" ><img class="nota" src="/SISSA-UV/images/32px/nota3.png" /></a>

    <? }elseif($_SESSION['nivel']=='evaluador'){?>
    <a href="#" onclick="window.open('comentario.php?criterio=<? echo $criterio; ?>&campoEvaluar=<? echo $evaluar->evaluacion($i); ?>&matricula=<? echo $matricula; ?>&alumno=<?echo $nombre;?>','','width=450,height=250,left=300,top=300,scrollbars=no, menubar=no, location=no, resizable=no' )" ><img class="nota" src="/SISSA-UV/images/32px/nota3.png" /></a>
    <? } ?>
  </label>

<? } ?>
    <label class="etiqueta">Total
    <input class="camp" name="campo<? echo ($i+1); ?>" tabindex="<? echo ($i+1); ?>" size="5" type="number" value="<? echo $total; ?>">
    </label>
    <input value="Guardar" tabindex="<? echo ($i+2); ?>" type="submit" />

</form>

