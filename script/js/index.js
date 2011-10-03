function asignaVariables()
{
	// Funcion que asigna variables que se usan a lo largo de las funciones	
	v=1; nuevaBusqueda=1; busqueda=null; ultimaBusquedaNula=null;
	divLista=document.getElementById("lista");
	inputLista=document.getElementById("input_2");
	elementoSeleccionado=0;
	ultimoIdentificador=0;
	alert("hola mundo");
}

function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false; 
	try 
	{ 
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
	}
	catch(e)
	{ 
		try
		{ 
			// Creacion del objet AJAX para IE 
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
		catch(E) { xmlhttp=false; }
	}
	if (!xmlhttp && typeof XMLHttpRequest!="undefined") { xmlhttp=new XMLHttpRequest(); } 

	return xmlhttp; 
}

function eliminaEspacios(cadena)
{
	var x=0, y=cadena.length-1;
	while(cadena.charAt(x)==" ") x++;	
	while(cadena.charAt(y)==" ") y--;	
	return cadena.substr(x, y-x+1);
}

function nuevoDato()
{
	/* Funcion encargada del input de la izquierda. No interfiere para nada en la funcionalidad de
	la lista desplegable */
	var divMensaje=document.getElementById("error");
	var inputIngreso=document.getElementById("input_1");
	var boton=document.getElementById("boton_1");
	var valor=inputIngreso.value;

	// Reinicio las variables del input 2
	inputLista.value=""; nuevaBusqueda=1; busqueda=null; ultimaBusquedaNula=null;

	// Limpio posibles mensajes que haya en el div
	divMensaje.innerHTML="";

	// Saco los espacios en blanco al comienzo y al final de la cadena
	valor=eliminaEspacios(valor);
	
	// Valido con una expresion regular el contenido de lo que el usuario ingresa
	var reg=/(^[a-zA-Z0-9.@ ]{4,40}$)/;
	if(!reg.test(valor)) 
	{
		divMensaje.innerHTML="El texto ingresado contiene caracteres o longitud inv�lida";
	}
	else
	{
		// Deshabilito el boton y el input para evitar dobles ingresos
		boton.disabled=true; inputIngreso.disabled=true; inputLista.disabled=true;
		inputIngreso.value="Ingresando...";
	
		var ajax=nuevoAjax();
		ajax.open("POST", "index_proceso.php", true);
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		ajax.send("ingreso="+valor);
			
		ajax.onreadystatechange=function()
		{
			if (ajax.readyState==4)
			{
				// Borro el contenido del input
				inputIngreso.value="";
				// Habilito campos y boton nuevamente
				boton.disabled=false; inputIngreso.disabled=false; inputLista.disabled=false;
				divMensaje.innerHTML=ajax.responseText;
			}
		}
	}
}

function formateaLista(valor)
{
	// Funcion encargada de ir colocando en negrita las palabras y asignarle un ID a los elementos
	var x=0, verificaExpresion=new RegExp("^("+valor+")", "i");
	
	while(divLista.childNodes[x]!=null)
	{
		// Asigo el ID para reconocerlo cuando se navega con el teclado
		divLista.childNodes[x].id=x+1;
		// Coloco en cada elemento de la lista en negrita lo que se haya ingresado en el input
		divLista.childNodes[x].innerHTML=divLista.childNodes[x].innerHTML.replace(verificaExpresion, "<b>$1</b>");
		x++;
	}
}

function limpiaPalabra(palabra)
{
	// Funcion encargada de sacarle el codigo HTML de la negrita a las palabras
	palabra=palabra.replace(/<b>/i, "");
	palabra=palabra.replace(/<\/b>/i, "");
	return palabra;
}

function coincideBusqueda(palabraEntera, primerasLetras)
{
	/* Funcion para verificar que las primeras letras de busquedaActual sean iguales al
	contenido de busquedaAnterior. Se devuelve 1 si la verificacion es afirmativa */
	if(primerasLetras==null) return 0;
	var verificaExpresion=new RegExp("^("+primerasLetras+")", "i");
	if(verificaExpresion.test(palabraEntera)) return 1;
	else return 0;
}

function nuevaCadenaNula(valor)
{
	/* Seteo cual fue la ultima busqueda que no arrojo resultados siempre y cuando la cadena
	nueva no comience con las letras de la ultima cadena que no arrojo resultados */
	if(coincideBusqueda(valor, ultimaBusquedaNula)==0) ultimaBusquedaNula=valor;
}

