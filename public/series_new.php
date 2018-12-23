<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = filter_input(INPUT_POST, 'name');
    $complete = filter_input(INPUT_POST, 'complete');
    $res = select_search_series($name);
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

header('Content-Type: text/html; charset=UTF-8');

require_once '../vendor/autoload.php';

ini_set('date.timezone', 'Asia/Tokyo');
define('MY_TITLE', 'ブクリリ');

$smarty = new Smarty();

// 使うテンプレートが入っているディレクトリを指定
$smarty->setTemplateDir('./templates/');

$smarty->assign("form_action", gen_url("/series_new.php"));
$smarty->display('series_new.tpl');
