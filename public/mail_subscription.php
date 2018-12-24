<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to      = current_user();
$subject = 'ブクリリ　購読中の本';
$message = "購読中の本: \n";
$headers = 'From: qqhann.mailbot@gmail.com' . "\r\n";


$email = current_user();
$res = select_series_book_subscripted_by_user($email);

if (mysqli_num_rows($res) > 0) {
    foreach($res as $row) {
        $message = $message . "シリーズ名：".$row['name']." (".complete_str($row['complete']).")\n";
    }
} else {
    $message = $message . "見つかりませんでした．";
}


$result = mb_send_mail($to, $subject, $message, $headers);
if ($result) {
    echo "送信されました．メールボックスを確認してください（迷惑メールに分類されている可能性があります）";
} else {
    echo "送信失敗";
}
