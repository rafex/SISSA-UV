<!DOCTYPE html>
<html>
<head>

<title>
Registro al Servicio Social
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Wufoo.com" />

<!-- CSS -->
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />

<!-- JavaScript -->
<script src="scripts/wufoo.js"></script>

<!--[if lt IE 10]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container">

<h1 id="logo">
<a href="../../index.php" >Wufoo</a>
</h1>

<form id="registroAlu" name="registroAlu" class="wufoo topLabel page" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
action="">

<header id="header" class="info">
<h2>Registro al Servicio Social</h2>
<h2>Datos del Alumno</h2>
<div></div>
</header>

<ul>
<li id="Field1"	class="     ">
	<label class="desc" id="title2" for="Field2">
		Matricula:
	</label>
	<div>
		<input id="matricula" name="matricula" type="text"	class="field text small" 	value="" 		maxlength="15" 		tabindex="1" 	placeholder="s07016390"				autofocus/> 
	</div>
</li>
	
<li id="Field2" class="leftHalf     ">
	<label class="desc" id="title1" for="Field1">
		Nombre(s)
	</label>	
	<span>
		<input id="nombre" name="nombre" type="text" class="field text fn" value="" size="18" tabindex="2" maxlength="50"/>
	<label for="Field1">Nombre(s)</label>
	</span>
</li>

<li id="foli3" class="rightHalf     ">
	<label class="desc" id="title3" for="Field3">
	Apellidos
	</label>

	<span>
		<input id="paterno" name="paterno" type="text" class="field text fn" value="" size="15" tabindex="3" maxlength="50"/>
		<label for="Field3">Paterno</label>
	</span>
	
	<span>
		<input id="materno" name="materno" type="text" class="field text ln" value="" size="15" tabindex="4" maxlength="50"/>
		<label for="Field4">Materno</label>
	</span>
</li>

<li id="foli5" 		class="leftHalf     ">
	<label class="desc" id="title2" for="Field2">
		Carrera:
			</label>
	<span>
		<select id="carrera" name="carrera" tabindex="5">
			<option value="sin" >Seleccione</option>		
			<option value="la" >Administración</option>
			<option value="lc" >Contabilidad</option>
			<option value="lsca" >Sistemas</option>
			<option value="lg" >Gestión</option>
		
		</select>  
	</span>
		
	</li>
	
<li id="foli6" 		class="rightHalf     ">
	<label class="desc" id="title2" for="Field2">
		Periodo:
			</label>
	<span>
		<?
include_once 'scripts/functions.php';
conectar();
$sql="SELECT `periodo` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die(mysql_error());
?>
		
		
		<select id="periodo" name="periodo" tabindex="6">
			  <?  while($fila=mysql_fetch_array($result)){ ?>
			  	
        		<option value="<? echo $fila['periodo'];?>" ><? echo $fila['periodo'];?></option>
    		<? } ?>
		
		</select>  
	</span>
		
	</li>
	
<li id="foli6" 		class="leftHalf     ">
	<label class="desc" id="title2" for="Field2">
		Genero:
			</label>
	<span>
		<select id="genero" name="genero" tabindex="7">
			<option value="i" >Seleccione</option>
			<option value="m" >Masculino</option>
			<option value="f" >Femenino</option>		
			
		
		</select>  
	</span>
		
	</li>	
	
	<li id="foli6" 		class="  rightHalf   ">
	<label class="desc" id="title2" for="Field2">
		Estado Civil:
			</label>
	<span>
		<select id="civil" name="civil" tabindex="8">
			<option value="solter@" >Soltero(a)</option>
			<option value="casad@" >Casado(a)</option>
		</select>  
	</span>
		
	</li>	
	
<li id="Field2" class="leftHalf     ">
	<label class="desc" id="title1" for="Field1">
		Edad
	</label>	
	<span>
		<input id="edad" name="edad" type="text" class="field text medium" value="" size="5" tabindex="9" maxlength="4"/>
	<label for="Field1">años</label>
	</span>
</li>

<li id="foli3" class="rightHalf     ">
	<label class="desc" id="title3" for="Field3">
	Nacionalidad
	</label>

	<span>
		<input id="nacionalidad" name="nacionalidad" type="text" class="field text fn" value="" size="18" tabindex="10" maxlength="50"/>
		<label for="Field3">.</label>
	</span>
	
