<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if (isset($_GET['series_name'])) {
    $series_name = $_GET['series_name'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $series_name       = filter_input(INPUT_POST, 'series_name');
    $volume            = filter_input(INPUT_POST, 'volume');
    $published_at      = filter_input(INPUT_POST, 'published_at');
    $res = insert_new_book($series_name, $volume, $published_at);
    if (
        true
    ) {
        header('Location: '.$__ROOT__.'/series.php?series_name='.$series_name);
        exit;
    }
    
    http_response_code(500);
}

require_once '../vendor/autoload.php';

ini_set('date.timezone', 'Asia/Tokyo');
define('MY_TITLE', 'ブクリリ');

$smarty = new Smarty();

// 使うテンプレートが入っているディレクトリを指定
$smarty->setTemplateDir('./templates/');

$smarty->assign("series_name", $series_name);
$smarty->assign("form_action", gen_url("/book_new.php"));
$smarty->display('book_new.tpl');
