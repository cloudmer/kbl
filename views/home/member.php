<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="/components/materialize/css/icon.css?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="/components/materialize/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="/css/sign-up.css"  media="screen,projection"/>


    <script src="/js/jquery-1.9.1.min.js"></script>
    <link href="/components/mobiscroll/css/mobiscroll.custom-2.6.2.min.css" rel="stylesheet" type="text/css" />
    <script src="/components/mobiscroll/js/mobiscroll.custom-2.6.2.min.js" type="text/javascript"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">

    <style>
        th{
            border-right: 1px solid #ededed;
            text-align: center;
        }
        td{
            border-right: 1px solid #ededed;
            text-align: center;
        }
    </style>
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

<form>
    <input id="page" type="hidden" name="page" value="1">
    <div class="container">
        <div class="input-field col s12">
            <input placeholder="按时间搜索" id="date" name="date" type="text" style="border: 0.5px solid #ededed; border-radius: 3px; height: 35px; font-size: 1px; padding-left: 10px">
        </div>
        <div class="input-field col s12">
            <input placeholder="关键字搜索" id="keyword" name="keyword" type="text" style="border: 0.5px solid #ededed; border-radius: 3px; height: 35px; font-size: 1px; padding-left: 10px">
        </div>

        <div class="row">
            <div class="col s4 left-align">
                <a id="search" class="waves-effect waves-light btn" style="background: #5ebf18">搜索</a>
            </div>
            <div class="col s4 center-align">
<!--                <a href="/home/export?export=1" id="export" class="waves-effect waves-light btn">导出</a>-->
                <a id="export" class="waves-effect waves-light btn" style="background: #5ebf18">导出</a>
            </div>
            <div class="col s4 right-align">
                <a id="reset" class="waves-effect waves-light btn" style="background: #5ebf18">重置</a>
            </div>
        </div>
    </div>
</form>

<div>
    <table class="striped text-" style="border: 1px solid #ededed">
        <thead>
        <tr>
            <th>电话</th>
            <th>身份证</th>
        </tr>
        </thead>

        <tbody>
        
        </tbody>
    </table>

</div>

<div class="container center-align">
    <div id="mor"><p>点击加载更多</p></div>
    <div id="hid" class="hide"><p>没有更多了</p></div>
</div>

<!--JavaScript at end of body for optimized loading-->
<!--<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>-->
<script type="text/javascript" src="/components/materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="/components/html5-time/js/mobiscroll.custom-2.6.2.min.js"></script>

<script>

    function getData() {
        var get_data = $("form").serializeArray()
        $.get("<?= \yii\helpers\Url::toRoute('home/member-data')?>", get_data, function (data) {
            if (data.html) {
                $("tbody").append(data.html)
            }else{
                $('#mor').addClass('hide')
                $('#hid').removeClass('hide')
            }
        }, 'json')
    }
    getData();
    
    $(function () {
        $('#search').click(function () {
            $('#page').val(1)
            $("tbody").html('')
            $('#mor').removeClass('hide')
            $('#hid').addClass('hide')
            getData();
        })
        $('#reset').click(function () {
            $('#page').val(1)
            $("tbody").html('')
            $('#mor').removeClass('hide')
            $('#hid').addClass('hide')
            $('#date').val('')
            $('#keyword').val('')
            getData();
        })
        $('#mor').click(function () {
            $('#page').val(parseInt($("#page").val()) + 1);
            getData();
        })
        $('#export').click(function () {
            var url = '/home/export?export=1&date='+$('#date').val()+'&keyword='+$('#keyword').val()
            $(this).attr('href', url)
        })
    })
</script>

<script>
    $("#date").mobiscroll({
        preset: 'date',
        theme: 'ios',
        lang: 'zh',
        mode: 'scroller',
        dateFormat: 'yyyy-mm-dd',
        setText: '确定',
        // cancelText: '清空',
        dateOrder: 'yymmdd',
        dayText: '日',
        monthText: '月',
        yearText: '年',
        startYear: (new Date()).getFullYear(),
        endYear: (new Date()).getFullYear() + 9,
        showNow: true,
        nowText: "明天",
        showOnFocus: false,
        height: 45,
        width: 90,
        rows: 3
    });
</script>

</body>
</html>
