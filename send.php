<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


//send.php

if(isset($_POST["contact_name"]))
{
  require 'assets/PHPMailer/PHPMailer/Exception.php';
  require 'assets/PHPMailer/PHPMailer/PHPMailer.php';
  require 'assets/PHPMailer/PHPMailer/SMTP.php';


 $mail = new PHPMailer(true);
 try {
   $mail->SMTPDebug = SMTP::DEBUG_SERVER;
   $mail->isSMTP();
   $mail->Host = 'smtp.example.com'; // Insert your SMTP host.
   $mail->SMTPAuth = true;
   $mail->From = 'post@vikenblockchain.com'; // This is the email address that sends the email.
   $mail->FromName = 'Do Not Reply';         // This is shown as from address.
   $mail->Username = 'TYPE_USER_NAME_HERE';  //  The user name of the From email.
   $mail->Password = 'REMOVED';              //  The password of the From email.
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
   $mail->Port = '587';

   $mail->addAddress('contact@vikenblockchain.com', 'Viken Blockchain Solutions');
   $mail->addAddress($_POST['contact_email']);
   $mail->WordWrap = 78;

   $mail->isHTML(true);
   $mail->AllowEmpty = false;
   $mail->MessageDate = '';

   $message_subject = 'New message from: ' . $_POST['contact_name'];
   $mail->Subject = $message_subject;
   $message_body = '<p><bold>Company name: </bold>' . $_POST['contact_name'] . '</p>' .
                   '<p><bold>From mobile: </bold>' . $_POST["contact_mobile"] . '</p>' .
                   '<p><bold>Company email: </bold>' . $_POST['contact_email'] . '</p><br>' .
                   '<p><h2>Company request: </h2>' . $_POST["contact_message"] . '</p>';
   $mail->Body = $message_body;

   if($mail->send())
   {
    echo 'Thank you for Contact Us';
   }
 } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

?>