</li>

<li id="foli1" class="leftHalf     ">
<label class="desc" id="title1" for="Field1">
Fecha de Nacimiento
</label>
<span>
<input id="dia_nacimiento" name="dia_nacimiento" type="text" class="field text fn" value="" size="3" tabindex="11" placeholder="03" />
<label for="Field1">Día(DD)</label>
</span>
<span>
<input id="mes_nacimiento" name="mes_nacimiento" type="text" class="field text ln" value="" size="3" tabindex="12" placeholder="11" />
<label for="Field2">Mes(MM)</label>
</span>
<span>
<input id="anio_nacimiento" name="anio_nacimiento" type="text" class="field text ln" value="" size="5" tabindex="13" placeholder="1988" />
<label for="Field2">Año(YYYY)</label>
</span>
</li>

<li id="foli3" class="rightHalf     ">
	<label class="desc" id="title3" for="Field3">
	Lugar de Nacimiento
	</label>

	<span>
		<input id="lugar_nacimiento" name="lugar_nacimiento" type="text" class="field text fn" value="" size="18" tabindex="14" maxlength="50"/>
		<label for="Field3">.</label>
	</span>
	
</li>

<li id="foli1" class="leftHalf     ">
<label class="desc" id="title1" for="Field1">
Direccion
</label>
<span>
<input id="calle_direccion" name="calle_direccion" type="text" class="field text fn" value="" size="10" maxlength="50" tabindex="15" />
<label for="Field1">calle</label>
</span>
<span>
<input id="num_direccion" name="num_direccion" type="text" class="field text ln" value="" size="3" tabindex="16" />
<label for="Field2">Num</label>
</span>
<span>
<input id="colonia_direccion" name="colonia_direccion" type="text" class="field text ln" value="" size="10" tabindex="17" />
<label for="Field2">colonia</label>
</span>
<span>
<input id="cp_direccion" name="cp_direccion" type="text" class="field text ln" value="" size="6" tabindex="18" />
<label for="Field2">c.p.</label>
</span>
</li>

<li id="foli3" class="rightHalf     ">
	<label class="desc" id="title3" for="Field3">
	Estado
	</label>

	<span>
		<input id="edo_estado" name="edo_estado" type="text" class="field text fn" value="" size="10" tabindex="19" maxlength="50"/>
		<label for="Field3">edo.</label>
	</span>
	<span>
		<input id="mun_estado" name="mun_estado" type="text" class="field text ln" value="" size="10" tabindex="20" />
		<label for="Field2">municipio</label>
	</span>
	<span>
		<input id="loc_estado" name="loc_estado" type="text" class="field text ln" value="" size="10" tabindex="21" />
		<label for="Field2">localidad</label>
	</span>
	
</li>

<li id="foli5" class="leftHalf     ">
<label class="desc" id="title5" for="Field5">
Correo electronico:
</label>
<div>
<input id="correo" name="correo" type="text" class="field text medium" value="" maxlength="255" tabindex="22"  />
</div>
</li>
<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Teléfono:
</label>
<span>
<input id="tel" name="tel" type="text" class="field text medium" value="" maxlength="50" tabindex="23"  />
<label for="Field1">solo numeros sin paréntesis</label>
</span>
</li>

<header id="header" class="info">
<h2>Datos del Tutor</h2>
<div></div>
</header>
	
<li id="foli5" class="leftHalf     ">
<label class="desc" id="title5" for="Field5">
Nombre del Padre o Tutor:
</label>
<div>
<input id="nombre_tutor" name="nombre_tutor" type="text" class="field text medium" value="" maxlength="255" tabindex="24"  />
</div>
</li>
<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Direccion del Padre/Madre o Tutor:
</label>
<div>
<input id="direccion_tutor" name="direccion_tutor" type="text" class="field text medium" value="" maxlength="255" tabindex="25"  />
</div>
</li>


<header id="header" class="info">
<h2>Datos de la Empresa o Institución</h2>
<div></div>
</header>

