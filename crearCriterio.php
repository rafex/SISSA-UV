<? include('header.php') ?>

    <? include('menu.php') ?>
	<? include('derecho.php') ?>
	<div id="contenido">
	<? $campos=$_POST["numero_criterios"]; ?>
        <form method="post" action="ss-config/crearbd.php">
        <label><strong>Nombre del Criterio de Evaluación</strong>
        <input type="text"  name="nombre_criterio" tabindex="1" size="40" /></label>
<?
$j=0;
for($i=0;$i<$campos;$i++){
?>

        <label><strong>Criterio numero <? echo ($i+1); ?></strong>
        <input type="text"  name="criterio<? echo $i; ?>" tabindex="<? echo (++$j); ?>" size="50" /></label>
        <label>Valor del criterio <? echo ($i+1); ?> en (%)  
        <input type="text"  name="valor<? echo $i; ?>"  tabindex="<? echo (++$j);?>" size="5" /></label>
        <label>De:<input type="text" name="fechaA<? echo $i; ?>" id="fechaA<? echo $i; ?>" readonly="1" size="11" />
        <img src="images/img.gif" id="f_trigger_cA<? echo $i; ?>"
            style="cursor: pointer; border: 1px solid red;,"
            title="Date selector"
            onmouseover="this.style.background='red';"
            onmouseout="this.style.background=''" />
        <script type="text/javascript">
            Calendar.setup({
            inputField     :    "fechaA<? echo $i; ?>",
            ifFormat       :    "%Y-%m-%d",
            button         :    "f_trigger_cA<? echo $i; ?>",
            singleClick    :    false
            });
        </script></label>
        <label>Al:<input type="text" name="fechaE<? echo $i; ?>" id="fechaE<? echo $i; ?>" readonly="1" size="11" />
        <img src="images/img.gif" id="f_trigger_cB<? echo $i; ?>"
            style="cursor: pointer; border: 1px solid red;,"
            title="Date selector"
            onmouseover="this.style.background='red';"
            onmouseout="this.style.background=''" />
        <script type="text/javascript">
            Calendar.setup({
            inputField     :    "fechaE<? echo $i; ?>",
            ifFormat       :    "%Y-%m-%d",
            button         :    "f_trigger_cB<? echo $i; ?>",
            singleClick    :    false
            });
        </script></label>
<? } // aqui acaba el for?>         
        <input type="hidden" value="<? echo $campos; ?>" name="cuantos"/>
        <br/>
        <input type="submit" name="guardar" value="Guardar" tabindex="<? echo ($j+1); ?>" /></form>




	</div> <!-- Aqui termina Contenido -->

<? include('footer.php') ?>
