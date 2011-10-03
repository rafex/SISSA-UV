<?php
$carrera=$_POST['carrera'];
$periodo=$_POST['periodo'];
$criterioS=$_POST['criterioS'];
$letra=$_POST['letra'];
$numero=$_POST['numero'];
$opcionElegidaN=$_POST['opEN'];
$opcionElegidaL=$_POST['opEL'];

include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
session_start();
conectar();

$nletra;
$total=$_POST['totalF'];
if(!empty($letra)){
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' AND NombreAlu LIKE '$letra%' ORDER BY NombreAlu   ") or die(mysql_error());
	$nletra=mysql_num_rows($result);
}elseif(!empty($numero)){
	$sql="SELECT MatriculaAlu,NombreAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu LIMIT $numero,10";
	$result=mysql_query($sql) or die(mysql_error());
	
}elseif($_POST['allR']){
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu ") or die(mysql_error());
	$total=mysql_num_rows($result);
}else{
	
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu ") or die(mysql_error());	
	$total=mysql_num_rows($result);
	$result=mysql_query("SELECT MatriculaAlu,NombreAlu,SeccionAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND PeriodoAlu='$periodo' AND CriterioAlu='$criterioS' ORDER BY NombreAlu LIMIT 0,10") or die(mysql_error());
}

$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='$criterioS' ; ") or die(mysql_error());



$texto; $cantidad;
if(empty($nletra)){
	$cantidad=$total;
}else{
	$cantidad=$nletra;
}
if($carrera=='lsca'){
	
    $texto= "<p class='verde'><strong>Sistemas Computacionales Administrativos</strong> - $periodo ($cantidad)</p>";
}elseif($carrera=='lc'){
    $texto= "<p class='verde'><strong>Contaduría</strong> - $periodo ($cantidad)</p>";
}elseif($carrera=='la'){
    $texto= "<p class='verde'><strong>Administración</strong> - $periodo ($cantidad)</p>";
}elseif($carrera=='lg'){
    $texto= "<p class='verde'><strong>Gestion de Negocios</strong> - $periodo ($cantidad)</p>";
}

echo "$texto";
?>

<? if($_SESSION['nivel']=='admin'){ ?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodoA,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','../ss-evaluacion/buscar.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodoA,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','buscar.php');">
<? } ?>
    <input type="text" name="patron" id="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <input type="submit" value="Buscar"  />
</form>
<br/>

<? 	
	if($_SESSION['nivel']=='admin'){ 
		@ require_once '../ss-evaluacion/listaporLetra.php';
	}elseif($_SESSION['nivel']=='evaluador'){
		@ require_once 'listaporLetra.php';
 	}
 	
 	$divisio1=$total/10;
	$division2=$total%10;
	$tope=intval($divisio1);
	if($division2!=0){
		$tope+=1;
	}
	$rangos=0;
	echo "<p style='text-align:center;' >";
	
	
	for($in=1;$in<=$tope;$in++){
		$selecFormat="";
		$guion="";		
		if($opcionElegidaN==$in){
			$selecFormat="style=\" color: #00ab4f; \"";
			
		}
		
		if($in!=$tope){
			$guion="-";
		}
		
		if($_SESSION['nivel']=='admin'){ 
			echo "<a href='#' class='azul' $selecFormat onclick=\"javascript:crearContenidosArreglo('carrera,periodo,criterioS,numero,totalF,opEN','$carrera,$periodo,$criterioS,$rangos,$total,$in','../ss-evaluacion/listaalumnos.php');\" >".$in."</a> $guion ";
		}elseif($_SESSION['nivel']=='evaluador'){
			echo "<a href='#' class='azul' $selecFormat onclick=\"javascript:crearContenidosArreglo('carrera,periodo,criterioS,numero,totalF,opEN','$carrera,$periodo,$criterioS,$rangos,$total,$in','listaalumnos.php');\" >".$in."</a> $guion ";
 		}
 	
		 
		$rangos+=10;
	}
	echo '</p>'; 
?>

<table id="listaalu" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Nombre</th>
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

$evaluar=new Evaluar(utf8_encode($rows['MatriculaAlu']),$criterioS);
?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" title="<? echo utf8_encode($rows['MatriculaAlu']); ?>" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','../ss-evaluacion/evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" title="<? echo utf8_encode($rows['MatriculaAlu']); ?>" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <? } ?>
<? $total=0; for($i=0;$i<$j;$i++){ ?>
    <td class="ancho1" title="<? //echo $evaluar->hayComentario(); ?>" ><? $calfif=$evaluar->mostrarCalif($i+1,$periodo); if($calfif==-1) { echo "-"; }else{ $total+=$calfif; echo $calfif; }?></td>
<? }?>
    <td><strong><? echo $total;?></strong></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td><a href="#" onclick="javascript:eliminarAlumno('eliminarAlumno.php','matricula,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<?echo $periodo;?>','Alumno con la matricula:<? echo utf8_encode($rows['MatriculaAlu']); ?> fue eliminado.','../ss-evaluacion/seleccion.php','<?echo $carrera;?>','<?echo $periodo;?>','<?echo $criterioS;?>');"><img src="../images/cross.png" /></a></td>
    <? } ?>
  </tr>
<? }
desconectar();
?>
</table>

