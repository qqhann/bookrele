{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}


<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">ブクリリ ガイド</h4>
  <p>
  検索結果です．<br>
  見つけたシリーズをクリックして詳細を確認しましょう．
  </p>
  <p>
  ログインして購読すれば，購読しているシリーズの検索結果も表示されます．<br>
  さらに，メールアドレスをクリックするとメールが届くかも？
  </p>
  <p>
  見つけたい本がなかったら，追加しましょう．<br>
  最初の一人になれる！
  </p>
</div>


<h4>検索結果</h4>
<h5>購読中</h5>
{if $subscripted_res}
{foreach $subscripted_res as $row}
    <a href="{echo_url('/series.php?series_name=')}{$row['name']}"><div class="card">
        シリーズ名：
        {$row['name']} （{complete_str($row['complete'])}）
    </div></a>
{/foreach}
{else}
    {if logged_in()}
        購読が見つかりませんでした．
    {else}
        ログインして機能を利用しましょう
    {/if}
{/if}

<h5>全検索結果</h5>
{foreach $res as $row}
    <a href="{echo_url('/series.php?series_name=')}{$row['name']}"><div class="card">
        シリーズ名：
        {$row['name']} （{complete_str($row['complete'])}）
    </div></a>
{/foreach}

{a_tag_btn_primary("/series_new.php", 'シリーズ本を登録')}

{include file='footer.tpl'}
