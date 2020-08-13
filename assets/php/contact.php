<?php

if(isset($_POST['message'])){
	
	$name = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
	$email = htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');
	//sanitize email
	$emailSanitized = filter_var($email, FILTER_SANITIZE_EMAIL);

	$message = htmlentities($_POST['message'], ENT_QUOTES, 'UTF-8');
    
	$emails = "you-mail@your-domain.com";
	
	$to      = $emails;
	$subject = 'Formulario de contacto del sitio';

	$headers = 'From: '. $email . "\r\n" .
    'Reply-To: '. $email . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

	$status = mail($to, $subject, $message, $headers);

	if($status == TRUE){	
		$res['sendstatus'] = 'done';
	
		//Edit your message here
		$res['message'] = 'El envío del formulario ha sido exitoso!';
    }
	else{
		$res['message'] = 'No se pudo enviar el correo. Por favor envíeme un correo electrónico a: nuestroemail@gmail.com';
	}
	echo json_encode($res);
}

?>