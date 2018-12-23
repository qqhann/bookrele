{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

<form method="post" action="{$form_action}">
    <div class="form-group">
        <label>シリーズ本の名前: </label>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <div class="form-group">
        <label>完結: </label>
        <input type="text" name="complete" value="0" class="form-control">
    </div>
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file='footer.tpl'}
