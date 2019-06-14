<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>プログラミングテスト採用支援ツール（無料）</title>
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

<p>採用が難しいとお考えではないでしょうか？</p>
<p>なぜうちの会社に応募が少ないのか、おおくの会社がそれに頭を悩ませています。</p>
<p>・もう少し採用費用があれば</p>
<p>・いい人がなかなか現れない</p>
<p>・採用しても断られる</p>
<p>・入社してもすぐに辞めらてしまう</p>
<p>・せっかく育ってもパフォーマンスが出るようになってから転職されてしまう</p>
<p>などほぼ全ての会社が似たような悩みを抱えているかと思います。</p>
<p> </p>
<p>つまり採用活動は常にやり続けてる会社もあるのでは？</p>
<p>特にエンジニアは常に売り手市場、人手不足と言われています。そこで採用プロセスを少しでも削減できたら助かるかと思います。</p>
<p> </p>
<p>エンジニアを新しく雇う時困るのがスキルの判定が難しいと言った点が上げられます。</p>
<p> </p>
<p>そこでここで記載されているプログラミングテストツールを利用すれば、最低限のプログラミングのチェックがオンラインで可能となります。</p>
<p> </p>
<p>エンジニアの採用で最も重要なスキルを判定する事が自動である程度行えるのであれば、人材不足に大いに役立てることができるのではないでしょうか？</p>
<p> </p>
<p>無料の理由は？</p>
<p>他のプログラミングテストツールと違い、ここのプログラミングテストツールは無料です。なぜなら、広告掲載でのマネタイズをしているので、運用している時にページ毎に表示されるトップ、左、右の広告が表示されます。コンテンツに影響はないので、そこはご了承ください</p>
<p> </p>
<p><a href="http:///Manage/Auth/index">こちら</a>からソーシャルログイン(Google, Facebook)してもらい、エンジニア採用支援管理画面に入ってください。</p>
<p> </p>
<h4>管理画面の説明</h4>
<img src="/img/blog/control_panel.png" style="max-width:100%;">
<ul>
<li>Manager Name &gt; アカウント名です。</li>
<li>Login Type &gt; ソーシャルログインのGoogleかFacebookかの表示です。表示しないと忘れる場合があるので。。</li>
<li>Start Examination URL &gt; ここのURLを応募者に渡すだけで、プログラミングテストが可能となります。</li>
<li>password change &gt; 同じURLを使わせないために、パスワード変更します。URLが変更すれば変更後のURLからでしかプログラミングテストができません</li>
<li>language &gt; 英語と日本語に対応しています。日本語にすればプログラミングテストの説明が日本語に切り替わります。英語にすれば英語での説明に切り替わります。</li>
<li>what is website &gt; どこの媒体から応募されたかを知るための欄です。</li>
<li>APPLICANT &gt; 応募者一覧</li>
<li>ID &gt; 応募者のIDです。</li>
<li>NAME &gt; 応募者の名前です</li>
<li>FROM &gt; どこの媒体からの応募かがわかる欄です。</li>
<li>deadline &gt; プログラミングテストの締め切りです。デフォルトで１週間です。</li>
<li>Check Controllers &gt; このリンクからコントローラー部分を確認できます。</li>
<li>Check Views &gt; このリンクからViewの部分を確認できます。</li>
</ul>
<br>
<h4>プログラミングチェック</h4>
<img src="/img/blog/ll.png" style="max-width:100%;">
<p>・go up &gt; 上の階層に行きます。</p>
<p>各々のファイルのリンクをクリックするとファイルの中身が見れます。</p>
<p>セキュリティのため中には見れないファイルもあります。</p>
<p> </p>
<img src="/img/blog/file_open.png" style="max-width:100%;">
<p>ここからプログラミングを確認、上書きすることができます。</p>
<p>自由にファイルも選べて書くことが応募者にはできます。なので実作業に近いプログラミングを確認する事ができます。</p>
<p> </p>
<p>自由にプログラミングがかけるので各々の応募者の癖であったり考え方がわかるのもプログラミングテストのいい所でもあります。</p>
<p> </p>

</div>
<div id="ad_right"><iframe src="/htm/ad_right/" width="160" height="600" frameborder="0" scrolling="no"></iframe></div>

<script>
    setTimeout(function(){ga('send', 'pageview')},2000);
</script>
</body>
</html>
