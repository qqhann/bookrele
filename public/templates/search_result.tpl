{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}

<h4>検索結果</h4>
<h5>購読中</h5>
{foreach $subscripted_res as $row}
    <a href="{echo_url('/series.php?series_name=')}{$row['name']}"><div class="card">
        シリーズ名：
        {$row['name']} （{complete_str($row['complete'])}）
    </div></a>
{/foreach}

<h5>全検索結果</h5>
{foreach $res as $row}
    <a href="{echo_url('/series.php?series_name=')}{$row['name']}"><div class="card">
        シリーズ名：
        {$row['name']} （{complete_str($row['complete'])}）
    </div></a>
{/foreach}

{a_tag_btn_primary("/series_new.php", 'シリーズ本を登録')}

{include file='footer.tpl'}
