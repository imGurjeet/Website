<?php
$to = "gs09942@gmail.com";
$subject = "This is the subject";
$message = "This is the body of the email.";

$headers = "From: smtp-relay.brevo.com";
$headers .= "Reply-To: gurjeet74gb@gmail.com";
$headers .= "MIME-Version: 1.0";
$headers .= "Content-Type: text/html; charset=ISO-8859-1";

if (mail($to, $subject, $message, $headers)) 
{
    echo "Email sent successfully.";
} 
else 
{
    echo "Email sending failed.";
}
?>