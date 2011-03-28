<?
include_once '../script/php/functions.php';

$cuantos=$_POST["cuantos"];
$nomcriterio=$_POST['nombre_criterio'];
$fechacreacion.=date('d')."_".date('m')."_".date('o');
conectar();
$nomcriterio=elimina_acentos($nomcriterio);
$nomcriterio=espacios_blancos($nomcriterio);


mysql_query("CREATE TABLE `evaluacion_$nomcriterio` (  `MatriculaAlu` VARCHAR(9) NOT NULL,  PRIMARY KEY (`MatriculaAlu`), FOREIGN KEY (`MatriculaAlu`) REFERENCES alumno_ss_fca (`MatriculaAlu`) ) COLLATE='latin1_spanish_ci' ENGINE=InnoDB ROW_FORMAT=DEFAULT;");


for($i=0;$i<$cuantos;$i++){
        echo "estoy en el for<br/>";
        $criterio=$_POST['criterio'.$i];
        $valor=$_POST['valor'.$i];
        $fechaA=$_POST['fechaA'.$i];        
        $fechaE=$_POST['fechaE'.$i]; 
        
        mysql_query("INSERT INTO criterios_ss_fca(nombreCriterio,evaluar,valor,fechaInicio,fechaEntrega) values ('".$nomcriterio."','".(utf8_decode($criterio=trim($criterio)))."',$valor,'$fechaA','$fechaE'); ") or die(mysql_error());                
        $criterio= elimina_acentos($criterio);
        $criterio = espacios_blancos($criterio);
        //mysql_query("INSERT INTO evaluacion_ss_fca(nombreCriterio,criterio) values ('".$nomcriterio."','".($criterio=trim($criterio))."'); ") or die(mysql_error());
        mysql_query("ALTER TABLE `evaluacion_$nomcriterio`  ADD COLUMN `fecha_$criterio` DATE NULL COMMENT 'fecha en la que se entrego el criterio: $criterio' AFTER `MatriculaAlu`,  
        ADD COLUMN `$criterio` VARCHAR(50) NULL COMMENT 'criterio evaluado' COLLATE 'latin1_spanish_ci' AFTER `fecha_$criterio`,  
        ADD COLUMN `nota_$criterio` VARCHAR(50) NULL COMMENT 'notas sobre el porque de la evaluacion obtenida en: $criterio' COLLATE 'latin1_spanish_ci' AFTER `$criterio`;") or die(mysql_error());
        
        
}


?>
