<?php

/**
 * Nous créons deux variables : $username et $password qui valent respectivement "Sdz" et "salut"
 */


	if( isset($_POST['email']) && isset($_POST['name']) ){

		if($_POST['math'] == $_POST['security']){
			$sender = $_POST['sender'];
			$name = $_POST['name'];
			$message = $_POST['message'];
			$email = $_POST['email'];

			$title = $_POST['titre'];
			$url = $_POST['url'];
			$except = $_POST['except'];

			$subject = $_POST['subject'];

			$subject = $subject.'['.$title.']';

			$message = str_replace('%NOM%', $name, $message);
			$message = str_replace('%EMAIL_FRIEND%', $email, $message);
			$message = str_replace('%URL_ARTICLE%', $url, $message);
			$message = str_replace('%TITLE_ARTICLE%', $title, $message);
			$message = str_replace('%EXCPET_ARTICLE%', $except, $message);

			$headers = "From: " . strip_tags($sender) . "\r\n";
//		$headers .= "Reply-To: ". strip_tags($sender) . "\r\n";
//		$headers .= "CC: ".$sender."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			mail($email, $subject, $message, $headers);

			echo 'Success';
		}else{
			echo 'Error';
		}


	}

?>