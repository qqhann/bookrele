<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();
if(isset($_GET['series_name'])) {
    $series_name = $_GET['series_name'];
    $res = select_series_book($_GET['series_name']);
}

require_once '../vendor/autoload.php';

ini_set('date.timezone', 'Asia/Tokyo');
define('MY_TITLE', 'ブクリリ');

$smarty = new Smarty();

// 使うテンプレートが入っているディレクトリを指定
$smarty->setTemplateDir('./templates/');

$smarty->assign("series_name", $series_name);
$smarty->assign("res", $res);
$smarty->display('series.tpl');
