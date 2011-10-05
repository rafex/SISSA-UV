function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
			xmlhttp = false;
  		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function realizarOperacionConMensajeAccion(pagina,variable,mensaje,destino){ 
      var valor= document.getElementById(variable).value;
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById(variable).value="";
				if(!(mensaje=="") || !(mensaje==" ") || !(mensaje.length==0) ){
					alert(mensaje);
				}
				location.href = destino;
														
				//document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send("&"+variable+"="+valor);
}

function realizarOperacionConMensajeAccion2(pagina,variables,mensaje,destino){ 
      
      var noms=variables.split(",");
      var vals=new Array();
      for(var i=0;i<noms.length;i++){
      	vals[i]=document.getElementById(noms[i]).value;
      }
      
      
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				//document.getElementById(variable).value="";
				if(!(mensaje=="") || !(mensaje==" ") || !(mensaje.length==0) ){
					alert(mensaje);
				}
				location.href = destino;
														
				//document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&'+enviar);
}

function crearContenidosConMensaje(pagina,variables,mensaje,destino){ 
    
    var noms=variables.split(",");
    var vals=new Array();
    for(var i=0;i<noms.length;i++){
    	vals[i]=document.getElementById(noms[i]).value;
    }
    
    
    ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==1) {
			result = "Cargando...";
			document.getElementById(destino).innerHTML=result;
		}

		if (ajax.readyState==4) {
			result = ajax.responseText;
			if(!(mensaje=="") || !(mensaje==" ") || !(mensaje.length==0) ){
				alert(mensaje);
			}
			document.getElementById(destino).innerHTML=result;
		}		
		
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  var enviar="";
    for(var i=0;i<noms.length;i++){
      enviar+=noms[i]+"=";
      enviar+=vals[i]+"&";  
    }
	  ajax.send('&'+enviar);
}

function crearContenidosArregloConMensaje(pagina,nombres,valores,mensaje,destino){
	var noms=new Array();
    var vals=new Array();
    
	if(!(valores=="") && !(valores==" ") && !(valores.length==0) && !(valores==null) && !(valores=='vacio') ){
    	var noms=nombres.split(",");
        var vals=valores.split(",");
    }else{
    	var noms=nombres.split(",");
        
        for(var i=0;i<noms.length;i++){
        	vals[i]=document.getElementById(noms[i]).value;
        }
    }
    
    ajax=objetoAjax();
    ajax.open('POST',pagina,true);
    ajax.onreadystatechange=function() {
	if (ajax.readyState==1) {
		result = "Cargando...";
		document.getElementById(destino).innerHTML=result;
	}

	if (ajax.readyState==4) {
		result = ajax.responseText;
		if(!(mensaje=="") && !(mensaje==" ") && !(mensaje.length==0) && !(mensaje==null) && !(mensaje=='vacio') ){
			alert(mensaje);
		}
		document.getElementById(destino).innerHTML=result;
	}
  }
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
  var enviar="";
  for(var i=0;i<noms.length;i++){
    enviar+=noms[i]+"=";
    enviar+=vals[i]+"&";  
  }
  ajax.send('&'+enviar);
    
    
}

function crearContenidosArregloConMensaje2(paginaEnviaDatos,nombres,valores,destino,pagina2,nombres2,valores2,mensajeInicial,mensajeFinal) {
    var noms=new Array();
    var vals=new Array();
    
	if(!(valores=="") && !(valores==" ") && !(valores.length==0) && !(valores==null) && !(valores=='vacio') ){
    	var noms=nombres.split(",");
        var vals=valores.split(",");
    }else{
    	var noms=nombres.split(",");
        
        for(var i=0;i<noms.length;i++){
        	vals[i]=document.getElementById(noms[i]).value;
        }
    }
	
	
    ajax=objetoAjax();
    ajax.open('POST',paginaEnviaDatos,true);
    ajax.onreadystatechange=function() {
	if (ajax.readyState==1) {
		result = mensajeInicial;
		document.getElementById(destino).innerHTML=result;
	}

	if (ajax.readyState==4) {
		crearContenidosArregloConMensaje(pagina2,nombres2,valores2,mensajeFinal,destino)
		
	}
  }
  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
  var enviar="";
  for(var i=0;i<noms.length;i++){
    enviar+=noms[i]+"=";
    enviar+=vals[i]+"&";  
  }
  ajax.send('&'+enviar);
  
  
    
}



