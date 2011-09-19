<? 

include_once '../script/php/functions.php';
conectar();

$matricula=$_POST['matricula'];

$query="DELETE FROM `alumno_ss_fca` WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
$result=mysql_query($query) or die(mysql_error());




?>