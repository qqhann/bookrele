{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

seriesname
edit
delete
{if logged_in()}
subscribe
{else}
login to subscribe
{/if}

{foreach $res as $row}
<div>
巻数: {$row['volume']}
公開日: {$row['published_at']}
edit
delete
</div>
{/foreach}

addnew

{include file='footer.tpl'}
