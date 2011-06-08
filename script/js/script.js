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
    
    if(contrasenia.length==0){
        alert('Inserte su Contraseña');
        document.sesion.contrasenia.focus();
    }else if(contrasenia==""){
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



