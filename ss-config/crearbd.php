<?
@ include_once '../script/php/functions.php';

$cuantos=$_POST["cuantos"];
$nomcriterio=$_POST['nombre_criterio'];
$fechacreacion.=date('d')."_".date('m')."_".date('o');
conectar();
$nomcriterio=elimina_acentos($nomcriterio);
$nomcriterio=espacios_blancos($nomcriterio);
$nomcriterio=strtolower($nomcriterio);

mysql_query("CREATE TABLE `evaluacion_$nomcriterio` (  `MatriculaAlu` VARCHAR(9) NOT NULL,  PRIMARY KEY (`MatriculaAlu`), FOREIGN KEY (`MatriculaAlu`) REFERENCES alumno_ss_fca (`MatriculaAlu`) ) COLLATE='latin1_spanish_ci' ENGINE=InnoDB ROW_FORMAT=DEFAULT;");

$criterios=array();
for($ii=0;$ii<$cuantos;$ii++){
    array_push($criterios,$_POST['criterio'.$ii]);
}

for($i=0;$i<$cuantos;$i++){
       
        $sql;        
        //$criterio=$_POST['criterio'.$i];
        $valor=$_POST['valor'.$i];
        $fechaA=$_POST['fechaA'.$i];        
        $fechaE=$_POST['fechaE'.$i]; 
        $sql="INSERT INTO criterios_ss_fca(nombreCriterio,evaluar,valor,fechaInicio,fechaEntrega) values ('".$nomcriterio."','".(utf8_decode(trim($criterios[$i])))."',$valor,'$fechaA','$fechaE'); ";
        mysql_query($sql) or die(mysql_error());                
        $criterio[$i]= elimina_acentos($criterio[$i]);
        $criterio[$i] = espacios_blancos($criterio[$i]);
        //mysql_query("INSERT INTO evaluacion_ss_fca(nombreCriterio,criterio) values ('".$nomcriterio."','".($criterio=trim($criterio))."'); ") or die(mysql_error());
                
        if($i==0){
            $sql="ALTER TABLE `evaluacion_$nomcriterio`  ADD COLUMN `".$criterios[$i]."` FLOAT NULL DEFAULT '-1' COMMENT 'criterio evaluado' AFTER `MatriculaAlu` ;";
        }else{
            $sql="ALTER TABLE `evaluacion_$nomcriterio`  ADD COLUMN `".$criterios[$i]."` FLOAT NULL DEFAULT '-1' COMMENT 'criterio evaluado' AFTER `".$criterios[$i-1]."` ;";
        }
		
		mysql_query($sql) or die(mysql_error());
		
		if($i==($cuantos-1)){
			$sql="ALTER TABLE `evaluacion_$nomcriterio`  ADD COLUMN `PeriodoAlu` VARCHAR(50) NULL DEFAULT NULL COMMENT 'Periodo en el que fue evaluado' AFTER `".$criterios[$i]."` ;";
			mysql_query($sql) or die(mysql_error());
		}
        
        
}
?>
<? include_once('../header.php') ?>

    <? include_once('../menus/menu_admin.html') ?>
	<? include_once('../derecho.php') ?>
    <div id="contenido">

    Listo.!
	</div> <!-- Aqui termina Contenido -->

<? include('../footer.php') ?>
