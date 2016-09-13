<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎您使用A+微信托管平台</title>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/flat-ui.min.css">
    <link href="/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/flat-ui.min.js"></script>
    <script src="/admin/js/plugins/toastr/toastr.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        #nav{
            border-radius: 0;
            padding-right: 20px;
        }
        #body{
            margin-top: 60px;
        }
        #body .alert{
            min-height: 550px;
        }
        body{
            background-image: url(/assets/img/bg.gif);
            font-family: '微软雅黑','黑体',sans-serif;
            font-weight: 100;
        }
        #rside{
            font-size: 15px;
        }
        .cen{
            text-align: center;
        }
        .rit{
            text-align: right;
            text-decoration: none;
            list-style: none;
        }
        .bbb {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
        .title {
            font-size: 96px;
            text-align: center;
            margin-top: 14%;
        }
        footer{
            position: fixed;
            bottom:0;
            width:100%;
        }
        footer p{
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
<div class="container-field">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="nav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-5">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="javascript:;">A+微信托管平台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-5">
            <ul class="nav navbar-nav">
                <li class="active"><a href="javascript:;">修改密码</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎: {{$user->name}} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/')}}">返回首页</a></li>
                        <li><a href="javascript:;">账号设置</a></li>
                        <li class="active"><a href="javascript:;">修改密码</a></li>
                        <li class="divider"></li>
                        <li><a href="{{url('auth/logout')}}">安全登出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div class="row" style="width: 100%; margin: 0 auto;padding: 0 10px;">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                ★修改密码
            </div>
            <div class="panel-body">
                <form class="form-horizontal" action="" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">原密码(必填) :</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" name="pwd" placeholder="账号原密码">
                        </div>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">新密码(必填) :</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputPassword3" name="pwd1" placeholder="账号新密码">
                        </div>
                        <span class="text-danger"></span>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">确认密码(必填) :</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputPassword3" name="pwd2" placeholder="再次输入新密码">
                        </div>
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                        <button class="btn btn-success" type="button" style="margin-left:-10px;" id="sub">提交</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>copyright © <a target="_blank" href="http://wp.hhsblog.cn">Mr.Adam 技术支持</a> 2016-2017 </p>
</footer>
</body>
<script>
    var data = {
        _token:$('input[name=_token]').val(),
        pwd:null,
        pwd1:null,
        pwd2:null
    };
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "positionClass": "toast-top-center",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "800",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    $('#sub').click(function(){
        var pwd = $('input[name=pwd]').val();
        var pwd1 = $('input[name=pwd1]').val();
        var pwd2 = $('input[name=pwd2]').val();
        //验证密码长度
        if(pwd1.length < 6){
            toastr.warning("密码长度不能少于6位!");
            return false;
        }
        //判断两个密码是否一样
        if(pwd1 !== pwd2){
            toastr.warning("两次输入的密码不同!");
            return false;
        }
        data.pwd = pwd;
        data.pwd1 = pwd1;
        data.pwd2 = pwd2;
        $.post('{{url('admin/pwd')}}',data,function(res){
            if(res.error >0){
                toastr.warning(res.msg);
            }else if(res.error == 0){
                toastr.success('密码修改成功,下次登录请使用新密码登录!');
            }
        },'json');
    });
</script>
</html>