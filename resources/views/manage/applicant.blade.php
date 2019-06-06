<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Exam Manage</title>
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


<?php foreach ($obj as $d) {?>
<table style="margin:10px;">
<tr>
  <th>ID</th>
  <td>
    <?=$d->applicant_id?>
  </td>
</tr>
<tr>
  <th>NAME</th>
  <td>
    <input type="text" value="<?=$d->applicant_name?>">
  </td>
</tr>
<tr>
  <th>FROM</th>
  <td>
    <?=$d->apply_from?>
  </td>
</tr>
<tr>
  <th>deadline</th>
  <td>
    <input type="date" value="<?=$d->deadline?>">
  </td>
</tr>
</table>
<?php } ?>


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
    setTimeout(ga('send', 'pageview'), 2000);
</script>
</body>
</html>
