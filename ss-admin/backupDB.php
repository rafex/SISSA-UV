<?php 
// Añade tu codigo de autentificación aquí, etc. 
// ¿ Donde se almacena la copia? Debe ser escribible por el servidor web
// y estar fuera del directorio raiz de la web, para que nadie pueda
// bajarse tu BD desde su navegador
define('BACKUPDIR', '/var/www/privatedata/');
// para crear enlaces a esta pagina ( accion del formulario, etc.)
define('THISPAGE', $_SERVER['PHP_SELF']);

 /**** ALGUNAS FUNCIONES ****/
function doHeader($title) { 
// crea una encabezado de página sencillo.
?>
<html><head><title>
<?php echo $title;?>
</title></head><body><?php} function doFooter() { 
// crea un pie de página sencillo
?></body></html><?php}
// si la variable filename en POST no está vacia, es que se ha enviado
// el formularioif
(!empty($_POST['filename'])) { 
// ahora validaremos y verificaremos las entradas  // para saber lo que tenemos y abortar si hay algo mal 
$errors = array();
$n = 0;	
/* pondremos cualquier error dentro de este array, y al final
 los listaremos todos para que los vea el usuario
 y pueda corregirlos	*/ 
if (empty($_POST['filename'])) { 
// no hay nombre de fichero 
$errors[$n] = "Debe introducir un nombre de fichero.";
 $n++;
 	} if (empty($_POST['mysqluser'])) { 
// no hay usuario MySQL  
$errors[$n ] = "Debe introducir un nombre de usuario MySQL.";
 $n++;	} if (empty($_POST['mysqlpass'])) { 
// no hay password MySQL  
$errors[$n] = "Debe introducir un password MySQL .";
 $n++;	} 
// Ha seleccionado copiar una BD, pero no han dicho cual if 
($_POST['backupall'] == 'false' AND  empty($_POST['backupwhichdb'])) 
{ $errors[$n] = "Has selecciona copiar una base de datos, ".
"pero no especificaste cual.";	      
$n++;
 } if ($n > 0) { 
// Si hubo errores en la fase de validacion... 
// muestra una pagina de error
doHeader('Remote Database Backup');
?><h1>Remote Database Backup</h1>
<h2>No se pudo realizar la copia.</h2>
<ul>
// recorre los errores 
<?php foreach ($errors as $err) { ?><li>
<?php echo $err;
 // y muestra su texto ?>
</li><?php } ?> </ul> 
<a href="<?php echo THISPAGE;?>">
Volver al formulario de Backup</a>		
<?php doFooter();
 die();
 // sale del script } // Si estamos aqui, es que se ha acabado bien la validación 
// hacemos "escape shell" a los argumentos para evitar
// la inyección de código 
// recuerda que esto es solo seguridad basica, se deberian
// añadir mas capas para mayor seguridad 
$_POST['filename'] = escapeshellcmd($_POST['filename']);
 $_POST['mysqluser'] = escapeshellarg($_POST['mysqluser']);
 $_POST['mysqlpass'] = escapeshellcmd($_POST['mysqlpass']);
 $_POST['backupwhichdb']=escapeshellarg($_POST['backupwhichdb']);
 	// Queremos copiar todas las bases de datos? 
$backupall = ($_POST['backupall'] == 'false') ? false : true;
 	// Si queremos copiar todas, ponemos esto con -A en el comando,
// sino, lo ponemos con el nombre de la base de datos a copiar 
$dbarg = $backupall ? '-A' : $_POST['backupwhichdb'];
 	// formamos el comando a ejecutar 
$command = "mysqldump ".$dbarg." -u ".$_POST['mysqluser']. " -p".$_POST['mysqlpass']." -r "".BACKUPDIR.$_POST['filename']. "" 2>&1"; 	
// creamos una cabecera y mostramos el progreso al usuario
// Podria tomar su tiempo
doHeader('Remote Database Backup'); 
?><h1>Ejecutando el backup, por favor espere...</h1><?php 	
// execute the command we just set up 
system($command); 	
// si eligieron comprimir con bzip, entonces se hace if 
($_POST['bzip'] == 'true') { system('bzip2 "'.BACKUPDIR.$_POST['filename'].'"');
 } 
// OK, terminamos. Digale al usuario lo que ha pasado.
// Si ocurrio algun error, se muestran en la llamada a system()
?><h2>Comando ejecutado.
Si hubo errores, Se mostrarán arriba.</h2>
<a href="<?php echo THISPAGE;?>">
Volver al formulario de Backup</a>
<?php 	
// pretty footer
doFooter(); 
// y salidos, hemos terminado! 
die();} 
// Si el formulario no se envió, entonces se muestra al usuario 
// por primera vez con su cabecera
doHeader('Remote Database Backup');
?><h1>Remote Database Backup</h1><p><em><strong>Por favor:</strong>
una vez pulse Crear, la copia podría durar unos 15 seg. para que se cree.
La página no se cargará inmediatamente, ten paciencia.</em></p>
<form name="dbbackup" method="post" action="<?php echo THISPAGE;?>">Nombre del fichero: <strong>
<?php echo BACKUPDIR;?></strong>
<input type="text" name="filename" value="<?php echo date('dMY_H.i.s').'.sql';?>" /><br />
<input type="checkbox" name="bzip" value="true" id="bzipTick" />
<label for="bzipTick">Usar Bzip2 para compresion</label><br />
<br />Nombre de usuario MySQL: <input type="text" name="mysqluser" value="" />
<br />Password MySQL: <input type="password" name="mysqlpass" value="" /><br />
<br />Backup ¿ de que ?<br /><input type="radio" name="backupall" value="true" id="backupallTrue" />
<label for="backupallTrue">Todas las bases de datos</label><br />
<input type="radio" name="backupall" value="false" id="backupallFalse" />
<label for="backupallFalse">Una en especifico</label> <input type="text" name="backupwhichdb" value="" />
<br /><br /><br /><input type="submit" value="Crear" /></form> <?php // el pie de páginadoFooter();  ?>
