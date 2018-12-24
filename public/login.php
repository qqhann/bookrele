<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
require_unlogined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザから受け取ったユーザ名とパスワード
    $email          = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $res = login($email);
    $password_hashed = $res->fetch_array(MYSQLI_ASSOC)['password'];
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        password_verify($password,
            $password_hashed !== null
                ? $password_hashed
                : '$2y$10$abcdefghijklmnopqrstuv'
		// ユーザ名が存在しないときだけ極端に速くなるのを防ぐ
        )
    ) {
        // 認証が成功したとき
        // セッションIDの追跡を防ぐ
        session_regenerate_id(true);
        // ユーザ名をセット
        $_SESSION['email'] = $email;
        // ログイン完了後に / に遷移
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

$smarty->display('login.tpl');