<style>
			
.overlay {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  opacity:0;
  height: 100%;
  width: 100%;
}

</style>


		<div class="overlay">
		<img src="header-sparkle-gif.gif">

<?php
session_start();
if (isset($_POST['sendmail']))
{
	
require 'PHPMailerAutoload.php';
require 'credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 2;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL,'BCZ Sales');
$mail->addAddress($_POST['email']);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL, 'Information');
$mail->addCC('okit247@admin.com');
$mail->addBCC('adminBcZSales@webstorebcz.com');

/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your Order Item!';
$mail->Body    = 'This is your list of order: <br><br> '.$_SESSION["items"].' <br> Total items:'.$_SESSION["itemq"].' <br> <b>Total cost: RM '.$_SESSION["bill"].'</b> <br><br> Bring your money and  claim your items as soon as possible at <br> https://www.google.com/maps/place/BCZ+IT+Solutions+Sdn+Bhd/@1.4650733,103.7510531,17z/data=!3m1!4b1!4m5!3m4!1s0x31da12c772337d13:0x93c066283df2383e!8m2!3d1.4650733!4d103.7532418 ';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
	?>
<script>window.location = "place_order.php";</script>
		<?php
} 
}

?>
