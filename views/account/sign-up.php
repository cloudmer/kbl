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
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <style>
        .character-counter{
            display: none;
        }
        input {
            border: 1px solid #D9D9D9;
            border-radius: 3px;
            outline: none;
            -webkit-appearance: none; /*去除系统默认的样式*/
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0); /* 点击高亮的颜色*/
            -webkit-box-shadow: none;
            outline: none;
            border-bottom: 1px solid #ffffff;-webkit-box-shadow: 0 1px 0 0 #ffffff;box-shadow: 0 1px 0 0 #ffffff;
        }
    </style>
</head>

<body>

<div class="top">
    <div class="container">PC在线加入-欢迎注册</div>
</div>
<div style="padding-left: 10px">
    <p>欢迎注册康宝莱贵宾顾客</p>
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

<input type="hidden" name="recommend_id" value="<?= \Yii::$app->request->get('id') ?>">

<div class="row">
    <div class="col s1 left-align red-text" style="padding-top: 7px">* </div>
    <div class="col s3 right-align" style="padding: 0px; padding-top: 7px;">身份证号：</div>
    <div class="col s8" style="padding: 0px; padding-right: 30px" >
        <input id="icon_id" name="identity_card" type="number" placeholder="请填写您的身份证号" oninput="value=value.replace(/[^\d]/g,'')" style="border: 0.5px solid #ededed; border-radius: 3px; height: 35px; font-size: 15px; padding-left:10px;-webkit-box-shadow: none;outline: none;border-bottom: 0.5px solid #ededed;-webkit-box-shadow: 0 1px 0 0 #ffffff;box-shadow: 0 1px 0 0 #ffffff;" >
    </div>
</div>

<div class="row">
    <div class="col s1 left-align red-text" style="padding-top: 7px">* </div>
    <div class="col s3 right-align" style="padding: 0px; padding-top: 7px;">确认身份证：</div>
    <div class="col s8" style="padding: 0px; padding-right: 30px" >
        <input id="icon_confirm_id" name="confirm_identity_card" type="number" placeholder="请确认身份证" oninput="value=value.replace(/[^\d]/g,'')" style="border: 0.5px solid #ededed; border-radius: 3px; height: 35px; font-size: 15px; padding-left:10px;-webkit-box-shadow: none;outline: none;border-bottom: 0.5px solid #ededed;-webkit-box-shadow: 0 1px 0 0 #ffffff;box-shadow: 0 1px 0 0 #ffffff;" >
    </div>
</div>

<div class="row">
    <div class="col s1 left-align red-text" style="padding-top: 7px">* </div>
    <div class="col s3 right-align" style="padding: 0px; padding-top: 7px;">姓名：</div>
    <div class="col s8" style="padding: 0px; padding-right: 30px" >
        <input id="icon_name" name="name" type="text" placeholder="请输入姓名" style="border: 0.5px solid #ededed; border-radius: 3px; height: 35px; font-size: 15px; padding-left:10px;-webkit-box-shadow: none;outline: none;border-bottom: 0.5px solid #ededed;-webkit-box-shadow: 0 1px 0 0 #ffffff;box-shadow: 0 1px 0 0 #ffffff;" >
    </div>
</div>

<div class="row">
    <div class="col s1 left-align red-text" style="padding-top: 7px">* </div>
    <div class="col s3 right-align" style="padding: 0px; padding-top: 7px;">电话：</div>
    <div class="col s8" style="padding: 0px; padding-right: 30px" >
        <input id="icon_telephone" name="phone" type="tel" oninput="value=value.replace(/[^\d]/g,'')" placeholder="请输入电话" style="border: 0.5px solid #ededed; border-radius: 3px; height: 35px; font-size: 15px; padding-left:10px;-webkit-box-shadow: none;outline: none;border-bottom: 0.5px solid #ededed;-webkit-box-shadow: 0 1px 0 0 #ffffff;box-shadow: 0 1px 0 0 #ffffff;" >
    </div>
</div>

<!--<div class="container">-->
<!--    <div class="row">-->
<!--        <div class="input-field col s11">-->
<!--            <i class="material-icons prefix">fingerprint</i>-->
<!--            <input id="icon_id" name="identity_card" type="number" class="validate" oninput="value=value.replace(/[^\d]/g,'')" data-length="18">-->
<!--            <label for="icon_id">身份证号</label>-->
<!--        </div>-->
<!--        <div class="input-field col s11">-->
<!--            <i class="material-icons prefix">fingerprint</i>-->
<!--            <input id="icon_confirm_id" name="confirm_identity_card" type="number" class="validate" oninput="value=value.replace(/[^\d]/g,'')" data-length="18">-->
<!--            <label for="icon_confirm_id">确认身份证号</label>-->
<!--        </div>-->
<!--        <div class="input-field col s11">-->
<!--            <i class="material-icons prefix">account_circle</i>-->
<!--            <input id="icon_name" name="name" type="text" class="validate" data-length="11">-->
<!--            <label for="icon_name">姓名</label>-->
<!--        </div>-->
<!--        <div class="input-field col s11">-->
<!--            <i class="material-icons prefix">phone</i>-->
<!--            <input id="icon_telephone" name="phone" type="tel" oninput="value=value.replace(/[^\d]/g,'')" class="validate" data-length="11">-->
<!--            <label for="icon_telephone">电话</label>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

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
        $('input#icon_telephone, input#icon_name, input#icon_confirm_id, input#icon_id').characterCounter();
    });
    
    $(function () {
        $('form').submit(function () {
            var id = $('#icon_id').val();
            var confirm_id = $('#icon_confirm_id').val();
            var name = $('#icon_name').val();
            var telephone = $('#icon_telephone').val();

            if(id.length <=0) {
                M.toast({html: '请填写身份证号', classes: 'rounded'});
                return false;
            }

            if(confirm_id.length <=0) {
                M.toast({html: '请填写确认身份证号', classes: 'rounded'});
                return false;
            }

            if(name.length <=0) {
                M.toast({html: '请填写姓名', classes: 'rounded'});
                return false;
            }

            if(telephone.length <=0) {
                M.toast({html: '请填写电话', classes: 'rounded'});
                return false;
            }


            if (id != confirm_id) {
                M.toast({html: '身份证号不一致', classes: 'rounded'});
                return false;
            }

            if (id.length > 18 || confirm_id.length > 18) {
                M.toast({html: '身份证号错误', classes: 'rounded'});
                return false;
            }

            if (name.length > 11) {
                M.toast({html: '姓名不能长于11位', classes: 'rounded'});
                return false;
            }

            if (telephone.length > 11) {
                M.toast({html: '电话错误', classes: 'rounded'});
                return false;
            }

            // 提交
            var post_data = $(this).serializeArray();
            $.post("<?= \yii\helpers\Url::toRoute('account/sign-up');?>", post_data, function (data) {
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
        