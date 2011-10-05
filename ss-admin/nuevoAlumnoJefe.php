<?php 
$matricula=$_POST['matricula'];
$periodo=$_POST['periodo'];
?>
<div id="datos">

<h3>Datos del jefe directo</h3>
<input type="hidden" id="matricula" value="<?php echo $matricula;?>" />
<input type="hidden" id="periodo" value="<?php echo $periodo;?>" />
<p>
<strong>Nombre:</strong> <input type="text" id="NombreEnc" size="40" />	
<br /><br />
<strong>Puesto:</strong> <input type="text" id="PuestoEnc" size="40" />
<br /><br />
<strong>Correo electrónico:</strong> <input type="text" id="EmailEnc" size="40" /> 

</p>
<input name="modificar" id="modificar" type="button" value="Cancelar" onclick="javascript:crearContenidosArregloConMensaje('verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo;?>','','contenido');" />
<input name="modificar" id="modificar" type="button" value="Guardar" onclick="javascript:crearContenidosArregloConMensaje2('cargarAlumnoJefe.php','matricula,periodo,NombreEnc,PuestoEnc,EmailEnc','vacio','contenido','verAlumno.php','matricula,periodo','<?php echo $matricula; ?>,<?php echo $periodo;?>','Guardando...','Datos del Servicio modificados del alumno: <?php echo $matricula; ?>')" />

</div>
