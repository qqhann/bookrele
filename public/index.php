<?php

require_once __DIR__ . '/../src/session.php';
require_logined_session();

header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
<title>会員限定ページ</title>
<h1>ようこそ,<?=h($_SESSION['email'])?>さん</h1>
<a href="/~s1511548/logout.php?token=<?=h(generate_token())?>">ログアウト</a>
