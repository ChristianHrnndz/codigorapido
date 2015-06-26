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
		//Set character encoding
		$mail->CharSet = 'UTF-8';
		//Set who the message is to be sent from
		$mail->setFrom("$email", "$name");
		//Set an alternative reply-to address
		$mail->addReplyTo("$email", "$name");
		//Set who the message is to be sent to
		$mail->addAddress('codrapmexico@gmail.com', 'Código rápido');
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
			if ($email == "mlpc.b2@outlook.com" || $email == "marie93lpcon1008@gmail.com") {
				echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Gracias mi amor por toda tu ayuda</div>";
			} else {
		    	echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>Gracias por comunicarse con nosotros $name.</div>";
			}
		}
	}
?>
</body>
</html>