<li id="foli5" class="leftHalf     ">
<label class="desc" id="title5" for="Field5">
Nombre de la empresa o institución
</label>
<div>
<input id="nombre_empresa" name="nombre_empresa" type="text" class="field text medium" value="" maxlength="255" tabindex="26"  />
</div>
</li>

	<li id="foli6" 		class="  rightHalf   ">
	<label class="desc" id="title2" for="Field2">
		¿Tiene acuerdo la empresa con la facultad?
			</label>
	<span>
		<select id="acuerdo_empresa" name="acuerdo_empresa" tabindex="27">
			<option value="se tiene y se desea mantener" >Se tiene y se desea mantener</option>
			<option value="se tiene y NO se desea mantener" >Se tiene y NO se desea mantener</option>
			<option value="no se tiene y se desea firmar" >No se tiene y se desea firmar</option>
			<option value="no se tiene y NO se desea firmar" >No se tiene y NO se desea firmar</option>
		</select>  
	</span>
		
	</li>	

<li id="foli1" class="leftHalf     ">
<label class="desc" id="title1" for="Field1">
Clasificación
</label>
<span>
	<select id="clasificacion_empresa" name="clasificacion_empresa" tabindex="28">
			<option value="educativo" >Educativo</option>
			<option value="comercial" >Comercial</option>
			<option value="servicios" >Servicios</option>
			<option value="otra" >otra</option>			
	</select>  
	<label for="Field2">Servicios</label>	
</span>

<span>
	<input id="otrogiro_empresa" name="otrogiro_empresa" type="text" class="field text ln" value="" size="15" tabindex="29" />
	<label for="Field1">otro</label>
</span>
</li>

<li id="foli3" class="rightHalf     ">
<label class="desc" id="title3" for="Field3">
Actividad o giro
</label>

<span>
	<input id="giro_empresa" name="giro_empresa" type="text" class="field text ln" value="" size="18" tabindex="31" />
	<label for="Field1">clasificación</label>
</span>
</li>

<li id="foli6" 		class="leftHalf     ">
	<label class="desc" id="title2" for="Field2">
		Sector:
			</label>
	<span>
		<select id="sector_empresa" name="sector_empresa" tabindex="32">
			<option value="primario" >Primario</option>
			<option value="secundario" >Secundario</option>
			<option value="terciario" >Terciario</option>		
			
		
		</select>
		<label for="Field3">seleccione</label>  
	</span>
		
	</li>	
	
<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Teléfono de la empresa o institución
</label>
	<span>
		<input id="tel_empresa1" name="tel_empresa1" type="text" class="field text fn" value="" size="15" tabindex="33" maxlength="50"/>
		<label for="Field3">principal(sin paréntesis)</label>
	</span>
	
	<span>
		<input id="tel_empresa2" name="tel_empresa2" type="text" class="field text ln" value="" size="15" tabindex="34" maxlength="50"/>
		<label for="Field4">secundario(sin paréntesis)</label>
	</span>
</li>

<li id="foli1" class="leftHalf     ">
<label class="desc" id="title1" for="Field1">
Direccion
</label>
	<span>
		<input id="calle_direccion_empresa" name="calle_direccion_empresa" type="text" class="field text fn" value="" size="10" maxlength="50" tabindex="35" />
		<label for="Field1">calle</label>
	</span>
	<span>
		<input id="num_direccion_empresa" name="num_direccion_empresa" type="text" class="field text ln" value="" size="3" tabindex="36" />
		<label for="Field2">Num</label>
	</span>
	<span>
		<input id="colonia_direccion_empresa" name="colonia_direccion_empresa" type="text" class="field text ln" value="" size="10" tabindex="37" />
		<label for="Field2">colonia</label>
	</span>
	<span>
		<input id="cp_direccion_empresa" name="cp_direccion_empresa" type="text" class="field text ln" value="" size="6" tabindex="38" />
		<label for="Field2">c.p.</label>
	</span>
</li>

