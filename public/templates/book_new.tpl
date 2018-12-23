{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

{$series_name}の本を登録

<form method="post" action="{$form_action}">
    <input type="hidden" name="series_name" value="{$series_name}">
    <div class="form-group">
        <label>巻数: </label>
        <input type="text" name="name" value="1" class="form-control">
    </div>
    <div class="form-group">
        <label>発売日: </label>
        <input type="text" name="complete" value="2018-12-25" class="form-control">
    </div>
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file='footer.tpl'}
