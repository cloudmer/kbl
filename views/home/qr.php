<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="/components/materialize/css/icon.css?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/components/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/css/sign-up.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<div class="top row" style="background-color: #5ebf18">
    <div class="col s1">
        <i class="material-icons prefix">person</i>
    </div>
    <div class="col s10" style="margin-top: 2px;">
        <b><?= $user->username ?></b>
    </div>
</div>

<div id="qr" class="container center-align" style="margin-top: 50px"></div>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/components/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="/js/jquery.qrcode.min.js"></script>

<script>
    
    $(function () {
        jQuery('#qr').qrcode("<?= \Yii::$app->request->hostInfo ?>/account/index?id=<?= $user->id ?>" );
    })

</script>
</body>
</html>
