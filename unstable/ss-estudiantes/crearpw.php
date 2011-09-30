<? 
include_once '../script/php/functions.php';
session_start();
$pw=$_POST['clave'];
conectar();
$matricula=$_SESSION['matricula'];
$query="UPDATE `alumno_ss_fca` SET `PassAlu`=password('$pw') WHERE `MatriculaAlu`='$matricula' LIMIT 1;";
mysql_query($query) or die(mysql_error());

?>

