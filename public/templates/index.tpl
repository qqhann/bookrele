{include file='base.tpl' page_title={$smarty.const.MY_TITLE}}


<div class="alert alert-success" role="alert">
  <h2 class="alert-heading">ようこそブクリリへ</h2>
  <p>
  ブクリリは本の発売日を記録するアプリです．発売日予測は今後の課題...（ということにしておきましょう）．
  まずは本のシリーズ名を検索しましょう．
  </p>
</div>



<form method="post" action="{echo_url('/search_result.php')}">
    <div class="form-group">
        <label>シリーズ本の名前を検索: </label>
        <input type="text" name="name" value="" class="form-control">
    </div>
    <input type="hidden" name="token" value="{generate_token()}">
    <button type="submit" class="btn btn-primary">検索</button>
</form>
{if http_response_code() === 403}
<p style="color: red;">Error</p>
{/if}

{include file='footer.tpl'}
