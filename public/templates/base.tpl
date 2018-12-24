<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {$page_title} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" >
    <link rel="stylesheet" href="cover.css">
</head>
<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
<header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">{a_tag('/', 'ブクリリ')}</h3>
      <nav class="nav nav-masthead justify-content-center">
        {if logged_in()}
            <span class="nav-item">{a_tag("/mail_subscription.php", current_user())}</span>
            <span class="nav-item"><a class="" href="/~s1511548/logout.php?token={generate_token()}">ログアウト</a></span>
        {else}
            <span class="nav-item"><a class="cta" href="{echo_url('/login.php')}">ログイン</a></span>
        {/if}
      </nav>
    </div>
</header>

<main role="main" class="inner cover">
