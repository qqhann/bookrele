<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';

// mb_language("Japanese");
// mb_internal_encoding("UTF-8");

// $to      = 'ice.gitshell@gmail.com';
// $subject = 'タイトル';
// $message = '本文';
// $headers = 'From: qqhann.mailbot@gmail.com' . "\r\n";

// $result = mb_send_mail($to, $subject, $message, $headers);
// echo $result;

$email = current_user();
$res = select_series_book_subscripted_by_user($email);

foreach($res as $row) {
    echo $row['name'];
}