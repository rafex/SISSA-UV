<?
include_once '../script/php/functions.php';
session_start();
conectar();
$sql="SELECT `periodo` FROM `configuraciones_ss_fca`";
$result=mysql_query($sql) or die(mysql_error());

?>

		
		<div id="refrescar">
			<h3>Manda un correo electrónico</h3>
			<p><form name="correoC" id="correoC" method="post" action="">
				Titulo: <input type="text" name="titulo_email" id="titulo_email" size="72" class="required" tabindex="1" autofocus />
				<br/><br/>				
				Para:
					<select name="estado_email" id="estado_email" size="1" class="required" tabindex="2" >
							<option value="uno" >Personal</option>
							
					    <? while($fila=mysql_fetch_array($result)){ ?>
        					<option value="<?echo $fila['periodo'];?>"><?echo $fila['periodo'];?></option>
    					<? } ?>

					</select>
				&nbsp; &nbsp; &nbsp; &nbsp;
				Correo: <input type="text" name="un_email" id="un_email" size="35" class="required" tabindex="3" />
				<br/><br/>
				<textarea name="mensaje_email" id="mensaje_email" rows="10" cols="77" class="required" tabindex="4" ></textarea>
				<br/><br/>
				
				<!--select name="cuenta_email" id="cuenta_email" size="1" class="required" tabindex="5" >
					<option value="1" selected="selected" >eess_fcays@hotmail.com</option>		
					
				</select-->
				
				<input type="button" value="Enviar" onclick="javascript:enviar_mail();" tabindex="6" />
			</form></p>
		</div>



