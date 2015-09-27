
  <!DOCTYPE html>
  <html>
    <head>
      <title>Shiv Baran Singh</title>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="mail.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    </body>
  </html>
<?php
require 'PHPMailerAutoload.php';
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jssitdg@gmail.com';                 // SMTP username
$mail->Password = 'itdevelopers@jss';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom($email, $fname);
$mail->addAddress('spyshiv@gmail.com', 'Shiv Baran');     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = 'Hello Shiv!<br>This message is from <b>'. $fname .''. $lname .'</b><br>'. $fname .' has visited your portfolio site and wants to say something to you.<br> 
                  <p style="background-color: #DE5233;color:white; padding:10px;font-weight: bold;font-family: sans-serif;letter-spacing: 1px;">'. $message .'</p>
                  Thanks!';
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Ohh! Something went wrong. Please Try again..';
    header('Refresh:2; URL=../index.html');
} else { 
    echo '<p class="confirm_message">Success !!! your message has been sent.</p>';
    header('Refresh:2; URL=../index.html');
}
?>