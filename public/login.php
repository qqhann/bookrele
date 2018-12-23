<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
require_unlogined_session();

// POSTメソッドのときのみ実行
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザから受け取ったユーザ名とパスワード
    $email          = filter_input(INPUT_POST, 'email');
    $password_input = filter_input(INPUT_POST, 'password');

    $res = login('test1@mail.com');
    $password = $res->fetch_array(MYSQLI_ASSOC)['password'];
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        password_verify($password_input,
            $password !== null
                ? $password
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

header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
<title>ログインページ</title>
<h1>ログインしてください</h1>
<form method="post" action="">
    ユーザ名(メールアドレス): <input type="text" name="email" value="">
    パスワード: <input type="password" name="password" value="">
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="ログイン">
</form>
<?php if (http_response_code() === 403): ?>
<p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>
