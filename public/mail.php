<?php

// require_once '/home/2018/s1511548/bookrele/vendor/autoload.php';
// 
// // Create the Transport
// $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
//   ->setUsername('qqhan.mailbot@gmail.com')
//   ->setPassword('riqrux-tofrik-5wyDry')
// ;
// 
// // Create the Mailer using your created Transport
// $mailer = new Swift_Mailer($transport);
// 
// // Create a message
// $message = (new Swift_Message('Wonderful Subject'))
//   ->setFrom(['qqhann.mailbot@gmail.com' => 'John Doe'])
//   ->setTo(['qiu.gits@gmail.com'])
//   ->setBody('Here is the message itself')
//   ;
// 
// // Send the message
// $result = $mailer->send($message);
// echo $result;


// http://php.net/manual/ja/function.mb-send-mail.php
// https://qiita.com/shuntaro_tamura/items/c0ef05cb4d4e22e78297
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to      = 'ice.gitshell@gmail.com';
$subject = 'タイトル';
$message = '本文';
$headers = 'From: qqhann.mailbot@gmail.com' . "\r\n";

$result = mb_send_mail($to, $subject, $message, $headers);
echo $result;
