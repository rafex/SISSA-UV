<? 
include_once '../script/php/functions.php';
session_start();

conectar();
$matricula=$_SESSION['matricula'];
$periodo=$_SESSION['periodo'];
$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu,generoalu,edocivilalu,edadalu,nacionalidadalu,nacimientoalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor FROM alumno_ss_fca,datos_extra_alumno WHERE alumno_ss_fca.matriculaalu='$matricula' AND datos_extra_alumno.MatriculaAlu='$matricula' AND alumno_ss_fca.periodoalu='$periodo' LIMIT 1";
$result=mysql_query($query) or die(mysql_error());

$hayDatos=mysql_num_rows($result);
if($hayDatos<=0){
	$query="SELECT nombrealu,carreraalu,seccionalu,periodoalu,emailalu,telefonoalu FROM alumno_ss_fca WHERE alumno_ss_fca.matriculaalu='$matricula' AND alumno_ss_fca.periodoalu='$periodo' LIMIT 1";
	$result=mysql_query($query) or die(mysql_error());
}


while($rows=mysql_fetch_array($result)){
	

$carrera=$rows['carreraalu'];
if($carrera=='lsca'){
    $carrera2='Sistemas Computacionales Administrativos';
}elseif($carrera=='lc'){
    $carrera2='Contaduría';
}elseif($carrera=='la'){
    $carrera2='Administración';
}elseif($carrera=='lg'){
    $carrera2='Gestion de Negocios';
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
<strong>Nombre:</strong> <?echo $rows['nombrealu'];?>
<strong> Matricula:</strong> <?echo strtoupper($matricula);?>
<br /><br />
<strong>Carrera:</strong> <?echo $carrera2;?> 
<strong> Sección:</strong> <?echo $rows['seccionalu']; ?> 
<strong> Periodo:</strong> <?echo $rows['periodoalu']; ?> 
<br /><br />
<strong>Corre electronico:</strong> <?echo $rows['emailalu']; ?> 
<strong> Teléfono:</strong> <?echo $rows['telefonoalu']; ?>
<br /><br />
<strong>Genero:</strong> <? if($genero=="f"){ echo "FEMENINO"; }else{ echo "MASCULINO"; } ?> 
<strong> Estado Civil:</strong> <?echo $rows['edocivilalu']; ?>
<br /><br />
<strong>Nacionalidad:</strong> <?echo $rows['nacionalidadalu']; ?>  
<strong> Fecha de nacimiento:</strong> <?if($rows['nacimientoalu']=='0000-00-00'){ echo 'AAAA-MM-DD'; }else{ echo $rows['nacimientoalu']; } ?>
<strong> Edad:</strong> <?echo $rows['edadalu']; ?>
<strong> Lugar de nacimiento:</strong> <?echo $rows['lugarnacimientoalu']; ?>
</p>
<h3>Dirección</h3>
<p>
<strong>Calle:</strong> <?echo $rows['calledireccion'];?>
<strong> Numero:</strong> <?echo $rows['numdireccion'];?> 
<strong> Colonia:</strong> <?echo $rows['coloniadireccion']; ?> 
<strong> C.P.:</strong> <?echo $rows['cpdireccion']; ?> 
<br /><br />
<strong>Estado:</strong> <?echo $rows['estadoalu']; ?> 
<strong> Municipio:</strong> <?echo $rows['municipioalu']; ?>
<strong> Localidad:</strong> <?echo $rows['localidadalu']; ?>
</p>
<h3>Tutor</h3>
<p>
<strong>Nombre:</strong> <?echo $rows['tutoralu']; ?>
<br /><br />
<strong> Direccion:</strong> <?echo $rows['direcciontutor']; ?>
</p>

<input name="modificar" id="modificar" type="button" value="Modificar" onclick="javascript:cargarContenido('modificarPersonal.php');" />
</div>
<?	}	?>