<?php
	
	
	session_start(); 
	
	$admin=$_SESSION['nombre'];
	$firmado="<br /><br /><p>Atte: <strong>$admin</strong></p>";
	$cuenta_email=$_POST['cuenta_email'];
	$estado_email=$_POST['estado_email'];
	$mensaje_email=$_POST['mensaje_email'];
	$titulo_email=trim($_POST['titulo_email']);
	$email=new Mail();
	
	$mensaje_email.=$firmado;
	$hay=$_POST['hay_correo'];
	$para_uno=trim($_POST['correo']);
	$con;
	echo 'inicia';
	//error_reporting(E_ALL);
    error_reporting(E_STRICT);
	
	date_default_timezone_set('America/Toronto');
	
	require_once('../clases/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail             = new PHPMailer();
	
	//$body             = file_get_contents('contents.html');
	$body=$mensaje_email;
	$body             = eregi_replace("[\]",'',$body);
	
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->Host       = "localhost"; // SMTP server
	$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "eess.fcays@gmail.com";  // GMAIL username
	$mail->Password   = "servicio1";            // GMAIL password
	
	$mail->SetFrom('eess_fcays@hotmail.com', 'Coordinación del Servicio Social');
	
	$mail->AddReplyTo("eess_fcays@hotmail.com","Coordinación del Servicio Social");
	
	$mail->Subject    = $titulo_email;
	
	$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	
	$mail->MsgHTML($body);
	
	//$address = "whoto@otherdomain.com";
	//$mail->AddAddress($address, "John Doe");
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
		
	
	
	if($hay==1){
		echo 'entro en 1';
		$mail->AddAddress($para_uno, $para_uno);
		
		if(!$mail->Send())
			{
				//mysql_query($sql2) or die(mysql_error());
				echo "Mailer Error: " . $mail->ErrorInfo;
			}else{
				echo "Message sent!";
			}
		
		
		
		

	}
	else
	{
		include_once '../script/php/functions.php';
		conectar();
		if($estado_email=='todos'){
			$sql="SELECT correo FROM cpmx3 ";
		}else{
			$sql="SELECT nombrealu,emailalu FROM alumno_ss_fca WHERE periodoalu LIKE '$estado_email' ";
			//$sql="SELECT correo,nick FROM cpmx3 WHERE estado='$estado_email' ";
		}
		echo 'entro en varios';
		$result=mysql_query($sql) or die(mysql_error());
		$validar=0; $total=0;
		while($row=mysql_fetch_array($result))
		{
			
			$total++;
			$para=trim($row['emailalu']);
			$nombreA=trim($row['nombrealu']);
			$mail->AddAddress($para, $nombreA);
			
			//$sql2="INSERT INTO mailing (para,twitter,titulo,sent,msg,con,enviado_por) values('$para','$nickd','$titulo_email',now(),'$mensaje_email','$con','$admin')";
			if(!$mail->Send())
			{
				//mysql_query($sql2) or die(mysql_error());
				echo "Mailer Error: " . $mail->ErrorInfo;
			}else{
				$validar++;
			}

		}

		if($validar==$total)
		{
			echo '<img src="images/clean.png" /><br />Se envio correctamente su email a todos los de <br />'.$estado_email;
			
		}
		else
		{
			echo 'No se envio correctamente su email a todos los de '.$estado_email;
		}

	}





/*if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}*/




?>

