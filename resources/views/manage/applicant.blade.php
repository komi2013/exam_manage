<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Exam Manage</title>
    <meta name="google-site-verification" content="" />

    <link rel="shortcut icon" href="" />

    <script src="/plugin/jquery-3.4.0.min.js"></script>
    <script src="/plugin/jquery.cookie.js"></script>
    <script src="/plugin/vue.min.js"></script>
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
  <th>Manager Name</th>
  <td>
    <?=$manager->manager_name?>
  </td>
</tr>
<tr>
  <th>Login Type</th>
  <td>
    <img src="<?=$login_icon?>" class="icon">
  </td>
</tr>
</table>
<h3><a v-bind:href="'/Applicant/Start/index/'+uri" target="blank">Start Examination URL</a></h3>

<div>
    <textarea style="width:100%;height:50px;">
<?='https://'.$_SERVER['HTTP_HOST']?>@{{'/Applicant/Start/index/'+uri}}
    </textarea>
</div>
<table>
    <tr>
      <th><input value=" password change " type="submit" id="pass"> : </th>
      <td><input type="textbox" v-model="password"></td>
    </tr>
    <tr>
    <th>language : </th>
    <td>
        <select v-model="lang">
        <option>en</option>
        <option>ja</option>
        </select>
    </td>
    </tr>
    <tr>
        <th>what is website : </th>
        <td><input type="textbox" placeholder="indeed" v-model="from"></td>
    </tr>
</table>

<br>
<h3>APPLICANT</h3>
<?php foreach ($obj as $d) {?>
<table style="margin:10px;border: 3px green solid;" >
<tr>
  <th><a v-bind:href="'/Applicant/Introduction/index/'+this.lang+'/'">ID</a></th>
  <td>
    <?=$d->applicant_id?>
  </td>
</tr>
<tr>
  <th>NAME</th>
  <td>
    <?=$d->applicant_name?>
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
    <?=$d->deadline?>
  </td>
</tr>

<tr>
  <td><a href="/manage/ApplicantSession/session_save/?applicant_id=<?=$d->applicant_id?>&goto=0" target="blank">Test 1</a></td>
  <td><a href="/manage/ApplicantSession/session_save/?applicant_id=<?=$d->applicant_id?>&goto=1" target="blank">Test 2</a></td>
</tr>
<tr>
  <td><a href="/manage/ApplicantSession/session_save/?applicant_id=<?=$d->applicant_id?>&goto=2" target="blank">Check Controllers</a></td>
  <td><a href="/manage/ApplicantSession/session_save/?applicant_id=<?=$d->applicant_id?>&goto=3" target="blank">Check Views</a></td>
</tr>

</table>
<?php } ?>

</div>

<div id="ad_right"><iframe src="/htm/ad_right/" width="160" height="600" frameborder="0" scrolling="no"></iframe></div>

<script>
var c = new Vue({
  el: '#content',
  data: {
//      uri:this.password+'/'+this.lang+'/'+this.from+'/'
      password:'<?=$manager->password?>'
      ,lang:'en'
      ,from:''
  },
  computed: {
      uri() {
          return this.password+'/'+this.lang+'/'+this.from+'/';
      }
  },
});

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

$('#pass').click(function(){
    c.password = Math.random().toString(32).substring(2);
    var param = {
        _token : $('[name="csrf-token"]').attr('content')
        ,password : c.password
    }
    $.post('/Manage/Password/',param,function(){},"json")
    .always(function(res){
        if(res[0] == 1){
            location.href = '';
        }
    });
});

setTimeout(function(){ga('send', 'pageview')},2000);
</script>
</body>
</html>
