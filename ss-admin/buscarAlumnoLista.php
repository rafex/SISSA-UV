<?php
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
$carrera=$_POST['carrera'];
$seccion=$_POST['seccion'];
$buscar=$_POST['buscar'];
$buscar=espacios_blancos($buscar);
$buscar=strtoupper($buscar);
$periodo=$_POST['periodo'];
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
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodo,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','buscarAlumnoLista.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,periodo,carrera,criterioS',document.getElementById('patron').value+',<?echo $periodo;?>,<?echo $carrera;?>,<?echo $criterioS;?>','buscar.php');">
<? } ?>
    <input type="text" name="patron" id="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <input type="submit" value="Buscar"  />
</form>
<br/>

<? 	
	if($_SESSION['nivel']=='admin'){ 
		@ require_once 'listaAluLetra.php';
	}elseif($_SESSION['nivel']=='evaluador'){
		@ require_once 'listaAluLetra.php';
 	}
 	
 	
?>

<table id="listaalu" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Matrícula</th>
    <th  class="ancho1">Nombre</th>
    
    

  </tr>
<? $n=1; while($rows = mysql_fetch_array($result)){  


?>
  <tr>

    <td><? echo $n++; ?></td>
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','verAlumno.php');"><? echo utf8_encode($rows['MatriculaAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['MatriculaAlu']); ?></a></td>
    <? } ?>
    
    <? if($_SESSION['nivel']=='admin'){ ?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','verAlumno.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td class="ancho1"><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodo','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo $criterioS; ?>,<? echo $carrera;?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <? } ?>

   
  </tr>
<? }
desconectar();
?>
</table>
