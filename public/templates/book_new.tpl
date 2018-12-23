{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

{$series_name}の本を登録

<form method="post" action="{$form_action}">
    <input type="hidden" name="series_name" value="{$series_name}">
    {form_group_tag('巻数: ', "volume", "1")}
    {form_group_tag('発売日: ', "published_at", "2018-12-25")}
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file='footer.tpl'}
