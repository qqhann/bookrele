<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $res = select_search_series($name);
}

require_once '../vendor/autoload.php';

ini_set('date.timezone', 'Asia/Tokyo');
define('MY_TITLE', 'ブクリリ');

$smarty = new Smarty();

// 使うテンプレートが入っているディレクトリを指定
$smarty->setTemplateDir('./templates/');

$smarty->assign("res", $res);
$smarty->display('search_result.tpl');