function metodoAgil2(pagina,nombres,valores,mensaje,pagina2){ 
      
      var noms=nombres.split(",");
      var vals=valores.split(",");
      
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				//document.getElementById(variable).value="";
				//alert(mensaje);
				//location.href = destino;
				if(!(mensaje=="") || !(mensaje==" ") || !(mensaje.length==0) ){
					alert(mensaje);
				}
				cargarContenido(pagina2);										
				//document.getElementById(modificar).innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&'+enviar);
}


function metodoAgil(pagina,variables,mensaje,pagina2){ 
      
      var noms=variables.split(",");
      var vals=new Array();
      for(var i=0;i<noms.length;i++){
      	vals[i]=document.getElementById(noms[i]).value;
      }
      
      
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				//document.getElementById(variable).value="";
				//alert(mensaje);
				//location.href = destino;
				if(!(mensaje=="") || !(mensaje==" ") || !(mensaje.length==0) ){
					alert(mensaje);
				}
				cargarContenido(pagina2);										
				//document.getElementById(modificar).innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&'+enviar);
}

function realizarOperacionConMensaje(pagina,variable,mensaje){ 
      var valor= document.getElementById(variable).value;
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById(variable).value="";
				alert(mensaje);
														
				//document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send("&"+variable+"="+valor);
}

function realizarOperacionConMensaje2(pagina,variable,mensaje){ 
      var valor= document.getElementById(variable).value;
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById(variable).value="";
				alert(mensaje);
														
				//document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send("&"+variable+"="+valor);
}


function realizarOperacion(pagina,variable){ 
      var valor= document.getElementById(variable).value;
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById(variable).value="";
				alert('Operación realizada con exito.');
														
				//document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send("&"+variable+"="+valor);
}


function nuevaPagina(pagina,variable){ 
      var valor= document.getElementById(variable).value;
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById(variable).value="";
				alert('Operación realizada con exito.');
														
				//document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send("&"+variable+"="+valor);
}

function cargarContenido(pagina){ 
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send();
}

