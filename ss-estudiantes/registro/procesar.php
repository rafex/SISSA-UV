<?
include_once'clases/conectar.php';
include_once'clases/functions.php';

$conx=new Conexion();
$conx->getConexion();
$matricula=strtoupper(trim($_POST['matricula']));
$nombre=utf8_encode(strtoupper(elimina_acentos(trim($_POST['nombre']))));
$paterno=utf8_encode(strtoupper(elimina_acentos(trim($_POST['paterno']))));
$materno=utf8_encode(strtoupper(elimina_acentos(trim($_POST['materno']))));
$carrera=$_POST['carrera'];
$periodo=$_POST['periodo'];
$genero=$_POST['genero'];
$civil=$_POST['civil'];
$nacionalidad=utf8_encode(strtoupper(elimina_acentos(trim($_POST['nacionalidad']))));
$nacimiento=utf8_encode(strtoupper(elimina_acentos(trim($_POST['lugar_nacimiento']))));
$edad=trim($_POST['edad']);
$dia=trim($_POST['dia_nacimiento']);
$mes=trim($_POST['mes_nacimiento']);
$anio=trim($_POST['anio_nacimiento']);
$calle=elimina_acentos(trim($_POST['calle_direccion']));
$num=trim($_POST['num_direccion']);
$colonia=elimina_acentos(trim($_POST['colonia_direccion']));
$codp=trim($_POST['cp_direccion']);
$estado=strtoupper(elimina_acentos(trim($_POST['edo_estado'])));
$municipio=strtoupper(elimina_acentos(trim($_POST['mun_estado'])));
$localidad=strtoupper(elimina_acentos(trim($_POST['loc_estado'])));
$correo=trim($_POST['correo']);
$telefono=trim($_POST['tel']);
$tutor=utf8_encode(strtoupper(elimina_acentos(trim($_POST['nombre_tutor']))));
$direcciontutor=elimina_acentos($_POST['direccion_tutor']);
$nombrecompleto=$paterno.' '.$materno.' '.$nombre;
$fecha=$anio.'-'.$mes.'-'.$dia;

$nombreempresa=utf8_encode(strtoupper(elimina_acentos(trim($_POST['nombre_empresa']))));
$acuerdo=$_POST['acuerdo_empresa'];
$clasificacion=utf8_encode(strtoupper(elimina_acentos(trim($_POST['clasificacion_empresa']))));
$sector=$_POST['sector_empresa'];
$telemp1=trim($_POST['tel_empresa1']);
$telemp2=trim($_POST['tel_empresa2']);
$calleempresa=elimina_acentos(trim($_POST['calle_direccion_empresa']));
$numempresa=trim($_POST['num_direccion_empresa']);
$coloniaempresa=elimina_acentos(trim($_POST['colonia_direccion_empresa']));
$cpempresa=trim($_POST['cp_direccion_empresa']);
$direccionempresa=$calleempresa.' '.$numempresa.', '.$coloniaempresa.' '.$coloniaempresa;
$estadoempresa=utf8_encode(strtoupper(elimina_acentos(trim($_POST['edo_estado_empresa']))));
$municipioempresa=utf8_encode(strtoupper(elimina_acentos(trim($_POST['mun_estado_empresa']))));
$localidadempresa=utf8_encode(strtoupper(elimina_acentos(trim($_POST['loc_estado_empresa']))));
$correoempresa=trim($_POST['correo_empresa']);
$area=utf8_encode(strtoupper(elimina_acentos(trim($_POST['area']))));
$jefe=utf8_encode(strtoupper(elimina_acentos(trim($_POST['jefe']))));
$puesto=utf8_encode(strtoupper(elimina_acentos(trim($_POST['puesto']))));
$correojefe=trim($_POST['correo_encargado']);
$giro="";
$funcion=utf8_encode(strtoupper(elimina_acentos(trim($_POST['funcion']))));
$tipo=$_POST['tipo'];
$nombrepro=utf8_encode(strtoupper(elimina_acentos(trim($_POST['nombre_programa']))));
$objetivo=utf8_encode(strtoupper(elimina_acentos(trim($_POST['objetivop']))));
$tipo_empresa=$_POST['tipo_empresa'];

if($_POST['giro_empresa']=='otra'){
	$giro=utf8_encode(strtoupper(elimina_acentos(trim($_POST['otrogiro_empresa']))));	
}else{
	$giro=$_POST['giro_empresa'];
}

$validar=0;
$mensajeERROR="";
$sql=" SELECT * FROM alumno_ss_fca WHERE MatriculaAlu='$matricula' AND PeriodoAlu='$periodo' ";
$alumno=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($alumno)==1){
	$mensajeERROR.="Tus datos como nombre,matrícula,carrera ya existen  y estan registrados en el periodo <em>$periodo</em>. <br>";
}
else{
	$sql="INSERT INTO alumno_ss_fca (CriterioAlu,MatriculaAlu,NombreAlu,CarreraAlu,PeriodoAlu,EmailAlu,TelefonoAlu) value('meifv1','$matricula','$nombrecompleto','$carrera','$periodo','$correo','$telefono')";
	$alumno=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()>0){
		$validar+=1;
	}
}


