<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="utf-8">
        <title>微信托管平台|小A出品</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="/assets/css/reset.css">
        <link rel="stylesheet" href="/assets/css/supersized.css">
        <link rel="stylesheet" href="/assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style>
            .redt{
                margin-top: 4px;
                display:block;
                color: red;
                font-size:10px;
            }
            .reg{
                text-decoration:none;
                color: #ff9000;
            }
        </style>
    </head>

    <body>

        <div class="page-container">
            <h1>微信平台注册</h1>
            <form action="{{url('auth/reg')}}" method="post">
                {!! csrf_field() !!}
                <input type="text" name="name" class="username" placeholder="用户名" required>
                <label class="redt" id="err_name"></label>
                <input type="email" name="email" class="email" placeholder="邮箱" required>
                <label class="redt" id="err_email"></label>
                <input type="password" name="password" class="password" placeholder="密码" required>
                <label class="redt" id="err_pwd1"></label>
                <input type="password" name="password_confirmation" class="passwordtwo" placeholder="确认密码" required>
                <label class="redt" id="err_pwd2"></label>
                <button type="submit">注册</button>
                <br>
                <br>
                <p>已有账号?<a type="button" href="{{url('auth/login')}}" class="reg">点击登录</a></p>
            </form>
            <div class="connect">
                <p>Copyright © Mr.Adam 2016-2017</p>
                <!--<p>
                    <a class="facebook" href=""></a>
                    <a class="twitter" href=""></a>
                </p>-->
            </div>
        </div>
		
        <!-- Javascript -->
        <script src="/assets/js/jquery-1.8.2.min.js"></script>
        <script src="/assets/js/supersized.3.2.7.min.js"></script>
        <script src="/assets/js/supersized-init.js"></script>
        <script src="/assets/js/scripts.js"></script>

    </body>
    <script>
        var data = {
            _token: $("input[name='_token']").val(),
        };
        $("input[name='name']").change(function(){
            data.name = $("input[name='name']").val();
            $.post('{{url('auth/check')}}',data,function(res){
                if(res.error == 1 ){
                    $('#err_name').html(res.msg);
                    $("input[name='name']").css('border','1px solid red');
                }else if(res.error == 0){
                    $('#err_name').html('');
                    $("input[name='name']").css('border','none');
                }
            },'json');
        });
        $("input[name='email']").change(function(){
            data.email = $("input[name='email']").val();
            $.post('{{url('auth/check')}}',data,function(res){
                if(res.error == 1 ){
                    $('#err_email').html(res.msg);
                    $("input[name='email']").css('border','1px solid red');
                }else if(res.error == 0){
                    $('#err_email').html('');
                    $("input[name='email']").css('border','none');
                }
            },'json');
        });
        $("input[name='password']").change(function(){
            pwd();
            var a = $("input[name='password']").val();
            if(a.length == 0){
                $('#err_pwd1').html('');
                $("input[name='password']").css('border','none');
            }else if(a.length < 6){
                $('#err_pwd1').html('密码过短，请慎重考虑！');
                $("input[name='password']").css('border','1px solid red');
            }else if(a.length >=6){
                $('#err_pwd1').html('');
                $("input[name='password']").css('border','none');
            }
        });
        $("input[name='password_confirmation']").change(function(){
            pwd();
        });
        function pwd(){
            var pwd1 = $("input[name='password']").val();
            var pwd2 = $("input[name='password_confirmation']").val();
            if(pwd1 !== pwd2 && pwd2.length != ''){
                $('#err_pwd2').html('两次密码不一致！');
                $("input[name='password']").css('border','1px solid red');
                $("input[name='password_confirmation']").css('border','1px solid red');
            }else if(pwd2 == ''){
                $('#err_pwd2').html('');
                $("input[name='password_confirmation']").css('border','none');
                $("input[name='password']").css('border','none');
            }else if(pwd2 == pwd1 && pwd1.length >= 6){
                $('#err_pwd2').html('');
                $("input[name='password_confirmation']").css('border','none');
                $("input[name='password']").css('border','none');
            }
        }
    </script>
</html>


