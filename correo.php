<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8"/>
	    <title>Código rápido</title>
	    <link rel="shortcut icon" href="assets/img/favicon.png" />
	</head>
	<body>
	<?php
	if(extract($_POST)){
		//SMTP needs accurate times, and the PHP time zone MUST be set
		//This should be done in your php.ini, but this is how to do it if you don't have access to that
		date_default_timezone_set("America/Mexico_City");
		require 'phpmailer/PHPMailerAutoload.php';
		
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
		$mail->setFrom("$email", "$name");
		//Set an alternative reply-to address
		$mail->addReplyTo("$email", "$name");
		//Set who the message is to be sent to
		$mail->addAddress('codrapmexico@gmail.com', 'Eduardo Hernández');
		//Set the subject line
		$mail->Subject = 'Código rápido';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->msgHTML("$message <br> <b>Teléfono:</br> $phone");
		//Replace the plain text body with one created manually
		$mail->AltBody = 'Comentario de un cliente';
		//send the message, check for errors
		if (!$mail->send()) {
		    echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Lo sentimos $name ocurrio un error al envíarse el mensaje.</div>";
		} else {
		    echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Gracias por comunicarse con nosotros $name.</div>";
		}
	}
	?>
	</body>
</html>