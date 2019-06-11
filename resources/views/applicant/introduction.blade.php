<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>introduction</title>
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

<h2>Hi <?=$applicant->applicant_name?></h2>
<h4 style="color:red;">Warning!!!</h4>
<div style="margin-left: 10px">
    <ul>
        <li><p>Sharing any or all parts of this test with another person is strictly prohibited.</p></li>
        <li><p>You are expected to do this test alone, without any help from another person.</p></li>
        <li><p>You are expected to do this test yourself. Do not let anyone else take this test for you.</p></li>
        <li><p>You will be expected to thoroughly explain your solutions in the technical interview.</p></li>
    </ul>
</div>
<br>
<h4 style="color:red;">Programming Test</h4>
<h4 style="color:blue;">Environment</h4>
<table style="margin:10px;">
    <tr><th colspan="2" style="text-align: left;">
            <a href="/adminer-en.php?pgsql=localhost" target="blank">
            You can check database from this url</a><br>
        you can change DB as you like, if you think it is necessary.<br>
        something like adding index and so on.
        </th></tr>
<tr>
  <th>System</th><td>PostgreSQL</td>
</tr>
<tr>
  <th>Username</th><td>exam_<?=$_SESSION['applicant_id']?></td>
</tr>
<tr>
  <th>Password</th><td><?=$_SESSION['db_password']?></td>
</tr>
<tr>
  <th>Database</th><td>exam_<?=$_SESSION['applicant_id']?></td>
</tr>
    <tr><th colspan="2" style="text-align: left;"><br>
            <a href="/Manage/LL/index/?path=/" target="blank">
            You can browse source code files from this url</a><br>
        you can change whatever you want if you think it is necessary.<br>
        but some files which should not be seen are not seeable.
        </th></tr>
</table>

<h4 style="color:blue;">Test 1</h4>
<div style="margin-left: 10px">
    <ul>
        <li><a href="/Sample/AjaxAdd/index/" target="blank">This is correct web page</a> You can submit item name</li>
        <li><a href="/Exam<?=$_SESSION['applicant_id']?>/AjaxAdd/index/" target="blank">This is your web page</a>
            please make something like correct sample.<br>
            <a href="/Manage/File/edit/?path=/resources/views/exam<?=$_SESSION['applicant_id']?>/ajax_add.blade.php" target="blank">
                Edit program this url</a> and 
                <a href="/Manage/LL/index/?path=/app/Http/Controllers/Exam<?=$_SESSION['applicant_id']?>/" target="blank">
                    this is server side programming </a>
        </li>
        <li>you can search web "jquery post","how to check post chrome" etc..</li>
        <li>1. item must be able to be inserted</li>
        <li>2. if item name is empty, alert show up</li>
        <li>3. you should care about security, if you care security, you need to edit some files as well<br>
          any file which should be edited are editable.</li>
    </ul>
</div>
<h4 style="color:blue;">Test 2</h4>
<div style="margin-left: 10px">
    <ul>
        <li><a href="/Sample/Join/index/" target="blank">This is correct web page</a> You can see item list</li>
        <li><a href="/Exam<?=$_SESSION['applicant_id']?>/Join/index/" target="blank">This is your web page</a>
            please make something like correct sample.<br>
            <a href="/Manage/File/edit/?path=/app/Http/Controllers/Exam<?=$_SESSION['applicant_id']?>/JoinController.php" target="blank">
                Edit program this url</a>
        </li>
        <li>1. you need to show item list</li>
        <li>2. you should care about performance. <br>
          m_category, t_item table's record supposed to be 1 million records</li>
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
