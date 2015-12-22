<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
error_reporting(E_STRICT);
require '../PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 1;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "phplover143@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "jayanthi336";

//Set who the message is to be sent from

//Set who the message is to be sent to
$mail->addAddress('vinoth336@gmail.com', 'vinothkumar');

//Set the subject line
$mail->Subject = 'PHPMailer GMail SMTP test';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

//Replace the plain text body with one created manually
$mail->Body = "<html><body><h1>vinothkumar</h1></body></html>";
$mail->AltBody = 'This is a plain-text message body';
//echo mail('vinoth336@gmail.com','Activation Test','hello world',
$headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                // More headers
                                $content = " User Name : $emailid <br> Password : $pwd <br>";
                                $headers .= 'From: admin@praveenp.in';
                                mail('vinoth336@gmail.com','ACCOUNT INFORMATION',$content , $headers);

exit;
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
