<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
require_unlogined_session();

// 事前に生成したユーザごとのパスワードハッシュの配列
$hashes = [
    'qqhann' => '$2y$10$7DxauXhtfsn.nvoeegBLr.StRDseljTFgn6iEkGr6uDuhSUk2OdNO',
]; 

// ユーザから受け取ったユーザ名とパスワード
$email    = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$password = password_hash($password, PASSWORD_DEFAULT);

// // POSTメソッドのときのみ実行
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if (
//         validate_token(filter_input(INPUT_POST, 'token')) &&
//         password_verify(
//             $password,
//             isset($hashes[$username])
//                 ? $hashes[$username]
//                 : '$2y$10$abcdefghijklmnopqrstuv'
// 		// ユーザ名が存在しないときだけ極端に速くなるのを防ぐ
//         )
//     ) {
//         // 認証が成功したとき
//         // セッションIDの追跡を防ぐ
//         session_regenerate_id(true);
//         // ユーザ名をセット
//         $_SESSION['email'] = $email;
//         // ログイン完了後に / に遷移
//         header('Location: '.$__ROOT__.'/');
//         exit;
//     }
//     // 認証が失敗したとき
//     // 「403 Forbidden」
//     http_response_code(403);
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        validate_token(filter_input(INPUT_POST, 'token'))
    ) {
	$res = signup($email, $password);
	print_r($res);
        // 認証が成功したとき
        // セッションIDの追跡を防ぐ
        session_regenerate_id(true);
        // ユーザ名をセット
        $_SESSION['email'] = $email;
        // ログイン完了後に / に遷移
        header('Location: '.$__ROOT__.'/');

	$res = select_all_user();
	foreach($res as $row) {
		print_r($row);
	}

        exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
    http_response_code(403);
}
$res = select_all_user();
foreach($res as $row) {
    print_r($row);
}


header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
<title>登録ページ</title>
<h1>ユーザ登録してください</h1>
<form method="post" action="">
    ユーザ名(メールアドレス): 
    <input type="text" name="email" value="">
    パスワード: 
    <input type="password" name="password" value="">
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="登録">
</form>
<?php if (http_response_code() === 403): ?>
<p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>
