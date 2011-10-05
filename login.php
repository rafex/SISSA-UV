<?
@ include_once 'script/php/functions.php';
include_once 'clases/sesion.php';
@ session_start();
$usr=strtolower($_POST['usuario']);
$pw=$_POST['contrasenia'];
$c=$_GET['cerrar'];
$sesion= new Sesion();

if($usr[0]=='z')
{
	conectar();
	$matricula=substr($usr,1);
	$periodo;
	$hayDatos=false;
        $query="SELECT EvaluacionHist,periodoalu FROM historial_alumno_ss_fca WHERE matriculaalu='$matricula';";
        $result=mysql_query($query) or die(mysql_error());
        $hayDatos=mysql_num_rows($result);
        if($hayDatos<=0){
        	$hayDatos=true;
        }
        if($hayDatos){
        	$query="SELECT periodoalu FROM alumno_ss_fca WHERE matriculaalu='$matricula';";
        	$result=mysql_query($query) or die(mysql_error());
        	$rows=mysql_fetch_array($result);
        	$periodo=$rows['periodoalu'];
        	
        }else{
        	while ($rows=mysql_fetch_array($result))
        	{
	        	$calif=$rows['EvaluacionHist'];
	        	if(empty($calif)){
	        		$periodo=$rows['periodoalu'];
	        	}
	        }
        }
      
	$sql="select nombrealu,passalu from alumno_ss_fca where matriculaalu='$matricula' and periodoalu='$periodo' limit 1; ";
	$result=mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($result)==1){
		$datos=mysql_fetch_array($result);
		$nombre=$datos['nombrealu'];
		$pass=$datos['passalu'];
		
		if(empty($pass) )
		{
			$_SESSION['matricula']=$matricula;
			?>
	        <script>
				location.href = "ss-estudiantes/nuevoPass.php";
			</script>
			<? 
		}
		else
		{
			
			if($sesion->iniciarAlu($matricula,$pw))
			{
			
				?>
	            <script>
					location.href = "ss-estudiantes/index.php";
				</script>
				<?  	
				
			}
			else
			{
				?>
			    <script>
					location.href = "errorsesion.php";
				</script>
				<? 
			}
			
		}
		
		
	}
	else
	{
		?>
	    <script>
			location.href = "errorsesion.php";
		</script>
		<?  		
	}
		
	
	
}else{

	if(!empty($usr) && !empty($pw))
	{
	
		//$sesion= new Sesion();
		
		if($sesion->iniciar($usr,$pw))
		{
			
			if($_SESSION['nivel']=='admin')
			{ ?>
	        	<script>
					location.href = "ss-admin/index.php";
				</script>
	<?  	} 
			elseif($_SESSION['nivel']=='evaluador'){ ?>
	            <script>
					location.href = "ss-evaluacion/index.php";
				</script>
	<?  	}
		}
		else
		{
	?>
	            <script>
					location.href = "errorsesion.php";
				</script>
	<?  		
			//header ("Location: errorsesion.php");
		}
	
	} // fin del if que inicia sesion de los administradores y evaluadores del sistema
	
} // fin de if para identificar si es alumno o no

if(!empty($c))
{
	if($c==1)
	{
		$sesion->cerrar();
?>
            <script>
				location.href = "index.php";
			</script>
<?		
		//header ("Location: index.php");
	}
}
?>
