{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

{$name}シリーズを編集

<form method="post" action="{$form_action}">
    <input type="hidden" name="name" value="{$name}">
    <div class="form-group">
        <label>完結: </label>
        <input type="text" name="complete" value="0" class="form-control">
    </div>
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file='footer.tpl'}