function busquedaEnBD()
{
	/* Funcion encargada de verificar si hay que buscar el nuevo valor ingresado en la base
	de datos en funcion de los resultados obtenidos en la ultima busqueda y en base a que
	la cadena bsucada anteriormente este dentro de la nueva cadena */
	var valor=inputLista.value;
	
	if((coincideBusqueda(valor, busqueda)==1 && nuevaBusqueda==0) || coincideBusqueda(valor, ultimaBusquedaNula)==1) return 0;
	else return 1;
}

function filtraLista(valor)
{
	// Funcion encargada de modificar la lista de nombres en base a la nueva busqueda
	var x=0;

	while(divLista.childNodes[x]!=null)
	{
		// Saco la negrita a los elementos del listado
		divLista.childNodes[x].innerHTML=limpiaPalabra(divLista.childNodes[x].innerHTML);
		if(coincideBusqueda(limpiaPalabra(divLista.childNodes[x].innerHTML), valor)==0)
		{
			/* Si remuevo el elemento x, el elemento posterior pasa a ocupar la posicion de
			x, entonces quedaria sin revisar. Por eso disminuyo 1 valor a x */
			divLista.removeChild(divLista.childNodes[x]);
			x--;
		}
		x++;
	}
}

function reiniciaSeleccion()
{
	mouseFuera(); 
	elementoSeleccionado=0;
}

function navegaTeclado(evento)
{
	var teclaPresionada=(document.all) ? evento.keyCode : evento.which;
	
	switch(teclaPresionada)
	{
		case 40:
		if(elementoSeleccionado<divLista.childNodes.length)
		{
			mouseDentro(document.getElementById(parseInt(elementoSeleccionado)+1));
		}
		return 0;
		
		case 38:
		if(elementoSeleccionado>1)
		{
			mouseDentro(document.getElementById(parseInt(elementoSeleccionado)-1));
		}
		return 0;
		
		case 13:
		if(divLista.style.display=="block" && elementoSeleccionado!=0)
		{
			clickLista(document.getElementById(elementoSeleccionado))
		}
		return 0;
		
		default: return 1;
	}
}	

function rellenaLista()
{
	var valor=inputLista.value;

	// Valido con una expresion regular el contenido de lo que el usuario ingresa
	var reg=/(^[a-zA-Z0-9.@ ]{2,40}$)/;
	if(!reg.test(valor)) divLista.style.display="none";
	else
	{
		if(busquedaEnBD()==0)
		{	
			// Si no hay que buscar el valor en la BD
			busqueda=valor;
	
			// Hago el filtrado de la nueva cadena ingresada
			filtraLista(valor);
			// Si no quedan elementos para mostrar en la lista
			if(divLista.childNodes[0]==null) { divLista.style.display="none"; nuevaCadenaNula(valor); }
			else { reiniciaSeleccion(); formateaLista(valor); }
		}
		else
		{	
			/* Si se necesita verificar la base de datos, guardo el patron de busqueda con el que se
			busco y luego recibo en una variable si existen mas resultados de los que se van a mostrar */
			busqueda=valor;

			var ajax=nuevoAjax();
			ajax.open("POST", "index_proceso.php?", true);
			ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("busqueda="+valor);
		
			ajax.onreadystatechange=function()
			{	
				if (ajax.readyState==4)
				{
					if(!ajax.responseText) { divLista.style.display="none"; }
					else 
					{
						var respuesta=new Array(2);
						respuesta=ajax.responseText.split("&");
				
						/* Obtengo un valor que representa si tengo que ir a BD en las proximas 
						busquedas con cadena similar */
						nuevaBusqueda=respuesta[0];
				
						// Si se obtuvieron datos los muestro
						if(respuesta[1]!="vacio") 
						{ 
							divLista.style.display="block"; divLista.innerHTML=respuesta[1]; 
							// Coloco en negrita las palabras
							reiniciaSeleccion();
							formateaLista(valor); 
						}
						// En caso contrario seteo la busqueda actual como una busqueda sin resultados
						else nuevaCadenaNula(valor);
					}
				}
			}
		}
	}
}

function clickLista(elemento)

{
	/* Se ejecuta cuando se hace clic en algun elemento de la lista. Se coloca en el input el
	valor del elemento clickeado */
	v=1;
	valor=limpiaPalabra(elemento.innerHTML); 
	busqueda=valor; inputLista.value=valor;
	divLista.style.display="none"; elemento.className="normal";
}

function mouseFuera()
{
	// Des-selecciono el elemento actualmente seleccionado, si es que hay alguno
	if(elementoSeleccionado!=0 && document.getElementById(elementoSeleccionado)) document.getElementById(elementoSeleccionado).className="normal"; 
}

function mouseDentro(elemento)
{
	mouseFuera();
	elemento.className="resaltado";
	// Establezco el nuevo elemento seleccionado
	elementoSeleccionado=elemento.id;
}