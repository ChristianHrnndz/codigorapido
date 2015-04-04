 <!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8"/>
	    <title>Código rápido</title>
	    <link rel="shortcut icon" href="img/favicon.png" />
	</head>
	<body>
	<?php
	extract($_POST);
	if(isset($correo)){
		//SMTP needs accurate times, and the PHP time zone MUST be set
		//This should be done in your php.ini, but this is how to do it if you don't have access to that
		date_default_timezone_set("America/Mexico_City");
		require '../phpmailer/PHPMailerAutoload.php';
		//Create a new PHPMailer instance
		$mail = new PHPMailer();
		//Tell PHPMailer to use SMTP
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;
		//Se define la codificación
		$mail->CharSet="UTF-8";
		//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
		//Set the hostname of the mail server
		$mail->Host="smtp.gmail.com";
		//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port=587;
		//Set the SMTP Secure
		$mail->SMTPSecure = 'tls';
		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
		//Username to use for SMTP authentication
		$mail->Username = "chg14edu@gmail.com";
		//Password to use for SMTP authentication
		$mail->Password = "141747laLO";
		//Set who the message is to be sent from
		$mail->setFrom('chg_eduardo@hotmail.com', 'Tratamientos Térmicos de Toluca');
		//Set an alternative reply-to address
		$mail->addReplyTo('chg_eduardo@hotmail.com', 'Tratamientos Térmicos de Toluca');
		//Set who the message is to be sent to
		$mail->addAddress("$correo", 'Estimado cliente');
		//Set the subject line
		$mail->Subject = 'Tratamientos Térmicos de Toluca';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML("<div>Su material a terminado su proceso.<br /> Puede pasar por el en un horario de 9:00 a.m a 6:00 p.m. <br />Puede realizar su pago haciendo una tranferencia al siguiente No. de cuenta:<br />Banamex: 12345678-4567890<br /><br />Gracias por elegirnos</div>");
		//Replace the plain text body with one created manually
		$mail->AltBody = 'Gracias por su visita Tratamientos Térmicos de Toluca';
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		    echo "<h1>Material terminado</h1>";
		}
	}
	else{
		echo "<h1>Ocurrio un error</h1>";
	}
	}
	?>
	</body>
</html>
