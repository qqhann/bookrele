<!DOCTYPE html>
<meta charset="utf-8">
<title> {$page_title} </title>
<body>

{if logged_in()}
<h1>ようこそ,{$user_email}さん</h1>
<a href="/~s1511548/logout.php?token={generate_token()}">ログアウト</a>
{else}
<a href="{echo_url("/login.php")}">ログイン</a>
{/if}
