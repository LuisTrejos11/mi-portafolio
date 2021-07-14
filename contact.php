<?php
 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
     
    if(isset($_POST['name'])) {
      $visitor_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['subject'])) {
        $email_title = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }
     
     
    if(isset($_POST['message'])) {
        $visitor_message = htmlspecialchars($_POST['message']);
    }
     
   

        $recipient = "trejos2410gmail.com";
    
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Gracias por contactarme, $visitor_name. Tu consulta será repsondida en un plazo de 24 horas.</p>";
    } else {
        echo '<p>Lo sentimos el email no ha sido enviado.</p>';
    }
     
} else {
    echo '<p>Algo salio mal!!</p>';
}
 
?>