{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

<form method="post" action="/~s1511548/select_search_series.php">
    シリーズ本の名前を検索: <input type="text" name="name" value="">
    <input type="hidden" name="token" value="{generate_token()}">
    <input type="submit" value="検索">
</form>
{if http_response_code() === 403}
<p style="color: red;">Error</p>
{/if}

<a href="{echo_url("/all_tables.php")}">All tables</a>
