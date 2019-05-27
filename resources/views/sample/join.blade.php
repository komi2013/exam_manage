<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>商品一覧</title>
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

<table border="1">
<tr><th style="width:33%;">商品名</th><th style="width:33%;">カテゴリ名</th><th style="width:33%;">販売可</th></tr>
<?php foreach ($item as $d) {?>
<tr><td>
    <?=$d['item_name']?>
  </td>
  <td>
    <?=$d['category_name']?>
  </td>
  <td>
    <?=$d['availability']?>
  </td>
</tr>
<?php } ?>
</table>

<br>
<input type="text" placeholder="商品名" id="item_name">
<input type="submit" value="登録" id="submit">
</div>
<div id="ad_right"><iframe src="/htm/ad_right/" width="160" height="600" frameborder="0" scrolling="no"></iframe></div>

<script>
$('#submit').click(function(){
    var param = {
        _token : $('[name="csrf-token"]').attr('content')
        ,item_name : $('#item_name').val()
    }
    $.post('/Sample/AddItem/',param,function(){},"json")
    .always(function(res){
        console.log(res);
    });
});
</script>

<script>
  $(function(){ $(function(){ ga('send', 'pageview'); }); });
</script>
</body>
</html>
