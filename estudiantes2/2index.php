<?php 
session_start();
if($_SESSION['activa']){
	header ("Location: formulario.php");
}
?>
<!DOCTYPE html>
<html>
<head>

<title>
Iniciar Sesion
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
		<a href="index.php" title="">*</a>
	</h1>

<form id="form27" name="form27" class="wufoo  page" autocomplete="off" enctype="multipart/form-data" method="post" action="login.php" novalidate>

<header id="header" class="info">
	<h2>Iniciar Sesión</h2>
	<div></div>
</header>

<ul>
		
		
		
	
<li id="foli1" 
		class="     ">
	<label class="desc" id="title2" for="Field2">
		Usuario:
			</label>
	<div>
		<input id="Field2" 			name="usr" 			type="text" 			spellcheck="false" 			class="field text large" 			value="" 			maxlength="15" 			tabindex="1" 					placeholder="Usuario"				autofocus/> 
	</div>

		
	</li>



<li id="foli2" 		class="     ">
	<label class="desc" id="title2" for="Field2">
		Password:
			</label>
	<div>
		<input id="Field2" 			name="pw" 			type="password" 			spellcheck="false" 			class="field text large" 			value="" 			maxlength="15" 			tabindex="2" 				placeholder="Password"					/> 
	</div>
		<p class="instruct" id="instruct2"><small>No revele a nadie su password.</small></p>
	</li>


 	
		
	<li class="buttons ">
		<div>
					<input type="hidden" name="currentPage" id="currentPage" value="dB5YAYUJLThQ1vViLqkRtO8PC6nWmLuPsz2BRQNT4gw=" />
						<input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Entrar" 
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
<img id="bottom" src="images/bottom.png" alt="" />

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
