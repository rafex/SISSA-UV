<?
include_once '../script/php/functions.php';
conectar();
$sql="SELECT DISTINCT `periodo` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die(mysql_error());
?>
<p><strong>Limpia algun rastro del alumno si es que existe.</strong></p>

<form name="periodos" method="post" action="" >
	<p>Inserte matrícula:</p>
	<input name="matricula" id="matricula" type="text" maxlength="15" tabindex="1" autofocus />
	<select name="periodo" id="periodo">
    <? while($fila=mysql_fetch_array($result)){ ?>
        <option value="<?echo $fila['periodo'];?>"><?echo $fila['periodo'];?></option>
    <? } ?>
	</select>
	
	
	<br> 
	<input type="button" onclick="javascript:metodoAgil('limpiando.php','matricula,periodo','Se limpio correctamente la matrícula: '+document.getElementById('matricula').value,'<?php if($_SESSION['nivel']=='evaluador'){echo "../ss-admin/limpiarAlu.php";}else{ echo "limpiarAlu.php";}?>');" value="Lmipiar...">
</form>
