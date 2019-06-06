<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>item list</title>
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
<tr><th style="width:33%;">item name</th><th style="width:33%;">category name</th><th style="width:33%;">EXPORTABILITY</th></tr>
<?php foreach ($item as $d) { if($d['exportability'] != 3){?>
<tr><td>
    <?=$d['item_name']?>
  </td>
  <td>
    <?=$d['category_name']?>
  </td>
  <td>
    <?php if($d['exportability'] == 1) {?>
      OK
    <?php } else if ($d['exportability'] == 2) {?>
      ???
    <?php } ?>
  </td>
</tr>
<?php } } ?>
</table>

<br>
<input type="text" placeholder="item name" id="item_name" value="<?=$date?>">
<input type="submit" value="submit" id="submit">
</div>
<div id="ad_right"><iframe src="/htm/ad_right/" width="160" height="600" frameborder="0" scrolling="no"></iframe></div>

<script>
$('#submit').click(function(){
    location.href = '/Sample/Join/index/'+ $('#item_name').val() +'/';
});
</script>

<script>
  $(function(){ $(function(){ ga('send', 'pageview'); }); });
</script>
</body>
</html>
