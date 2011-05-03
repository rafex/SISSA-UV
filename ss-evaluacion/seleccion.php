<? include_once '../script/php/functions.php';
conectar();
$sql="SELECT `perido` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die();
$sql2="SELECT `nombreCriterio` as criterio FROM `criterios_ss_fca` ORDER BY `nombreCriterio`";
$result2=mysql_query($sql2) or die();
?>
<form name="pre-evaluacion">
<select name="perido">
    <? while($fila=mysql_fetch_array($result)){ ?>
        <option value="<?echo $fila['perido'];?>"><?echo $fila['perido'];?></option>
    <? } ?>
</select>
<select name="criterio">
    <? $anterior; while($fila2=mysql_fetch_array ($result2)){

        if($fila2['criterio']!=$anterior){?>
            <option value="<?echo $fila2['criterio'];?>"><?echo $fila2['criterio'];?></option>

        <?  
			$anterior=$fila2['criterio'];
        }// fin 
		$num++;
    } // fin while?>

</select>
</form>
