<? 
include_once '../script/php/functions.php';

$mat=$_POST['alu'];
$pw=$_POST['clave'];
conectar();

$query="UPDATE `alumno_ss_fca` SET `PassAlu`=password('$pw') WHERE `MatriculaAlu`='$mat' LIMIT 1;";
mysql_query($query) or die(mysql_error());

?>