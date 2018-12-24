{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

<h4>
    {$series_name}シリーズの本一覧
</h4>
{a_tag("/series_edit.php?name=`$series_name`", 'edit')}
{a_tag('/series_delete.php', 'delete')}
{if logged_in()}
{a_tag('/', 'subscribe')}
{else}
{a_tag('/login.php', 'login to subscribe')}
{/if}

{foreach $res as $row}
<div class="card">
    <p>
    巻数: {$row['volume']}
    公開日: {$row['published_at']}
    {a_tag_btn("/book_edit.php?series_name=`$series_name`&volume=`$row['volume']`", 'edit')}
    {a_tag_btn("/book_delete.php?series_name=`$series_name`&volume=`$row['volume']`", 'delete')}
    </p>
</div>
{/foreach}

{a_tag_btn("/book_new.php?series_name=`$series_name`", 'addnew')}

{include file='footer.tpl'}
