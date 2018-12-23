{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

<form method="post" action="{$form_action}">
    シリーズ本の名前: <input type="text" name="name" value="">
    完結: <input type="text" name="complete" value="0">
    <input type="hidden" name="token" value="{generate_token()}">
    <input type="submit" value="登録">
</form>

{include file='footer.tpl'}
