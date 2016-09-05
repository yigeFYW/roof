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
            .reg{
                text-decoration:none;
                color: #ff9000;
            }
        </style>
    </head>

    <body>

        <div class="page-container">

            <h1>微信平台登录</h1>

            <form action="{{url('auth/login')}}" method="post">
                {!! csrf_field() !!}
                <input type="email" name="email" class="username" placeholder="请输入邮箱" required>
                <input type="password" name="password" class="password" placeholder="密码" required>
                <button type="submit">登录</button>
                <br>
                <br>
                <p>没有账号?<a type="button" href="{{url('auth/reg')}}" class="reg">点击注册</a></p>

                <div class="error"><span>+</span></div>
            </form>

            <div class="connect">
                <p>Copyright © <a target="_blank" href="http://wp.hhsblog.cn">Mr.Adam</a> 2016-2017</p>
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
</html>


