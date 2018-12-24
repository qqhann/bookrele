<?php

require_once __DIR__ . '/../src/bookreledb.php';
require_once __DIR__ . '/../src/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ユーザから受け取ったユーザ名とパスワード
    $password       = filter_input(INPUT_POST, 'password');
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    echo password_verify($password, '$2y$10$1pwbvsk0ywssaAn/J4VhoeR7Y/jdfJVN810.Vh/pQ4tLDUDfw4nHC');
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $password;
    echo '<br>';
    echo $password_hashed;
    
}
?>
<!DOCTYPE html>
<title>登録ページ</title>
<h1>ユーザ登録してください</h1>
<form method="post" action="">
    パスワード: 
    <input type="password" name="password" value="">
    <input type="hidden" name="token" value="<?=h(generate_token())?>">
    <input type="submit" value="登録">
</form>
<?php if (http_response_code() === 403): ?>
<p style="color: red;">ユーザ名またはパスワードが違います</p>
<?php endif; ?>


