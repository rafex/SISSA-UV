<?php
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
$carrera=$_POST['carrera'];
$seccion=$_POST['seccion'];
$buscar=$_POST['buscar'];
$buscar=espacios_blancos($buscar);
$buscar=strtoupper($buscar);
$periodo=$_POST['periodoA'];
$criterioS=$_POST['criterioS'];

session_start();
conectar();
$result;

$patron = '/^[[:digit:]]+$/';
$total;

	//if($buscar[0]=="S" ){
	if($buscar[0]=="S" && (preg_match($patron, $buscar[1]) || preg_match($patron, $buscar[2]) )  ){
			
		if (empty($periodo)) {
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND MatriculaAlu LIKE '%$buscar%' ;") or die(mysql_error());	
			$total=mysql_num_rows($result);
		} else {
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND MatriculaAlu LIKE '%$buscar%' AND PeriodoAlu='$periodo' ;") or die(mysql_error());	
			$total=mysql_num_rows($result);
		}	
	    
	}else{
		
		if (empty($periodo)) {
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND NombreAlu LIKE '%$buscar%'  ;") or die(mysql_error());	
			$total=mysql_num_rows($result);
		} else {
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND NombreAlu LIKE '%$buscar%' AND PeriodoAlu='$periodo' ;") or die(mysql_error());	
			$total=mysql_num_rows($result);
		}
	    
	}

$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='$criterioS' ; ") or die(mysql_error());

$texto;
if($carrera=='lsca'){
    $texto= "<p class='verde'><strong>Sistemas Computacionales Administrativos</strong> - $periodo ($total)</p>";
}elseif($carrera=='lc'){
    $texto= "<p class='verde'><strong>Contaduría</strong> - $periodo ($total)</p>";
}elseif($carrera=='la'){
    $texto= "<p class='verde'><strong>Administración</strong> - $periodo ($total)</p>";
}elseif($carrera=='lg'){
    $texto= "<p class='verde'><strong>Gestion de Negocios</strong> - $periodo ($total)</p>";
}

echo "$texto";

?>

<p>Usted busco: <strong><?echo $buscar;?></strong></p>

<? if($_SESSION['nivel']=='admin'){ ?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodoA,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','../ss-evaluacion/buscar.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodoA,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','buscar.php');">
<? } ?>
    <input type="text" name="patron" id="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
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
	<th  class="ancho1">Total</th>
	<? if($_SESSION['nivel']=='admin'){ ?>
	<th  class="ancho1"></th>
	<? } ?>
  </tr>
<? $n=1; while($rows = mysql_fetch_array($result)){  

$evaluar=new Evaluar(utf8_encode($rows['MatriculaAlu']),utf8_encode($rows['CriterioAlu']));
?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>,<? echo $carrera;?>,<?echo $periodo;?>','../ss-evaluacion/evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>,<? echo $carrera;?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <? } ?>
<? $total=0; for($i=0;$i<$j;$i++){ ?>
    <td title="<? //echo $evaluar->hayComentario(); ?>" ><? $calfif=$evaluar->mostrarCalif($i+1,$periodo); if($calfif==-1) { echo "-"; }else{ $total+=$calfif; echo $calfif; }?></td>
<? }?>
    <td><strong><? echo $total;?></strong></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onclick="javascript:eliminarAlumno('eliminarAlumno.php','matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','Alumno con la matricula:<? echo utf8_encode($rows['MatriculaAlu']); ?> fue eliminado.','../ss-evaluacion/seleccion.php','<?echo $carrera;?>','<?echo $periodo;?>','<?echo $criterioS;?>');"><img src="../images/cross.png" /></a></td>
    <? } ?>
  </tr>
<? }?>
</table>
<? desconectar(); ?>
