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
                <h4>注册</h4>
            </div>
            <h4>欢迎使用A+微信托管平台</h4>
            <p>本平台仅供测试使用!<br>如有BUG,欢迎来信指正!</p>
            <form class="m-t" role="form" action="{{url('auth/reg')}}" method="post" onsubmit="return checkSubmit();">
                {!! csrf_field() !!}
                <div class="form-group">
                    <input type="text" class="form-control tool" name="name" placeholder="账号昵称" data-toggle="tooltip" data-placement="bottom" title="请填写您的账号昵称">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control tool" name="email" placeholder="邮箱" data-toggle="tooltip" data-placement="bottom" title="系统会发送一封确认邮件,请填入正确的邮箱">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control tool" name="password" placeholder="密码" data-toggle="tooltip" data-placement="bottom" title="密码不少于6位,请尽量复杂">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control tool" name="password_confirmation" placeholder="确认密码">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">注册</button>
                <a class="btn btn-sm btn-white btn-block" href="{{url('auth/login')}}">已有账号? 前去登录</a>
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
   }
   $('.tool').tooltip();
    function checkSubmit(){
        var mail_patt = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var mail = $("input[name='email']").val();
        var name = $("input[name='name']").val();
        var pwd1 = $("input[name='password']").val();
        var pwd2 = $("input[name='password_confirmation']").val();
        //判断昵称是否为空
        if (name.replace(/(^\s*)/g, "").length ==0){
            toastr.warning("请输入昵称!");
            return false;
        } 
        //判断邮箱格式
        if(!mail_patt.test(mail)){
            toastr.warning("邮件格式不正确,请填入正确的邮箱!");
            return false;
        }
        //判断密码长度
        if(pwd1.length < 6){
            toastr.warning("密码长度不少于6位!");
            return false;
        }
        //判断两个密码是否一样
        if(pwd1 !== pwd2){
            toastr.warning("两次输入的密码不同!");
            return false;
        }
    }
</script>
</html>
