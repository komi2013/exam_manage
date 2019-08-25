<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>試験説明</title>
    <meta name="google-site-verification" content="" />

    <link rel="shortcut icon" href="" />

    <script src="/plugin/jquery-3.4.0.min.js"></script>
    <script src="/plugin/jquery.cookie.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-57298122-3"></script>
    <script src="/js/analytics.js<?=config('my.cache_v')?>"></script>
    <link rel="stylesheet" type="text/css" href="/css/basic.css<?=config('my.cache_v')?>" />
    <link rel="stylesheet" href="/css/pc.css<?=config('my.cache_v')?>" media="only screen and (min-width : 711px)">
    <link rel="stylesheet" href="/css/sp.css<?=config('my.cache_v')?>" media="only screen and (max-width : 710px)">
    <meta name="viewport" content="width=device-width, user-scalable=no" >
    <meta name="csrf-token" content="<?=csrf_token()?>" />
  </head>
<body>

<table id="drawer">
  <tr><td id="ad_menu"><iframe src="/htm/ad_menu/" width="300" height="250" frameborder="0" scrolling="no"></iframe></td></tr>
</table>

<div id="content">

<div id="ad" style="text-align: center;"><iframe src="/htm/ad/" width="320" height="50" frameborder="0" scrolling="no"></iframe></div>

<h2> <?=$applicant->applicant_name?>　さん</h2>
<h4 style="color:red;">注意！！</h4>
<div style="margin-left: 10px">
    <ul>
        <li><p>第三者と一緒に試験されるのは禁止されています</p></li>
        <li><p>第三者に情報を漏らすことは禁止されています</p></li>
        <li><p>面接時にこのプログラミングテストの質問を行います</p></li>
    </ul>
</div>
<br>
<h4 style="color:red;">プログラミング　テスト</h4>
<h4 style="color:blue;">環境</h4>
<table style="margin:10px;">
    <tr><th colspan="2" style="text-align: left;">
            <a href="/adminer-en.php?pgsql=localhost" target="blank">
            ここからDBにアクセスして見れます</a><br>
        もしDBの変更が必要と思うなら、インデックスを追加するなどのように自由に変更することができます<br>
        </th></tr>
<tr>
  <th>システム</th><td>PostgreSQL</td>
</tr>
<tr>
  <th>ユーザー名</th><td>exam_<?=$_SESSION['applicant_id']?></td>
</tr>
<tr>
  <th>パスワード</th><td><?=$_SESSION['db_password']?></td>
</tr>
<tr>
  <th>データベース</th><td>exam_<?=$_SESSION['applicant_id']?></td>
</tr>
    <tr><th colspan="2" style="text-align: left;"><br>
            <a href="/Manage/LL/index/?path=/" target="blank">
            ここからソースコードを見ることができます</a><br>
        編集しないといけないソースコードは自由に編集することができます<br>
        いくつかのソースコードは見れないようにしています
        </th></tr>
</table>

<h4 style="color:blue;">テスト１</h4>
<div style="margin-left: 10px">
    <ul>
        <li><a href="/Sample/AjaxAdd/index/" target="blank">正解のページ</a>item nameを登録できます</li>
        <li><a href="/Exam<?=$_SESSION['applicant_id']?>/AjaxAdd/index/" target="blank">このページがテストページです</a>
            正解のページのように変更お願いします<br>
            <a href="/Manage/File/edit/?path=/resources/views/exam<?=$_SESSION['applicant_id']?>/ajax_add.blade.php" target="blank">
                このURLから編集お願いします</a>　それと
                <a href="/Manage/LL/index/?path=/app/Http/Controllers/Exam<?=$_SESSION['applicant_id']?>/" target="blank">
                    これがサーバーサイドのプログラミングです </a>
        </li>
        <li>「jquery post」「chrome post　確認」でweb検索してもらえれば情報が取得できます</li>
        <li> こちらがPOSTのURLです /Exam<?=$_SESSION['applicant_id']?>/AddItem/</li>
        <li>1. itemは登録される</li>
        <li>2. item nameが空の場合アラートを表示</li>
        <li>3. セキュリティを考慮した改修をお願いします<br>
          編集が必要なソースコードは編集可能にしています</li>
    </ul>
</div>
<h4 style="color:blue;">テスト２</h4>
<div style="margin-left: 10px">
    <ul>
        <li><a href="/Sample/Join/index/" target="blank">正解のページ</a> 商品一覧が確認できます </li>
        <li><a href="/Exam<?=$_SESSION['applicant_id']?>/Join/index/" target="blank">このページがテストページです</a>
            正解のページのように変更お願いします<br>
            <a href="/Manage/File/edit/?path=/app/Http/Controllers/Exam<?=$_SESSION['applicant_id']?>/JoinController.php" target="blank">
                このURLから編集お願いします</a>
            <a href="/Manage/File/edit/?path=/resources/views/exam<?=$_SESSION['applicant_id']?>/join.blade.php" target="blank">
                このURLから編集お願いします</a>
        </li>
        <li>1. 商品一覧の表示お願いします</li>
        <li>2. パフォーマンスを考慮したプログラミングでお願いします <br>
          m_category, t_item　のテーブルのレコード数が１００万件あることを想定</li>
    </ul>
</div>

<br><br>
</div>

<div id="ad_right"><iframe src="/htm/ad_right/" width="160" height="600" frameborder="0" scrolling="no"></iframe></div>

<script>

</script>

<script>
    setTimeout(function(){ga('send', 'pageview')},2000);
</script>
</body>
</html>
