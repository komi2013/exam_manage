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
        <li>webページ上に（以下のURLのページに？）１から１００までの数字をphpを用いて出力してください。その数字が３で割り切れるとき、
            ５で割り切れるとき、その両方で割り切れるときそれぞれで、Fizz、Buzz、FizzBuzzを数字の代わりに表示してみてください。
        </li>
        <li><a href="/Sample/AjaxAdd/fizzbuzz/" target="blank">正解のページ</a></li>
        <li><a href="/Exam<?=$_SESSION['applicant_id']?>/AjaxAdd/fizzbuzz/" target="blank">このページがテストページです</a>
            正解のページのように変更お願いします<br>
            <a href="/Manage/File/edit/?path=/resources/views/exam<?=$_SESSION['applicant_id']?>/fizzbuzz.blade.php" target="blank">
                このURLから編集お願いします</a>
        </li>
    </ul>
</div>
<h4 style="color:blue;">テスト２</h4>
<div style="margin-left: 10px">
    <ul>
        <li>以下のページ？は商品の名前やその商品の状態を確認できるページです。
            このページを業務で使用している人から改修依頼が届きました。改修要件は以下の内容でした。
        </li>
        <li>これらのデータがいつ生成されたのかを検索できるようにしてください。
            いつ生成されたのか、はcreated_atに格納されています。
            また、必要なデータは２つのテーブルに分かれています。うまく結合して表示させる必要があります。
        </li>
        <li>exportabilityはDB上で1、2、 3の３種類が格納されています。
            1は輸出可能、２は現時点では不明、３は不可を意味しています。
            1のときは表に"OK" 2のときは"???" 3のときはレコードを表示しないでください。
        </li>
        <li><a href="/Sample/Join/index/" target="blank">正解のページ</a> 商品一覧が確認できます </li>
        <li><a href="/Exam<?=$_SESSION['applicant_id']?>/Join/index/" target="blank">このページがテストページです</a>
            正解のページのように変更お願いします<br>
            <a href="/Manage/File/edit/?path=/app/Http/Controllers/Exam<?=$_SESSION['applicant_id']?>/JoinController.php" target="blank">
                このURLから編集お願いします</a>
            <a href="/Manage/File/edit/?path=/resources/views/exam<?=$_SESSION['applicant_id']?>/join.blade.php" target="blank">
                このURLから編集お願いします</a>
        </li>
        <li>1. 商品一覧の表示お願いします。テキストボックスに日付を入力して検索できるようにお願いします。</li>
        <li>2. exportabilityが1の時は「OK」、2の時は「???」、3の時はレコードそのものを非表示</li>
        <li>3. パフォーマンスを考慮したプログラミングでお願いします <br>
          m_category, t_item　のテーブルのレコード数が大量にある</li>
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
