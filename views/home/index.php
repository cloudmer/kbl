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
    <div class="col s11" style="margin-top: 2px;">
        <b><?= $user->username ?></b>
    </div>
</div>

<div class="row center-align">
    <div class="col s6">
        <a href="<?= \yii\helpers\Url::toRoute('home/qr') ?>">
            <i class="material-icons prefix" style="font-size: 40px; color: #4db6ac">crop_free</i>
            <div style="color: #0f0f0f">二维码</div>
        </a>
    </div>
    <div class="col s6" style="margin-top: 2px;">
        <a href="<?= \yii\helpers\Url::toRoute('home/member') ?>">
            <i class="material-icons prefix" style="font-size: 40px; color: #4db6ac">group</i>
            <div style="color: #0f0f0f">我的成员</div>
        </a>
    </div>
</div>

<div class="row center-align">
    <div class="col s6" style="margin-top: 2px;">
        <?php if (\Yii::$app->user->identity->is_admin == 2):?>
        <a href="<?= \yii\helpers\Url::toRoute('home/members') ?>">
            <i class="material-icons prefix" style="font-size: 40px; color: #4db6ac">group</i>
            <div style="color: #0f0f0f">所有成员</div>
        </a>
        <?php endif; ?>
    </div>
    <div class="col s6" style="margin-top: 2px;">
        <?php if (\Yii::$app->user->identity->is_admin == 2):?>
            <a href="<?= \yii\helpers\Url::toRoute('home/team') ?>">
                <i class="material-icons prefix" style="font-size: 40px; color: #4db6ac">group_work</i>
                <div style="color: #0f0f0f">我的团队</div>
            </a>
        <?php endif; ?>
    </div>
</div>

<footer>
    <a href="<?= \yii\helpers\Url::toRoute('user/sign-out')?>" class="waves-effect waves-light btn" style="height: 50px; width: 100%; line-height: 48px; background: #5ebf18">退出登陆</a>
</footer>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/components/materialize/js/materialize.min.js"></script>

<script>
</script>
</body>
</html>
