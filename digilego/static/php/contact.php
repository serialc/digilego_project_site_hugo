<?php
# Filename: contact.php
# Purpose: send the contents by email to info@digilego.eu

# get the posted data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$msg = nl2br($_POST['message']);

# options
$to = "info@digilego.eu";
$eol = "\r\n";

# headers so that they are received nicely
$headers = array();

# main header (multipart mandatory)
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-Type: text/html; charset=iso-8859-1';
$headers[] = "To: Digilego <$to>";

# prep message
$message =  "<html><head><title>$subject</title><meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" /></head>";
$message .= "<body>From: <b>$name</b><br>";
$message .= "Email: <b>$email</b><br>";
$message .= "Message:<br><b>$msg</b></body></html>";

# warning, trying to send as an array causes php to insert bad line carriage returns
# this causes the email to be treated as text rather than html
if( mail($to, "digilego contact form: $subject", $message, implode($eol, $headers)) ) {

  print('<html><head><meta http-equiv="refresh" content="5; URL=http://project.digilego.eu" /><title>email sent</title></head>');
  print('<body><h1>Email sent!</h1><p>Thank you! We will try to respond as soon as possible.</p>');
  print('<p>You will be redirected to the main page shortly</p>');
  print('</body></html>');

} else {

  header("HTTP/1.1 500 OK");
  print('<html><head><title>email not sent</title></head>');
  print('<body><h1>Email not sent!</h1><p>Sorry about that!</p>');
  print('<p>Could you please send an email to info@digilego.eu letting us know why you were reaching out?<p>');
  print('<p>Sorry for the inconvenience.</p>');
  print('<p>If you\'re willing, could you please also send the following message:</p>');
  nl2br(print_r(error_get_last(), true));
  print('</body></html>');

}

?>
