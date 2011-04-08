<? include_once '../script/php/functions.php';
conectar();
$sql="SELECT `perido` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die();
$sql2="SELECT `nombreCriterio` from `criterios_ss_fca` ORDER BY `nombreCriterio`";
$result2=mysql_query($sql2) or die();
?>
<form name="pre-evaluacion">
<select name="perido">
    <? while($fila=mysql_fetch_array($result)){ ?>
        <option value="<?echo $fila['perido'];?>"><?echo $fila['perido'];?></option>
    <? } ?>
</select>
<select name="criterio">
    <? $veces=0; $num=0; while($fila2=mysql_fetch_array($result2)){
        $actual=$fila2[$num];
        $anterior;
        if($num!=0){$anterior=$fila2[$num-1];}
        if($fila2[$num]!=$anterior){?>
            <option value="<?echo $fila2[$num];?>"><?echo $fila2[$num];?></option>
        <?  
            $anterior=$actual;
        }// fin if
    $num++;
    } // fin while?>

</select>
</form>
