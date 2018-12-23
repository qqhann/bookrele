<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if (isset($_GET['series_name']) && isset($_GET['volume'])) {
    $series_name = $_GET['series_name'];
    $volume      = $_GET['volume'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $series_name       = filter_input(INPUT_POST, 'series_name');
    $volume            = filter_input(INPUT_POST, 'volume');
    $published_at      = filter_input(INPUT_POST, 'published_at');
    $res = update_book($series_name, $volume, $published_at);
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        true
    ) {
        header('Location: '.$__ROOT__.'/');
        exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
    http_response_code(403);
}

require_once '../vendor/autoload.php';

ini_set('date.timezone', 'Asia/Tokyo');
define('MY_TITLE', 'ブクリリ');

$smarty = new Smarty();

// 使うテンプレートが入っているディレクトリを指定
$smarty->setTemplateDir('./templates/');

$smarty->assign("series_name", $series_name);
$smarty->assign("volume", $volume);
$smarty->assign("form_action", gen_url("/book_edit.php"));
$smarty->display('book_edit.tpl');
