<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="/components/materialize/css/icon.css?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/components/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/css/member.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<div class="top">
    <div class="container">PC在线加入-注册完成</div>
</div>

<div class="img">
    <img src="/images/WechatIMG67.png">
</div>


<div class="center-align">
    <b>恭喜你注册完成</b>
</div>

<div class="container">
    <p>尊敬的<?= $aryMember->name?>：</p>
    <p>您好！您的申请资料正在审核中，审核完成后将短信通知您，请注意查收！</p>
    <p>邀请您关注 "康宝莱微服务" 微信公众号。</p>
</div>

<footer>
    <button class="waves-effect waves-light btn" style="height: 50px; background-color: #5ebf18">完成</button>
</footer>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/components/materialize/js/materialize.min.js"></script>

<script>
</script>
</body>
</html>
