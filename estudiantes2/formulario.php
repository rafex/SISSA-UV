<?php 
session_start();
if($_SESSION['activa']){

}else{
	header ("Location: index.php");
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
<meta name="generator" content="Wufoo.com" />

<!-- CSS -->
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/form.css" type="text/css" />

<!-- JavaScript -->
<script type="text/javascript" src="scripts/wufoo.js"></script>

<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="public">
<div id="container">

<h1 id="logo">
	<a href="index.php" title="" >*</a>
	</h1>

<form id="form45" name="form45" class="wufoo  page" autocomplete="off" enctype="multipart/form-data" method="post" action="procesar.php" novalidate>

<header id="header" class="info">
	<h2>Apoyo a la selección del Servicio Social</h2>
	<div>¡Hola <?echo $_SESSION['nombre'];?>! <pre><em>Prototipo v0.4.1</em></pre></div>
</header>

<ul>
		
		
		
	
<li id="foli202" 		class="     ">
	<fieldset>
	<![if !IE | (gte IE 8)]>
	<legend id="title202" class="desc">
		¿En que horario te gustaría realizar tu servicio social?
			</legend>
	<![endif]>
	<!--[if lt IE 8]>
	<label id="title202" class="desc">
		How long had you been using the subscription / service?
			</label>
	<![endif]-->
	<div>
	<input id="radioDefault_202" name="turno" type="hidden" value="vacio" />
		<span>
	<input id="Field202_0" 		name="turno" 		type="radio" 		class="field radio" 		value="matutino" 		tabindex="1" 										/>
	<label class="choice" for="Field202_0" 		>
		Matutino</label>
		</span>
		<span>
	<input id="Field202_1" 		name="turno" 		type="radio" 		class="field radio" 		value="vespertino" 		tabindex="2" 										/>
	<label class="choice" for="Field202_1" 		>
		Vespertino</label>
		</span>
		<span>
	<input id="Field202_2" 		name="turno" 		type="radio" 		class="field radio" 		value="mixto" 		tabindex="3" 										/>
	<label class="choice" for="Field202_2" 		>
		Mixto</label>
		</span>
		</div>
	</fieldset>
	</li>


<li id="foli205" 		class="     ">
	<fieldset>
	<![if !IE | (gte IE 8)]>
	<legend id="title205" class="desc">
		¿Deseas recibir apoyo o ayuda económica para transporte y/o alimentos?
			</legend>
	<![endif]>
	<!--[if lt IE 8]>
	<label id="title205" class="desc">
		How often did you use the subscription / service?
			</label>
	<![endif]-->
	<div>
	<input id="radioDefault_205" name="beca" type="hidden" value="vacio" />
		<span>
	<input id="Field205_0" 		name="beca" 		type="radio" 		class="field radio" 		value="si" 		tabindex="4" 										/>
	<label class="choice" for="Field205_0" 		>
		Si</label>
		</span>
		<span>
	<input id="Field205_1" 		name="beca" 		type="radio" 		class="field radio" 		value="no" 		tabindex="5" 										/>
	<label class="choice" for="Field205_1" 		>
		No</label>
		</span>
		</div>
	</fieldset>
	</li>


<li id="foli208" 		class="     ">
	<fieldset>
	<![if !IE | (gte IE 8)]>
	<legend id="title208" class="desc">
		¿En que tipo de institución te gustaría realizarlo?
			</legend>
	<![endif]>
	<!--[if lt IE 8]>
	<label id="title208" class="desc">
		Overall, how satisfied were you with the subscription / service?
			</label>
	<![endif]-->
	<div>
	<input id="radioDefault_208" name="tipo" type="hidden" value="vacio" />
		<span>
	<input id="Field208_0" 		name="tipo" 		type="radio" 		class="field radio" 		value="publica" 		tabindex="6" 										/>
	<label class="choice" for="Field208_0" 		>
		Pública</label>
		</span>
		<span>
	<input id="Field208_1" 		name="tipo" 		type="radio" 		class="field radio" 		value="privada" 		tabindex="7" 										/>
	<label class="choice" for="Field208_1" 		>
		Privada</label>
		</span>
		</div>
	</fieldset>
	</li>


<li id="foli227" 		class="     ">
	<fieldset>
	<![if !IE | (gte IE 8)]>
	<legend id="title227" class="desc">
		¿A que tipo de actividad deseas que se dedique la empresa?
			</legend>
	<![endif]>
	<!--[if lt IE 8]>
	<label id="title227" class="desc">
		What was the primary reason for canceling your subscription / service?
			</label>
	<![endif]-->
	<div>
	<input id="radioDefault_227" name="actividad" type="hidden" value="vacio" />
		<span>
	<input id="Field227_0" 		name="actividad" 		type="radio" 		class="field radio" 		value="1" 		tabindex="8" 										/>
	<label class="choice" for="Field227_0" 		>
		Primario</label>
		</span>
		<span>
	<input id="Field227_1" 		name="actividad" 		type="radio" 		class="field radio" 		value="2" 		tabindex="9" 										/>
	<label class="choice" for="Field227_1" 		>
		Secundario</label>
		</span>
		<span>
	<input id="Field227_2" 		name="actividad" 		type="radio" 		class="field radio" 		value="3" 		tabindex="10" 										/>
	<label class="choice" for="Field227_2" 		>
		Terciario</label>
		</span>
		</div>
	</fieldset>
	</li>
<li id="foli211" 
		class="     ">
	
		
	<label class="desc" id="title1" for="Field1">
		¿Cuales son tus conocimientos? <em>(sepáralas conocimientos por comas)</em>:

			</label>
	
	<div>
				<textarea id="Field1" 
			name="conocimientos" 
			class="field textarea medium" 
			spellcheck="true" 
			rows="10" cols="50" 
						tabindex="11" 
			onkeyup=""
						 			 ></textarea>
			
			</div>
	
		<p class="instruct" id="instruct1"><small>Ejemplo:ingles,programacion,sql,java,frances,mecanografia</small></p>
		
		
	</li>

<li id="foli211" 
		class="     ">
	
		
	<label class="desc" id="title1" for="Field1">
		¿Cuales son tus actitudes? <em>(sepáralas actitudes por comas)</em>:

			</label>
	
	<div>
				<textarea id="Field1" 
			name="actitudes" 
			class="field textarea medium" 
			spellcheck="true" 
			rows="10" cols="50" 
						tabindex="12" 
			onkeyup=""
									 ></textarea>
			
			</div>
	
		<p class="instruct" id="instruct1"><small>Ejemplo:responsable,puntual,amable,honesto</small></p>
		
		
	</li>


 	
		
	<li class="buttons ">
		<div>
					<input type="hidden" name="currentPage" id="currentPage" value="dB5YAYUJLThQ1vViLqkRtO8PC6nWmLuPsz2BRQNT4gw=" />
						<input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Enviar" 
				onmousedown="doSubmitEvents();" />
							
				
				</div>
	</li>

	<li style="display:none">
		<label for="comment">Do Not Fill This Out</label>
		<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
		<input type="hidden" id="idstamp" name="idstamp" value="" />
		<input type="hidden" id="stats" name="stats" value="" />
				<input type="hidden" id="clickOrEnter" name="clickOrEnter" value="" />
	</li>
</ul>
</form>

</div><!--container-->


<style type="text/css">
@import url(/css/global/power.14617.css);
</style>

<a class="powertiny" href="http://rafex.com.mx" title=""
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">
<span style="background:url(./images/powerlogo.png) no-repeat center 7px; margin:0 auto;display:inline-block !important;visibility:visible !important;text-indent:-9000px !important;position:static !important;overflow: auto !important;width:62px !important;height:30px !important">Wufoo</span>
<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">Copyleft Rafex.com.mx</b>
</a><a href="login.php?c=1">Cerra Sesion</a>
</body>
</html>
