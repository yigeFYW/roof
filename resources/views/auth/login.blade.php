<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A+微信托管平台|最好的微信平台</title>
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="/admin/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <style>
        body{
            font-family:'微软雅黑',sans-serif;
            background-image:url(/admin/img/login_bgx.gif);
        }
        #include{
            background: #fff;
            padding:0 40px 20px 40px;
            border-radius: 5px;
            -webkit-box-shadow: 2px 1px 5px #aaa;
            -moz-box-shadow: 2px 1px 5px #aaa;
            box-shadow: 2px 1px 5px #aaa;
        }
        #include .tooltip-inner{
            background-color: rgba(255,144,0,0.4);
        }
        .tooltip.bottom .tooltip-arrow{
            border-bottom-color: rgba(255,144,0,0.4);
        }
    </style>
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div id="include">
            <div>
                <h1 class="logo-name" style="margin-top:0px;"><img src="/admin/img/A+.png" alt=""></h1>
            </div>
            <h4>欢迎使用A+微信托管平台</h4>
            <p>本平台仅供测试使用!<br>如有BUG,欢迎来信指正!</p>
            <form class="m-t" role="form" action="{{url('auth/login')}}" method="post">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control tool" name="email" placeholder="Email" data-toggle="tooltip" data-placement="bottom" title="请填入注册的邮箱">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control tool" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登录</button>
                <a href="#"><small>忘记密码?</small></a>
                <p class="text-muted text-center"><small>没有账号?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{url('auth/reg')}}">创建一个账号</a>
            </form>
            <p class="m-t"> <small>技术支持: <a href="http://wp.hhsblog.cn" target="_blank">Mr.Adam</a>&nbsp;&nbsp;&copy; 2016-2017</small> </p>
            <p class="m-t">来信请寄 <span style="color:#ff9000;">1015517471@qq.com</span></p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/admin/js/jquery-2.1.1.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <!-- Toastr script -->
    <script src="/admin/js/plugins/toastr/toastr.min.js"></script>

</body>
<script>
    $('.tool').tooltip();
</script>
</html>
