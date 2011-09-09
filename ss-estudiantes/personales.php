<? 
include_once '../script/php/functions.php';
session_start();
$carrera=$_POST['carrera'];
conectar();
$matricula=$_SESSION['matricula'];
$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu,generoalu,edocivilalu,edadalu,nacionalidadalu,nacimientoalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor FROM alumno_ss_fca,datos_extra_alumno WHERE alumno_ss_fca.matriculaalu='$matricula' AND datos_extra_alumno.MatriculaAlu='$matricula' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());


while($rows=mysql_fetch_array($result)){
	

$carrera=$rows['carreraalu'];
if($carrera=='lsca'){
    $carrera='Sistemas Computacionales Administrativos';
}elseif($carrera=='lc'){
    $carrera='Contaduría';
}elseif($carrera=='la'){
    $carrera='Administración';
}elseif($carrera=='lg'){
    $carrera='Gestion de Negocios';
}
$genero=$rows['generoalu'];
if($genero=='m'){
	$genero="Masculino";	
}elseif($genero=='m'){
	$genero="Femenino";
}
?>
<div id="datos">
<h3>Datos del alumno</h3>
<p>
<strong>Nombre:</strong><em> <?echo $rows['nombrealu'];?></em>
<strong> Matricula:</strong><em> <?echo strtoupper($matricula);?></em>
<br /><br />
<strong>Carrera:</strong><em> <?echo $carrera;?></em> 
<strong> Sección:</strong><em> <?echo $rows['seccionalu']; ?></em> 
<strong> Periodo:</strong><em> <?echo $rows['periodoalu']; ?></em> 
<br /><br />
<strong>Corre electronico:</strong><em> <?echo $rows['emailalu']; ?></em> 
<strong> Teléfono:</strong><em> <?echo $rows['telefonoalu']; ?></em>
<br /><br />
<strong>Genero:</strong><em> <? if($genero=="f"){ echo "FEMENINO"; }else{ echo "MASCULINO"; } ?></em> 
<strong> Estado Civil:</strong><em> <?echo $rows['edocivilalu']; ?></em>
<br /><br />
<strong>Nacionalidad:</strong><em> <?echo $rows['nacionalidadalu']; ?></em>  
<strong> Fecha de nacimiento:</strong><em> <?echo $rows['nacimientoalu']; ?></em>
<strong> Edad:</strong><em> <?echo $rows['edadalu']; ?></em>
<strong> Lugar de nacimiento:</strong><em> <?echo $rows['lugarnacimientoalu']; ?></em>
</p>
<h3>Dirección</h3>
<p>
<strong>Calle:</strong><em> <?echo $rows['calledireccion'];?></em>
<strong> Numero:</strong><em> <?echo $rows['numdireccion'];?></em> 
<strong> Colonia:</strong><em> <?echo $rows['coloniadireccion']; ?></em> 
<strong> C.P.:</strong><em> <?echo $rows['cpdireccion']; ?></em> 
<br /><br />
<strong>Estado:</strong><em> <?echo $rows['estadoalu']; ?></em> 
<strong> Municipio:</strong><em> <?echo $rows['municipioalu']; ?></em>
<strong> Localidad:</strong><em> <?echo $rows['localidadalu']; ?></em>
</p>
<h3>Tutor</h3>
<p>
<strong>Nombre:</strong><em> <?echo $rows['tutoralu']; ?></em>
<br /><br />
<strong> Direccion:</strong><em> <?echo $rows['direcciontutor']; ?></em>
</p>
<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificarPersonal.php');" />
</div>
<?	}	?>