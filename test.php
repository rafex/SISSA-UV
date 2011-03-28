<? include('header.php') ?>

        <div class="izquierda">

	        <ul>
		        <li><a href="index.php">Inicio</a></li>
		        <li><a href="#" onclick="cargarContenido('ss-content/tabla.html');" >Alumnos</a></li>
		        <li><a href="#" onclick="cargarContenido('ss-evaluacion/evaluacion.html');" >Evaluar</a></li>
		        <li><a href="#" onclick="cargarContenido('ss-config/criterios.html');" >Configuraciones</a></li>
		
	        </ul>
        </div><!-- Aqui termina Izquierda -->
	<!--div class="derecha">
		<p>aquí se podría colocar una imágen, anuncios, más vínculos, las típicas imagenes de Sindicar RSS, odio a neo_jp, etc...</p>
		<a href="http://jigsaw.w3.org/css-validator/"><img style="border:0;width:88px;height:31px"    src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!" /></a>
		<hr/>
		<a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
	</div-->
	<div id="contenido">
		<?
        $campos=4;
        $html="<form method=\"post\" action=\"ss-config/crearbd.php\">\n";
        $j=0;
        for($i=0;$i<$campos;$i++){

                $html.=" <label>Criterio numero ".($i+1)." \n  <input type=\"text\"  name=\"criterio$i\" tabindex=\" ".(++$j)."\" size=\"50\" /> \n </label>\n" ;
                $html.="<label>Valor en (%) \n  <input type=\"text\"  name=\"valor$i\"  tabindex=\" ".(++$j)."\" size=\"3\" />\n </label>\n ";

                $html.="<input type=\"text\" name=\"fecha$i\" id=\"fecha$i\" readonly=\"1\" />
<img src=\"images/img.gif\" id=\"f_trigger_c$i\"
     style=\"cursor: pointer; border: 1px solid red;,\"
     title=\"Date selector\"
     onmouseover=\"this.style.background='red';\"
     onmouseout=\"this.style.background=''\" />
<script type=\"text/javascript\">
    Calendar.setup({
        inputField     :    \"fecha$i\",
        ifFormat       :    \"%Y-%m-%d\",
        button         :    \"f_trigger_c$i\",
        singleClick    :    false
    });
</script>";
         
        }
        $html.="\n <input type=\"submit\" name=\"guardar\" value=\"Guardar\" tabindex=\"".($j+1)."\" />\n</form>" ;
        echo $html ;
        
?>
	
	<!--div class="principal">
		<h2>Título del contenido</h2>
		<h3>Subapartado</h3>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>
		<p>Escribo algo para rellenar...</p>

	</div-->
	</div> <!-- Aqui termina Contenido -->
	






<? include('footer.php') ?>