$sql=" SELECT * FROM historial_alumno_ss_fca WHERE MatriculaAlu='$matricula' AND PeriodoAlu='$periodo' ";
$historial=mysql_query($sql) or die(mysql_error());
$updateHistorial=false;
if(mysql_num_rows($historial)==1){
	$mensajeERROR.="Tus datos como nombre, objetivo y naturaleza del programa ya existen en el periodo <em>$periodo</em>.<br>";
	$updateHistorial=false;
}
else{
	$updateHistorial=true;
	$sql="INSERT INTO historial_alumno_ss_fca (MatriculaAlu,PeriodoAlu) values('$matricula','$periodo')";
	$historial=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()>0){
		$validar+=1;
	}
}


$sql=" SELECT * FROM datos_extra_alumno WHERE MatriculaAlu='$matricula' ";
$datosextraalumno=mysql_query($sql) or die(mysql_error());

if(mysql_num_rows($datosextraalumno)==1){
	$mensajeERROR.="Tus datos como genero,edad,edo. civil,edad, nacionalidad, dirección y datos del tutor ya existen.<br>";
	
}
else{
	$sql="INSERT INTO datos_extra_alumno (MatriculaAlu,generoalu,edocivilalu,edadalu,nacionalidadalu,nacimientoalu,lugarnacimientoalu,calledireccion,numdireccion,coloniadireccion,cpdireccion,estadoalu,municipioalu,localidadalu,tutoralu,direcciontutor) 
	 value('$matricula','$genero','$civil','$edad','$nacionalidad',DATE_FORMAT('$fecha','%Y-%m-%d'),'$nacimiento','$calle','$num','$colonia','$codp','$estado','$municipio','$localidad','$tutor','$direcciontutor' )";
	$datosextraalumno=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()>0){
		$validar+=1;
	}
}




if($updateHistorial){
	$sql="INSERT INTO empresa_ss_fca (NombreEmp,DireccionEmp,EmailEmp,TelefonoEmp,Telefono2Emp,ClasificacionEmp,SectorEmp,AcuerdoEmp,GiroEmp,EstadoEmp,MunicipioEmp,LocalidadEmp,TipoEmp)
	 values('$nombreempresa','$direccionempresa','$correoempresa','$telemp1','$telemp2','$clasificacion','$sector','$acuerdo','$giro','$estadoempresa','$municipioempresa','$localidadempresa','$tipo_empresa')";
	$empresao=mysql_query($sql) or die(mysql_error());
	$IdEmp=mysql_insert_id();
	if(mysql_affected_rows()>0){
		$validar+=1;
	}
	
	$sql="INSERT INTO encargado_ss_fca (NombreEnc,PuestoEnc,EmailEnc) values('$jefe','$puesto','$correojefe')";
	$encargado=mysql_query($sql) or die(mysql_error());
	$IdEnc=mysql_insert_id();
	if(mysql_affected_rows()>0){
		$validar+=1;
		
	}	

	$sql="UPDATE historial_alumno_ss_fca SET NombrePrograma='$nombrepro' , ObjetivoPrograma='$objetivo', FuncionHist='$funcion' , TipoHist='$tipo' , JefeDirectoHist='$IdEnc' , AreaHist='$area' , Empresa='$IdEmp'  WHERE MatriculaAlu='$matricula' AND PeriodoAlu='$periodo' ";
	//$sql="INSERT INTO historial_alumno_ss_fca (MatriculaAlu,NombrePrograma,ObjetivoPrograma,FuncionHist,TipoHist,JefeDirectoHist,AreaHist,Empresa) values('$matricula','$nombrepro','$objetivo','$funcion','$tipo','$IdEnc','$area','$IdEmp')";
	$historial=mysql_query($sql) or die(mysql_error());
	if(mysql_affected_rows()>0){
		$validar+=1;
	}
}




?>
<!DOCTYPE html>
<html>
<head>

<title>
Apoyo a la selección del Servicio Social
</title>

<!-- Meta Tags -->
<meta charset="utf-8">


<!-- CSS -->
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />
<link rel="stylesheet" href="css/tagbox.css" type="text/css" />

<!-- JavaScript -->
<script type="text/javascript" src="scripts/wufoo.js"></script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container">

<h1 id="logo">
	<a href="../../index.php" title="" >*</a>
	</h1>
<center>
<?	if($validar==6) { ?>
	<h1>Registro realizado con exito</h1>
<?	}else{	
		if(empty($mensajeERROR)){ ?>
			<h1>Se sucito un error inesperado, favor de contactar al administrador del sistema.</h1>		
<?		}else{
			echo "<h1>Registro parcialmente realizado.</h1>";
			echo "<p>$mensajeERROR </p><p>Contacte al departamento del servicio social para corroborar sus datos.</p>";
		}
		
	
	}	?>
	<p><a href="../../login.php?cerrar=1" > [ Volver ] </a></p>
	 
</center>
</div><!--container-->


<style type="text/css">
@import url(/css/global/power.14617.css);
</style>

<a class="powertiny" href="http://rafex.com.mx" title=""
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">

<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">by Raúl Eduardo González Argote</b>
</a>
</body>
</html>
