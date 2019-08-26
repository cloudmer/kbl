<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="/components/materialize/css/icon.css?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/components/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/css/index.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
</head>

<body>

    <div class="top">
        <img src="/images/20190801122953_01.png">
    </div>
    <div class=" container">
<!--        <img style="margin-top: -13px;margin-left: -33px;width: 100px;height: 100px;" src="/images/shou.png">-->
        <a href="<?= \yii\helpers\Url::toRoute(['account/sign-up', 'id' => \Yii::$app->request->get('id')])?>">
            <img style="margin-top: 60px;width: 100%;height: 80px;" src="/images/bt.png">
        </a>
    </div>
    <div class="footer">

    </div>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/components/materialize/js/materialize.min.js"></script>

<script>
    M.AutoInit();

    $(document).ready(function() {
        $('input#icon_telephone, input#icon_name, input#icon_confirm_id, input#icon_id').characterCounter();
    });

</script>
</body>
</html>
