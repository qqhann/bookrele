<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $res = select_search_series($name);

    if (logged_in()) {
        $user_email = current_user();
        $subscripted_res = select_search_series_subscripted_by_user($user_email, $name);
    } else {
        $subscripted_res = 0;
    }
}

require_once '../vendor/autoload.php';

ini_set('date.timezone', 'Asia/Tokyo');
define('MY_TITLE', 'ブクリリ');

$smarty = new Smarty();

// 使うテンプレートが入っているディレクトリを指定
$smarty->setTemplateDir('./templates/');

$smarty->assign("res", $res);
$smarty->assign("subscripted_res", $subscripted_res);
$smarty->display('search_result.tpl');