<li id="foli3" class="rightHalf     ">
	<label class="desc" id="title3" for="Field3">
	Estado
	</label>

	<span>
		<input id="edo_estado_empresa" name="edo_estado_empresa" type="text" class="field text fn" value="" size="10" tabindex="39" maxlength="50"/>
		<label for="Field3">edo.</label>
	</span>
	<span>
		<input id="mun_estado_empresa" name="mun_estado_empresa" type="text" class="field text ln" value="" size="10" tabindex="40" />
		<label for="Field2">municipio</label>
	</span>
	<span>
		<input id="loc_estado_empresa" name="loc_estado_empresa" type="text" class="field text ln" value="" size="10" tabindex="41" />
		<label for="Field2">localidad</label>
	</span>
	
</li>

<li id="foli5" class="leftHalf     ">
<label class="desc" id="title5" for="Field5">
Correo electronico de la empresa:
</label>
<div>
<input id="correo_empresa" name="correo_empresa" type="text" class="field text ln" value="" maxlength="255" tabindex="42"  />
</div>
</li>

	<li id="foli6" 		class="  rightHalf   ">
	<label class="desc" id="title2" for="Field2">
		Tipo de empresa:
			</label>
	<span>
		<select id="tipo_empresa" name="tipo_empresa" tabindex="43">
			<option value="publica" >Pública</option>
			<option value="privada" >Privada</option>
			<option value="uv" >UV</option>
			
		</select>  
	</span>
		
	</li>	


<header id="header" class="info">
<h2>Datos del área de trabajo y jefe directo</h2>
<div></div>
</header>

<li id="foli5" class="leftHalf     ">
<label class="desc" id="title5" for="Field5">
Área de trabajo:
</label>
<div>
<input id="area" name="area" type="text" class="field text medium" value="" maxlength="255" tabindex="44"  />
</div>
</li>

<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Nombre del jefe directo:
</label>
<div>
<input id="jefe" name="jefe" type="text" class="field text medium" value="" maxlength="255" tabindex="45"  />
</div>
</li>


<li id="foli5" class="leftHalf     ">
<label class="desc" id="title5" for="Field5">
Correo electronico del jefe directo:
</label>
<div>
<input id="correo_encargado" name="correo_encargado" type="text" class="field text medium" value="" maxlength="255" tabindex="46"  />
</div>
</li>


<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Puesto del jefe directo:
</label>
<div>
<input id="puesto" name="puesto" type="text" class="field text medium" value="" maxlength="255" tabindex="47"  />
</div>
</li>

<header id="header" class="info">
<h2>Datos del programa de servicio social</h2>
<div></div>
</header>

<li id="foli6" 		class="leftHalf     ">
	<label class="desc" id="title2" for="Field2">
		Nombre del programa:
			</label>
	<div>
		<input id="nombre_programa" name="nombre_programa" type="text" class="field text medium" value="" maxlength="255" tabindex="48" />

	</div>
		
	</li>	

<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Objetivo del programa:
</label>
<div>
<input id="objetivop" name="objetivop" type="text" class="field text medium" value="" maxlength="255" tabindex="49"  />
</div>
</li>


<li id="foli6" 		class="leftHalf     ">
	<label class="desc" id="title2" for="Field2">
		Características del servicio social:
			</label>
	<span>
		<select id="tipo" name="tipo" tabindex="50">
			<option value="ninguno" >ninguno</option>
			<option value="becado" >becado</option>
			<option value="uv" >uv</option>
			<option value="brigada" >brigada</option>
			<option value="becado y uv" >becado y uv</option>
			<option value="becado , uv y brigada" >becado , uv y brigada</option>
			
		
		</select>
		<label for="Field3">seleccione</label>  
	</span>
		
	</li>	

<li id="foli6" class="rightHalf     ">
<label class="desc" id="title6" for="Field6">
Naturaleza del programa:
</label>
<div>
<input id="funcion" name="funcion" type="text" class="field text medium" value="" maxlength="255" tabindex="51"  />
</div>
</li>



 <li class="buttons ">
<div>

<input id="saveForm" name="saveForm"  type="button" value="Guardar" onClick="javascript:enviar();" /></div>
</li>



</ul>
</form> 

</div><!--container-->
<img id="bottom" src="images/bottom.png" alt="" />

<a class="powertiny" href="http://rafex.com.mx" title="Powered by rafex"
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">

<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">by Raúl Eduardo González Argote</b>
</a>
</body>
</html>