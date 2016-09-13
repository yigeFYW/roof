<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改密码</title>
    @include('comm.css')
    <style>
        body{
            font-family: "微软雅黑",sans-serif;
        }
        .pagination .active span{
            background-color: #18a689;
            color: #efefef;
        }
        .pagination .active span:hover{
            background-color: #18a689;
        }
        .pagination{
            position:relative;
            top:-30px;
        }
    </style>
</head>

<body>
<div id="wrapper">
    @include('comm.menu')
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">{{$name}} : 欢迎使用小A微信托管平台.</span>
                    </li>
                    <li>
                        <a href="{{url('auth/logout')}}">
                            <i class="fa fa-sign-out"></i>安全登出
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>系统设置</h2>
                <ol class="breadcrumb">
                    <li>
                        修改密码
                    </li>
                </ol>
            </div>
        </div>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>修改密码</h5>
                        </div>
                        <div class="ibox-content">
                            <form action="" class="form-horizontal">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">账号原密码(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="inputPassword3" value="" name="pwd" placeholder="原密码">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">账号新密码(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="inputPassword3" value="" name="pwd1" placeholder="新密码">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">确认密码(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control" id="inputPassword3" value="" name="pwd2" placeholder="重复输入密码">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <button class="btn btn-success" type="button" style="margin-left:-10px;" id="sub">提交</button>
                                </div>
                                <br>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('comm.admin_footer')
        @include('comm.admin_javascript')
    </div>
</div>
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
        "positionClass": "toast-bottom-center",
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
