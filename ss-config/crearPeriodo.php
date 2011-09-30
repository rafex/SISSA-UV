<?php
@ include_once '../script/php/functions.php';

$periodo=strtoupper(elimina_acentos(espacios_blancos($_POST['periodo'])));
conectar();
echo $periodo;
$sql="insert into configuraciones_ss_fca (periodo) values('$periodo') ";
mysql_query($sql) or die(mysql_error());
?>