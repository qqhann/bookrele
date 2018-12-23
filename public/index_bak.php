<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';
// require_logined_session();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = filter_input(INPUT_POST, 'name');
    $res = select_search_series($name);
    if (
        validate_token(filter_input(INPUT_POST, 'token')) &&
        true
    ) {
        header('Location: '.$__ROOT__.'/');
	print_r($res);
        exit;
    }
    // 認証が失敗したとき
    // 「403 Forbidden」
    http_response_code(403);
}

header('Content-Type: text/html; charset=UTF-8');

?>
<!DOCTYPE html>
<title>ブクリリ</title>
<h1>ようこそ,<?=h($_SESSION['email'])?>さん</h1>
<a href="/~s1511548/logout.php?token=<?=h(generate_token())?>">ログアウト</a>

<form method="post" action="/~s1511548/select_search_series.php">
    シリーズ本の名前を検索: <input type="text" name="name" value="">
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="検索">
</form>
<?php if (http_response_code() === 403): ?>
<p style="color: red;">Error</p>
<?php endif; ?>

<a href="<?php echo_url("/all_tables.php") ?>">All tables</a>
