	
$(document).ready(function(){
	//parametros principales
	
	var contenidoHTML = '<h1>Ventana Modal Basica</h1><p>Un ventana modal con la configuracion basica necesaria para su practico funcionamiento. Bastara con especificar el contenido a mostrar (en formato de marcas HTML) y las dimensiones de la ventana: ancho y alto. Mejoras mas adelante por ahora eso es todo amigos!</p><p><a href=\'http://www.ribosomatic.com/\'>Mas detalles...</a></p><button onclick=\"closeModal()\">Cerrar</button>';
	
	var ancho = 600; 
	var alto = 250;

	$('.modal').click(function(){
	//function showModal(){
		// fondo transparente
		var bgdiv = $('<div>').attr({
					className: 'bgtransparent',
					id: 'bgtransparent'
					});

		$('#contenido').append(bgdiv);
		
		var wscr = $(window).width();
		var hscr = $(window).height();
				
		$('#bgtransparent').css("width", wscr);
		$('#bgtransparent').css("height", hscr);
		
		
		// ventana flotante
		var moddiv = $('<div>').attr({
					className: 'bgmodal',
					id: 'bgmodal'
					});	
		
		$('#contenido').append(moddiv);
		$('#bgmodal').append(contenidoHTML);
		
		$(window).resize();
	});

	$(window).resize(function(){
		// dimensiones de la ventana
		var wscr = $(window).width();
		var hscr = $(window).height();

		// estableciendo dimensiones de background
		$('#bgtransparent').css("width", wscr);
		$('#bgtransparent').css("height", hscr);
		
		// definiendo tamaño del contenedor
		$('#bgmodal').css("width", ancho+'px');
		$('#bgmodal').css("height", alto+'px');
		
		// obtiendo tamaño de contenedor
		var wcnt = $('#bgmodal').width();
		var hcnt = $('#bgmodal').height();
		
		// obtener posicion central
		var mleft = ( wscr - wcnt ) / 2;
		var mtop = ( hscr - hcnt ) / 2;
		
		// estableciendo posicion
		$('#bgmodal').css("left", mleft+'px');
		$('#bgmodal').css("top", mtop+'px');
	});
	
	$(window).keyup(function(event){
   		if (event.keyCode == 27) {
        	//falta implementar
   		}
	});
	
 });
	
function closeModal(){
	$('#bgmodal').remove();
	$('#bgtransparent').remove();
}


function mostrar() { 
   $("#pop").fadeIn('slow'); 
} //checkHover

$(document).ready(function (){

   //Conseguir valores de la img 
   var img_w = $("#pop img").width() + 10; 
   var img_h = $("#pop img").height() + 28; 
    
   //Darle el alto y ancho 
   $("#pop").css('width', img_w + 'px'); 
   $("#pop").css('height', img_h + 'px'); 
    
   //Esconder el popup 
   $("#pop").hide();

   //Consigue valores de la ventana del navegador 
   var w = $(this).width(); 
   var h = $(this).height(); 
    
   //Centra el popup    
   w = (w/2) - (img_w/2); 
   h = (h/2) - (img_h/2); 
   $("#pop").css("left",w + "px"); 
   $("#pop").css("top",h + "px");

   //temporizador, para que no aparezca de golpe 
   setTimeout("mostrar()",1500);

   //Función para cerrar el popup 
   $("#pop").click(function (){ 
      $(this).fadeOut('slow'); 
   });

});

