<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title><?=$path?></title>
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
<a href="/Manage/LL/index/?path=<?=$goup?>">go up</a><br><br>
<textarea style="width:100%;height:500px;" id="data"><?=$data?></textarea>

<div style="width:100%;text-align: center;">
<input type="submit" value="UPDATE" id="submit">
</div>
</div>

<script>

$('#submit').click(function(){
    var param = {
        _token : $('[name="csrf-token"]').attr('content')
        ,data : $('#data').val()
        ,path : '<?=$path?>'
    }
    $.post('/Manage/File/update/',param,function(){},"json")
    .always(function(res){
        if(res[0] == 1){
            location.href = '';
        }
    });
});
</script>

<script>
    setTimeout(ga('send', 'pageview'), 2000);
</script>
</body>
</html>
