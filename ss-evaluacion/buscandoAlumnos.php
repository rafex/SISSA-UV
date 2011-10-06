<?php
include_once '../script/php/functions.php';
include_once '../clases/evaluar.php';
conectar();

$carrera=$_POST['carrera'];
$seccion=$_POST['seccion'];
$criterio=$_POST['criterio'];
$periodo=$_POST['periodo']; 
$buscar=$_POST['buscar'];
$buscar=espacios_blancos($buscar);
$buscar=strtoupper($buscar);
session_start();
conectar();
$result;
$patron = '/^[[:digit:]]+$/';


	if($buscar[0]=="S" && (preg_match($patron, $buscar[1]) || preg_match($patron, $buscar[2]) )  ){
	//if($buscar[0]=="S" && (is_numeric( $buscar[1]) || is_numeri($buscar[2]) )  ){
		
		if($seccion!='sin' && $carrera=='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE MatriculaAlu LIKE '%$buscar%' AND SeccionAlu='$seccion' AND periodoalu='$periodo' ;") or die(mysql_error());
		}elseif($carrera!='sin' && $seccion=='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND MatriculaAlu LIKE '%$buscar%' AND periodoalu='$periodo'  ;") or die(mysql_error());	
		}elseif($carrera!='sin' && $seccion!='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND MatriculaAlu LIKE '%$buscar%' AND SeccionAlu='$seccion' AND periodoalu='$periodo'  ;") or die(mysql_error());
		}elseif($carrera=='sin' && $seccion=='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE MatriculaAlu LIKE '%$buscar%' AND periodoalu='$periodo' ;") or die(mysql_error());
		}
	
	    
	}else{
		if($seccion!='sin' && $carrera=='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE NombreAlu LIKE '%$buscar%' AND SeccionAlu='$seccion' AND periodoalu='$periodo'  ;") or die(mysql_error());
		}elseif($carrera!='sin' && $seccion=='sin'){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND NombreAlu LIKE '%$buscar%' AND periodoalu='$periodo'  ;") or die(mysql_error());	
		}elseif($carrera!='sin' && $seccion!='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE CarreraAlu='$carrera' AND NombreAlu LIKE '%$buscar%' AND SeccionAlu='$seccion' AND periodoalu='$periodo'  ;") or die(mysql_error());
		}elseif($carrera=='sin' && $seccion=='sin' ){
			$result=mysql_query("SELECT MatriculaAlu,NombreAlu,CarreraAlu,CriterioAlu FROM alumno_ss_fca WHERE NombreAlu LIKE '%$buscar%' AND periodoalu='$periodo' ;") or die(mysql_error());
		}
		
	    
	}




if($carrera=='lsca'){
    echo '<p><strong>Sistemas Computacionales Administrativos</strong></p>';
}elseif($carrera=='lc'){
    echo '<p><strong>Cantaduría</strong></p>';
}elseif($carrera=='la'){
    echo '<p><strong>Administración</strong></p>';
}elseif($carrera=='lg'){
    echo '<p><strong>Gestion de Negocios</strong></p>';
}

?>
<p>Usted busco: <strong><?echo $buscar;?></strong></p>
<p>Con los criterios: <?if($carrera=='sin'){echo "todas las carreras,";}else{ echo " $carrera,";} if($seccion=='sin'){echo " todas las secciones,";}else{echo " $seccion,";}echo " $periodo,"; echo " $criterio."; ?> </p>

<? if($_SESSION['nivel']=='admin'){ ?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,carrera,seccion,criterio,periodo',document.getElementById('patron').value+','+document.getElementById('carrera').value+','+document.getElementById('seccion').value+','+document.getElementById('criterio').value+','+document.getElementById('periodo').value,'../ss-evaluacion/buscandoAlumnos.php');">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form id="buscar" name="buscar" method="post" action="javascript:crearContenidosArreglo('buscar,carrera,seccion,criterio,periodo',document.getElementById('patron').value+','+document.getElementById('carrera').value+','+document.getElementById('seccion').value+','+document.getElementById('criterio').value+','+document.getElementById('periodo').value,'buscandoAlumnos.php');">
<? } ?>
    <input type="text" name="patron" id="patron" tabindex="1" size="30" placeholder="Que desea buscar" />
    <select id="carrera" name="carrera" tabindex="2">
			<option value="sin" >Carrera</option>		
			<option value="la" >Administración</option>
			<option value="lc" >Contabilidad</option>
			<option value="lsca" >Sistemas</option>
			<option value="lg" >Gestión</option>
		
	</select> 
	<select id="seccion" name="seccion" tabindex="3">
			<option value="sin" >Seccion</option>		
			<option value="700" >700</option>
			<option value="701" >701</option>
			<option value="702" >702</option>
			<option value="703" >703</option>
			<option value="704" >704</option>
			<option value="705" >705</option>
			<option value="706" >706</option>
			<option value="707" >707</option>
			<option value="708" >708</option>
			<option value="709" >709</option>
			<option value="710" >710</option>
		
	</select> 
	<?

$sql4="SELECT DISTINCT `periodo` FROM `configuraciones_ss_fca`";
$result4=mysql_query($sql4) or die(mysql_error());
?>
		
		
	<select id="periodo" name="periodo" tabindex="4">
		<?  while($fila=mysql_fetch_array($result4)){ ?>
			<option value="<? echo $fila['periodo'];?>" ><? echo $fila['periodo'];?></option>
    	<? } ?>
		
	</select>  
		
	<select name="criterio" id="criterio">
		<? 
			$sql3="SELECT DISTINCT `nombreCriterio` as criterio FROM `criterios_ss_fca` ORDER BY `nombreCriterio`";
			$result3=mysql_query($sql3) or die(mysql_error());
			
			while($fila2=mysql_fetch_array ($result3)){ ?>
	
		<option value="<?echo $fila2['criterio'];?>"><?echo $fila2['criterio'];?></option>
	
		<?	}	?>
	</select>		
    <input type="submit" value="Buscar"  />
</form>

<!--- Inicia tabla--->


<table id="listaalu" width="100%" border="0" cellspacing="0">
  <tr>
    <th  width="15" height="35" scope="col">#</th>
    <th  class="ancho1">Nombre <? echo $_SESSION["usuario"];?></th>
<?
$result2=mysql_query("SELECT evaluar FROM criterios_ss_fca WHERE nombreCriterio='$criterio' ; ") or die(mysql_error());
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
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>,<? echo $rows['CarreraAlu'];?>,<?echo $periodo;?>','../ss-evaluacion/evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
    <?}elseif($_SESSION['nivel']=='evaluador'){?>
    <td><a href="#" onClick="javascript:crearContenidosArreglo('matricula,nombre,criterio,carrera,periodoA','<? echo utf8_encode($rows['MatriculaAlu']); ?>,<? echo utf8_encode($rows['NombreAlu']); ?>,<? echo utf8_encode($rows['CriterioAlu']); ?>,<? echo $rows['CarreraAlu'];?>,<?echo $periodo;?>','evaluacion.php');"><? echo utf8_encode($rows['NombreAlu']); ?></a></td>
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

