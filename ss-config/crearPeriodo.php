<?php
@ include_once '../script/php/functions.php';

$periodo=strtoupper(elimina_acentos(espacios_blancos($_POST['periodo'])));
conectar();
echo $periodo;
$sql="insert into configuraciones_ss_fca (periodo,carrera) values('$periodo','lsca'),('$periodo','lg'),('$periodo','lc'),('$periodo','la') ";
mysql_query($sql) or die(mysql_error());
?>