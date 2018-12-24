{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

シリーズ本を登録
<form method="post" action="{$form_action}">
    {form_group_tag('シリーズ名: ', "name", "")}
    {form_group_tag('完結: ', "complete", "0")}
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file='footer.tpl'}
