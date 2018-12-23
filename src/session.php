<?php

$__ROOT__ = '/~s1511548';

function echo_url($uri) {
    global $__ROOT__;
    echo $__ROOT__.$uri;
}
function gen_url($uri) {
    global $__ROOT__;
    return $__ROOT__.$uri;
}
function a_tag($uri, $text) {
    $url = gen_url($uri);
    echo "<a href=\"{$url}\">{$text}</a>";
}
function form_group_tag($label, $form_name, $form_value) {
    echo "
<div class=\"form-group\">
    <label>{$label}</label>
    <input type=\"text\" name=\"{$form_name}\" value=\"{$form_value}\" class=\"form-control\">
</div>";
}
function logged_in() {
    @session_start();
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}
function current_user() {
    @session_start();
    return $_SESSION['email'];
}


/**
 * ログイン状態によってリダイレクトを行うsession_startのラッパー関数
 * 初回時または失敗時にはヘッダを送信してexitする
 */
function require_unlogined_session()
{
    // セッション開始
    @session_start();
    // ログインしていれば / に遷移
    if (isset($_SESSION['email'])) {
	global $__ROOT__;
        header('Location: '.$__ROOT__.'/');
        exit;
    }
}
function require_logined_session()
{
    // セッション開始
    @session_start();
    // ログインしていなければ /login.php に遷移
    if (!isset($_SESSION['email'])) {
	global $__ROOT__;
        header('Location: '.$__ROOT__.'/login.php');
        exit;
    }
}

/**
 * CSRFトークンの生成
 *
 * @return string トークン
 */
function generate_token()
{
    // セッションIDからハッシュを生成
    return hash('sha256', session_id());
}

/**
 * CSRFトークンの検証
 *
 * @param string $token
 * @return bool 検証結果
 */
function validate_token($token)
{
    // 送信されてきた$tokenがこちらで生成したハッシュと一致するか検証
    return $token === generate_token();
}

/**
 * htmlspecialcharsのラッパー関数
 *
 * @param string $str
 * @return string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}
