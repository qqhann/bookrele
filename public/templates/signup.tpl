{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

<h1>ユーザ登録してください</h1>
<form method="post" action="">
    {form_group_tag('メールアドレス: ', "email", "")}
    {form_group_password_tag('パスワード: ')}
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">新規登録</button>
</form>
{if http_response_code() === 403}
<p style="color: red;">ユーザ名またはパスワードが違います</p>
{/if}

{include file='footer.tpl'}