<?php @ session_start();  ?>
<html>
<head>
<title>PHPMailer - SMTP (Gmail) basic test</title>
</head>
<body>

<?php

	
	$admin=$_SESSION['nombre'];
	$firmado="<br /><br /><p>Atte: <strong>$admin</strong></p>";
	$cuenta_email=$_POST['cuenta_email'];
	$estado_email=$_POST['estado_email'];
	$mensaje_email=$_POST['mensaje_email'];
	$titulo_email=trim($_POST['titulo_email']);
	
	
	$mensaje_email.=$firmado;
	$hay=$_POST['hay_correo'];
	$para_uno=trim($_POST['correo']);
//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /></head><body style="margin: 10px;">
<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 15px;">
<div align="center"><img src="http://www.uv.mx/images/escudo.jpg"/></div><br/>
<br>
<h3>Coordinaci&oacute;n de la Experiencia Educativa del Servicio Social de FCAyS</h3><br/>
<br>';
$body .=$mensaje_email;
$body             .= '</div></body></html>';
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

$mail->SetFrom('eess.fcays@gmail.com', 'Coordinacion de la EE Servicio Social FCAyS');

$mail->AddReplyTo('eess.fcays@gmail.com','Coordinacion de la EE Servicio Social FCAyS');

$mail->Subject    = $titulo_email;

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

//$address = "rulothevita@gmail.com";

	if($hay==1){
		
		$mail->AddAddress($para_uno, $para_uno);
		
		if(!$mail->Send()) {
  			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
  			echo "Message sent!";
		}
	}else{
		include_once '../script/php/functions.php';
		conectar();
		$sql="SELECT nombrealu,emailalu FROM alumno_ss_fca WHERE periodoalu ='$estado_email' ";
		
		$result=mysql_query($sql) or die(mysql_error());
		$validar=0; $total=0;
		while($row=mysql_fetch_array($result))
		{
			
			
			$para=trim($row['emailalu']);
			$nombreA=trim($row['nombrealu']);
			if(empty($para)){
				continue;
			}else{
				$total++;
			}
			//echo '*'.$para.'<br>';
			
			$mail->AddAddress($para, $nombreA);
			
			
			if(!$mail->Send())
			{
				//mysql_query($sql2) or die(mysql_error());
				echo "Mailer Error: " . $mail->ErrorInfo;
			}else{
				$mail->ClearAddresses(); 
				$validar++;
			}

		}

		if($validar==$total)
		{
			echo '<img src="../images/clean.png" /><br />Se envio correctamente su email a todos los de <br />'.$estado_email;
			echo "Message sent!";
		}
		else
		{
			echo 'No se envio correctamente su email a todos los de '.$estado_email.' solo se enviaron '.$validar;
		}
	}

/*$mail->AddAddress($para_uno, "John Doe");

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
} */

?>

</body>
</html>
