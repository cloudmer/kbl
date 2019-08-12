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

<div class="top" style="background-color: #5ebf18">
    <div class="container center-align">欢迎注册</div>
</div>

<div class="container">
    <p>完成页面信息填写后，您只需要点击屏幕下方的 "下一步"，并按提示一步一步操作即可</p>
</div>

<?php use yii\bootstrap\ActiveForm;
$form = ActiveForm::begin([
    'id' => 'login-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<div class="container">
    <div class="row">

        <div class="input-field col s11">
            <i class="material-icons prefix">account_circle</i>
            <input id="icon_name" name="username" type="text" class="validate" data-length="12">
            <label for="icon_name">账号</label>
        </div>

        <div class="input-field col s11">
            <i class="material-icons prefix">fingerprint</i>
            <input id="icon_pws" name="password" type="password" class="validate" data-length="12">
            <label for="icon_pws">密码</label>
        </div>
        <div class="input-field col s11">
            <i class="material-icons prefix">fingerprint</i>
            <input id="icon_confirm_psw" name="confirm_password" type="password" class="validate" data-length="12">
            <label for="icon_confirm_psw">确认密码</label>
        </div>

    </div>
</div>

<footer>
    <button type="submit" class="waves-effect waves-light btn" style="height: 50px; background: #5ebf18">下一步</button>
</footer>

<?php ActiveForm::end(); ?>

<div class="container">
    <!-- Page Content goes here -->
</div>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/components/materialize/js/materialize.min.js"></script>

<script>
    M.AutoInit();

    $(document).ready(function() {
        $('input#icon_name, input#icon_pws, input#icon_confirm_psw').characterCounter();
    });

    $(function () {
        $('form').submit(function () {
            var pwd = $('#icon_pws').val();
            var confirm_psw = $('#icon_confirm_psw').val();
            var name = $('#icon_name').val();

            if(name.length <=0) {
                M.toast({html: '请填写用户账号', classes: 'rounded'});
                return false;
            }

            if(pwd.length <=0) {
                M.toast({html: '请填写密码', classes: 'rounded'});
                return false;
            }

            if(confirm_psw.length <=0) {
                M.toast({html: '请填写确认密码', classes: 'rounded'});
                return false;
            }

            if (pwd != confirm_psw) {
                M.toast({html: '两次密码不一致', classes: 'rounded'});
                return false;
            }

            if (name.length > 12) {
                M.toast({html: '账号不能长于11位', classes: 'rounded'});
                return false;
            }

            if (pwd.length > 12) {
                M.toast({html: '密码不能长于11位', classes: 'rounded'});
                return false;
            }

            // 提交
            var post_data = $(this).serializeArray();
            $.post("<?= \yii\helpers\Url::toRoute('user/sign-up');?>", post_data, function (data) {
                if (data.status == -1) {
                    return M.toast({html: data.msg, classes: 'rounded'});
                }
                window.location.href = data.url
            }, 'json')
            return false;
        })
    })
</script>
</body>
</html>
