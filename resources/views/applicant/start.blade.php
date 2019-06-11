<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>START</title>
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

<table style="margin:10px;">

<tr>
  <th>NAME</th>
  <td>
    <input type="text" placeholder="name" value="" id="applicant_name" style="height:20px;">
  </td>
</tr>
</table>
<div style="width:100%;text-align: center;">
<input type="submit" value="START" id="submit">
</div>
<br><br>
</div>
<div id="ad_right"><iframe src="/htm/ad_right/" width="160" height="600" frameborder="0" scrolling="no"></iframe></div>

<script>
var lang = '<?=$lang?>';
$('#submit').click(function(){
    var param = {
        _token : $('[name="csrf-token"]').attr('content')
        ,applicant_name : $('#applicant_name').val()
        ,password : '<?=$exam_manage->password?>'
        ,apply_from : '<?=$apply_from?>'
    }
    $.post('/Applicant/Start/',param,function(){},"json")
    .always(function(res){
        if(res[0] == 1){
            location.href = '/Applicant/Introduction/index/'+lang+'/';
        }
    });
});
</script>

<script>
    setTimeout(function(){ga('send', 'pageview')},2000);
</script>
</body>
</html>
