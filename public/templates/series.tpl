{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

seriesname
{a_tag('/', 'edit')}
{a_tag('/', 'delete')}
{if logged_in()}
{a_tag('/', 'subscribe')}
{else}
{a_tag('/', 'login to subscribe')}
{/if}

{foreach $res as $row}
<div>
巻数: {$row['volume']}
公開日: {$row['published_at']}
{a_tag('/', 'edit')}
{a_tag('/', 'delete')}
</div>
{/foreach}

{a_tag('/', 'addnew')}

{include file='footer.tpl'}