function cargarBusqueda(nombre,valor,pagina){ 
        ajax=objetoAjax();
        ajax.open('POST',pagina,true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&'+nombre+'='+valor);
}

function cargarMenu(menu){ 
      ajax= objetoAjax();
	  ajax.open('POST', menu,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('menu').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send();
}

function crearContenidosArreglo(nombres,valores,pagina){
        var noms=nombres.split(",");
        var vals=valores.split(",");
        ajax=objetoAjax();
        ajax.open('POST',pagina,true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==1) {
			result = "Cargando...";
			document.getElementById('contenido').innerHTML=result;
		}

		if (ajax.readyState==4) {
			result = ajax.responseText;
			document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
      var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&'+enviar);
        
        
}

function comentario(nombres,valores,pagina){
        

        ajax=objetoAjax();
        ajax.open('GET',pagina,true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('comentario').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
      var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&formulario='+valoresEval+'&'+enviar);
        
        
}


function evaluar(nombres,valores,pagina){
        var valoresEval=[];
        var campos=document.evaluacion.elements;
        for(ii=0;ii<campos.length;ii++){
            var tmp1=campos[ii].value;
            tmp1=trim(tmp1);
            if(esNumero(tmp1)){
                valoresEval.push(tmp1);            
            }else{
                valoresEval.push("-1");            
            }
            
            
        }
        var noms=nombres.split(",");
        var vals=valores.split(",");
        ajax=objetoAjax();
        ajax.open('POST',pagina,true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
      var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&formulario='+valoresEval+'&'+enviar);
        
        
}

function crearContenidos(nombre,valor,pagina){
        //var valor= document.getElementById('numero_criterios').value;
        ajax=objetoAjax();
        ajax.open('POST',pagina,true);
        ajax.onreadystatechange=function() {
        if (ajax.readyState==1) {
			result = "Cargando...";
			document.getElementById('contenido').innerHTML=result;
		}

		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&'+nombre+'='+valor);
        
        
}


function crearCriterios(){
        var valor= document.getElementById('numero_criterios').value;
        ajax=objetoAjax();
        ajax.open('POST','ss-config/crearform.php',true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&numero_criterios='+valor);
}

function hola(){
    alert('Hola');    
}

function validarIni(){
    var enviar=0;
    var usuario=trim(document.sesion.usuario.value);
    var contrasenia=trim(document.sesion.contrasenia.value);
    
    //document.sesion.usuario.value=document.sesion.usuario.replace(trim(document.sesion.usuario.value));
    if(usuario.length==0){
        alert('Inserte su Usuario ');
        document.sesion.usuario.focus();
    }else if (usuario=="" ){
        alert('Inserte su Usuario ');
        document.sesion.usuario.focus();    
    }else{
        enviar+=1;
    }
    
    if(contrasenia.length==0 && usuario.charAt(0)!='z' && usuario.charAt(0)!='Z'){
        alert('Inserte su Contraseña');
        document.sesion.contrasenia.focus();
    }else if(contrasenia=="" && usuario.charAt(0)!='z' && usuario.charAt(0)!='Z'){
        alert('Inserte su Contraseña');
        document.sesion.contrasenia.focus();    
    }else {
        enviar+=1;
    }    
    if(enviar==2){
        document.forms.sesion.action="login.php";
        document.sesion.submit();
    }

}

function enviarEnter(oEvento, oFormulario){ 
    var iAscii; 
     
    if (oEvento.keyCode) 
        iAscii = oEvento.keyCode; 
    else if (oEvento.which) 
        iAscii = oEvento.which; 
    else 
        return false; 
         
    if (iAscii == 13) oFormulario.submit(); 

    return true; 
} 

function trim(cadena){
    return cadena.replace(/^\s+/g,'').replace(/\s+$/g,'');
}

function esNumero(valor1){
    //if(/^([0-9])*$/.test(valor1) && !isNaN(valor1)){
    if(!isNaN(valor1)){
        return true;
    }else{
        return false;
    }
}

function arregloFormulario(fmx){
    var valoresEval=[];
    var campos=fmx;
    for(ii=0;ii<campos.length;ii++){
        valoresEval.push(campos[ii].value);
    }

}

	function enviar_mail()
	{
		
		//var cuenta=trim(document.getElementById('cuenta_email').value);
		var estado=trim(document.getElementById('estado_email').value);
		var mensaje=trim(document.getElementById('mensaje_email').value);
		var titulo=trim(document.getElementById('titulo_email').value);
		var correo=trim(document.getElementById('un_email').value);
		var hay_correo=0;
		var enviar=0;
		if(titulo=="" || titulo==" " || titulo.length==0){
			alert("Debes ponerle titulo");
			document.getElementById('titulo_email').focus();
		}
		else
		{
			enviar+=1;
		}
		
		if(mensaje=="" || mensaje==" " || mensaje.length==0){
			alert("Te falta escribir el Mensaje");
			document.getElementById('mensaje_email').focus();
		}
		else
		{
			enviar+=1;
		}

		if(estado=="uno"){
			if(correo=="" || correo==" " || correo.length==0 ){
				alert("Debe insertar el correo electrónico o elegir un bloque.");
				document.getElementById('estado_email').focus();
				document.getElementById('un_email').focus();
			}else{
				hay_correo=1;
				enviar+=1;				
			}

			
		}else{
			if(correo=="" || correo==" " || correo.length==0 ){

			}else{
				hay_correo=1;
			
			}
			enviar+=1;
		}

		if(enviar==3)
		{
			ajax=objetoAjax();
        	ajax.open('POST','../PHPMailer/test_smtp_gmail_basic.php',true);
        	//showDialog('Se esta enviando....','Se esta enviando..','prompt', 0);
        	alert("Enviando...espere por favor!");
        	ajax.onreadystatechange=function() {
				if (ajax.readyState==4) {
				
					result = ajax.responseText;
					document.getElementById('mensaje_email').value="";
					document.getElementById('un_email').value="";
					document.getElementById('titulo_email').value="";
					document.getElementById('estado_email').selectedIndex=0;
					document.getElementById('contenido').innerHTML=result;
					alert("¡Enviando!");
					//showDialog('¡Enviando!',result,'prompt', 0);
				}
	  		}
	  		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  		ajax.send('&estado_email='+estado+'&mensaje_email='+mensaje+'&titulo_email='+titulo+'&correo='+correo+'&hay_correo='+hay_correo);
			
			
			//showDialog('Se esta enviando....','Se esta enviando..','prompt', 0);
			/*$.post("correo_comunidad.php",{mensaje_email:mensaje,titulo_email:titulo,estado_email:estado,correo:correo,hay_correo:hay_correo},function(data){
				document.getElementById('mensaje_email').value="";
				document.getElementById('un_email').value="";
				document.getElementById('titulo_email').value="";
				document.getElementById('estado_email').selectedIndex=0;
				//document.getElementById('cuenta_email').selectedIndex=0;
				//showDialog('¡Enviando!',data,'prompt', 0);				
				alert("¡Enviando!");
			});*/
		}
		
	}

function modificarUsuario(){
        var nivel= document.getElementById('nivel').value;
        var pass=trim(document.getElementById('pass').value);
        var nom=document.getElementById('nomb').value;
        var usr=document.getElementById('usr').value;
        var no=false;
        if(pass=="" || pass==" " || pass.length==0){
        	no=false;
        }else{
        	no=true;
        }
        
        ajax=objetoAjax();
        ajax.open('POST','modificarUsuario.php',true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&nivel='+nivel+'&pass='+pass+'&nom='+nom+'&usr='+usr+'&no='+no+'&modi=1');
}

function borrarUsuario(){
        var usr=document.getElementById('usr').value;
        ajax=objetoAjax();
        ajax.open('POST','modificarUsuario.php',true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&usr='+usr+'&borrar=1');
}

function crearUsuario(){
        var nivel= document.getElementById('nivel').value;
        var pass=trim(document.getElementById('pass').value);
        var nom=document.getElementById('nomb').value;
        var usr=document.getElementById('usr').value;
        
        ajax=objetoAjax();
        ajax.open('POST','modificarUsuario.php',true);
        ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				document.getElementById('contenido').innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&nivel='+nivel+'&pass='+pass+'&nom='+nom+'&usr='+usr+'&crear=1');
}

function eliminarAlumno(pagina,nombres,valores,mensaje,pagina2,uno,dos,tres){
	  var noms=nombres.split(",");
      var vals=valores.split(",");
      
      ajax= objetoAjax();
	  ajax.open('POST', pagina,true);
	  ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
				
				result = ajax.responseText;
				//document.getElementById(variable).value="";
				//alert(mensaje);
				//location.href = destino;
				if(!(mensaje=="") || !(mensaje==" ") || !(mensaje.length==0) ){
					alert(mensaje);
				}
				crearContenidosArreglo('carrera,periodo,criterioS',uno+','+dos+','+tres,'../ss-evaluacion/listaalumnos.php');										
				//document.getElementById(modificar).innerHTML=result;
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  var enviar="";
      for(var i=0;i<noms.length;i++){
        enviar+=noms[i]+"=";
        enviar+=vals[i]+"&";  
      }
	  ajax.send('&'+enviar);
}

function cerrarActa(carrera,periodo,criterio){
	  ajax= objetoAjax();
	  ajax.open('POST', 'cerrarActa.php',true);
	  ajax.onreadystatechange=function() {
		if(ajax.readyState==1){
			result="Trabajando... <img src='../images/ajax-loader.gif' />";
			document.getElementById('contenido').innerHTML=result;
		}
		if (ajax.readyState==4) {
				
				alert('Acta cerrada.');
				
				crearContenidosArreglo('carrera,periodo,criterioS',carrera+','+periodo+','+criterio,'../ss-evaluacion/listaalumnos.php');										
			
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&carrera='+carrera+'&periodo='+periodo+'&criterio='+criterio);
}

function abrirActa(carrera,periodo,criterio){
	  ajax= objetoAjax();
	  ajax.open('POST', 'abrirActa.php',true);
	  ajax.onreadystatechange=function() {
		if(ajax.readyState==1){
			result="Trabajando... <img src='../images/ajax-loader.gif' />";
			document.getElementById('contenido').innerHTML=result;
		}
		if (ajax.readyState==4) {
				
				alert('Acta abierta.');
				
				crearContenidosArreglo('carrera,periodo,criterioS',carrera+','+periodo+','+criterio,'../ss-evaluacion/listaalumnos.php');										
			
		}
	  }
	  ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
	  ajax.send('&carrera='+carrera+'&periodo='+periodo);
}