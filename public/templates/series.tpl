{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

{$series_name}シリーズの本一覧
{a_tag('/series_edit.php', 'edit')}
{a_tag('/series_delete.php', 'delete')}
{if logged_in()}
{a_tag('/', 'subscribe')}
{else}
{a_tag('/login.php', 'login to subscribe')}
{/if}

{foreach $res as $row}
<div>
巻数: {$row['volume']}
公開日: {$row['published_at']}
{a_tag('/book_edit.php', 'edit')}
{a_tag('/book_delete.php', 'delete')}
</div>
{/foreach}

{a_tag("/book_new.php?series_name=`$series_name`", 'addnew')}

{include file='footer.tpl'}
