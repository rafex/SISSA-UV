<?
$carrera=$_POST['carrera'];

?>
<form action="post">
<input type="hidden" value="<? echo $carrera;?>" name="carrera"/>
</form>
<iframe name="listaalumnos" src="ss-evaluacion/listaalumnos.php" width="100%" height="600" frameborder="0">
tu navegador no soporta iframes
</iframe>
