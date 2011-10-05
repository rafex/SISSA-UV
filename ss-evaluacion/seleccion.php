<? include_once '../script/php/functions.php';
session_start();
$carrera=$_POST['carrera'];
conectar();
$sql="SELECT DISTINCT `periodo` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die(mysql_error());
//$sql2="SELECT `nombreCriterio` as criterio FROM `criterios_ss_fca` ORDER BY `nombreCriterio`";
$sql2="SELECT DISTINCT `nombreCriterio` as criterio FROM `criterios_ss_fca` ORDER BY `nombreCriterio`";
$result2=mysql_query($sql2) or die(mysql_error());

if($carrera=='lsca'){
    echo '<p class="verde"><strong>Sistemas Computacionales Administrativos</strong></p>';
}elseif($carrera=='lc'){
    echo '<p class="verde"><strong>Contaduría</strong></p>';
}elseif($carrera=='la'){
    echo '<p class="verde"><strong>Administración</strong></p>';
}elseif($carrera=='lg'){
    echo '<p class="verde"><strong>Gestion de Negocios</strong></p>';
}

?>
<? if($_SESSION['nivel']=='admin'){ ?>
<form name="preevaluacion" method="post" action="javascript:crearContenidosArreglo('carrera,periodo,criterioS','<? echo $carrera;?>,'+document.preevaluacion.periodo.value+','+document.preevaluacion.criterioS.value,'../ss-evaluacion/listaalumnos.php')">
<?}elseif($_SESSION['nivel']=='evaluador'){?>
<form name="preevaluacion" method="post" action="javascript:crearContenidosArreglo('carrera,periodo,criterioS','<? echo $carrera;?>,'+document.preevaluacion.periodo.value+','+document.preevaluacion.criterioS.value,'listaalumnos.php')">
<? } ?>



<input type="hidden" name="carrera" value="<? echo $carrera;?>">
<select name="periodo">
    <? while($fila=mysql_fetch_array($result)){ ?>
        <option value="<?echo $fila['periodo'];?>"><?echo $fila['periodo'];?></option>
    <? } ?>
</select>
<br>
<select name="criterioS">
    <? /*$anterior; while($fila2=mysql_fetch_array ($result2)){

        if($fila2['criterio']!=$anterior){?>
            <option value="<?echo $fila2['criterio'];?>"><?echo $fila2['criterio'];?></option>

        <?  
			$anterior=$fila2['criterio'];
        }// fin 
		$num++;
    } */// fin while?>
	<? while($fila2=mysql_fetch_array ($result2)){ ?>
	
	<option value="<?echo $fila2['criterio'];?>"><?echo $fila2['criterio'];?></option>
	
	<?	}	
		
	?>
</select>
<br>
<input type="submit" value="Seleccionar">
</form>
