<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
require_unlogined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザから受け取ったユーザ名とパスワード
    $email          = filter_input(INPUT_POST, 'email');
    $password       = filter_input(INPUT_POST, 'password');
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    if (
        validate_token(filter_input(INPUT_POST, 'token'))
    ) {
        $res = signup($email, $password_hashed);
        
        if ($res) {
            // 認証が成功したとき
            // セッションIDの追跡を防ぐ
            session_regenerate_id(true);
            // ユーザ名をセット
            $_SESSION['email'] = $email;
            // ログイン完了後に / に遷移
            header('Location: '.$__ROOT__.'/');
            exit;
        } else {
            http_response_code(403);
        }
        
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

$smarty->display('signup.tpl');