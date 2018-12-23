{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

{$series_name}の本{$volume}巻を編集

<form method="post" action="{$form_action}">
    <input type="hidden" name="series_name" value="{$series_name}">
    <input type="hidden" name="volume" value="{$volume}" class="form-control">
    {form_group_tag('発売日: ', "published_at", "")}
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file='footer.tpl'}
