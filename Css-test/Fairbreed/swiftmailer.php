<?php
  require_once 'vendor/autoload.php';
  // Create the Transport
  $transport = (new Swift_SmtpTransport('ssl://smtp.gmail.com', 465))
    ->setUsername('caddymid@gmail.com')
    ->setPassword('Test42323423!');
  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);
  // Create a message
  $message = (new Swift_Message('Wonderful Subject'))
    ->setFrom(['john@doe.com' => 'John Doe'])
    ->setTo(['ginosiepel@gmail.com' => 'A name'])
    ->setBody('Here is the message itself');
  // Send the message
  $result = $mailer->send($message);
?>
