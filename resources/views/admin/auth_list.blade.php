<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>系统设置</title>
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
                        授权设置
                    </li>
                </ol>
            </div>
        </div>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>授权设置</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" action="" method="post">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">公众号名称(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="wechat_name" value="{{$acc_list->acc_name}}" placeholder="公众号名称（例：宁夏E营销）">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">公众号类型 :</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" active="{{$acc_list->acc_cat}}" name="wechat_cat" style="display: inline;" disabled>
                                            <option value="0">普通订阅号</option>
                                            <option value="1">通过认证的订阅号</option>
                                            <option value="2">普通服务号</option>
                                            <option value="3">通过认证的服务号</option>
                                        </select>
                                        <script>
                                            var select_v = $('select').attr('active');
                                            $('option')[select_v].selected = true;
                                        </script>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">公众号原始ID(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputPassword3" value="{{$acc_list->acc_id}}" name="wechat_id" placeholder="公众号原始ID（例：gh_ac97ce30c110）" disabled>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">微信号(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputPassword3" value="{{$acc_list->acc_wechat}}" name="wechat_num" placeholder="您的微信账号（例：huanghe6233）">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">认证Token(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputPassword3" value="{{$acc_list->acc_token}}" name="wechat_token" placeholder="您的消息认证Token">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">公众号AppId(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputPassword3" name="appid" value="{{$acc_list->acc_appid}}" placeholder="您的开发者AppID" disabled>
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">公众号AppSecret(必填) :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputPassword3" value="{{$acc_list->acc_secret}}" name="appsecret" placeholder="您的应用密钥">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">公众号EncodingAESKey :</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="inputPassword3" name="aeskey" value="{{$acc_list->acc_aeskey}}" placeholder="消息加解密密钥(如果选择明文模式则可以不填)">
                                    </div>
                                    <span class="text-danger"></span>
                                </div>
                                <div class="col-sm-2"></div>
                                <div class="col-sm-5">
                                    <button class="btn btn-success" type="button" style="margin-left:-10px;" id="sub">提交</button>
                                </div>
                            </form>
                            <br>
                            <br>
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
        wechat_name:null,
        wechat_num:null,
        appsecret:null,
        aeskey:null,
        token:null,
        _token:$('input[name=_token]').val()
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
        data.wechat_name = $("input[name=wechat_name]").val();
        data.wechat_num = $("input[name=wechat_num]").val();
        data.appsecret = $("input[name=appsecret]").val();
        data.aeskey = $("input[name=aeskey]").val();
        data.token = $("input[name=token]").val();
        $.post('{{url('admin/auth')}}',data,function(res){
            //toastr.warning("邮箱或密码不正确!");
            if(res.error > 0){
                toastr.warning(res.msg);
            }else if(res.error == 0){
                toastr.success("修改成功,请到公众号后台进行相应配置!");
            }
        },'json');
    });
</script>
</html>
