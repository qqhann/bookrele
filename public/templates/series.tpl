{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

{foreach $res as $row}
<div>
巻数: {$row['volume']}
公開日: {$row['published_at']}
</div>
{/foreach}

{include file='footer.tpl'}
