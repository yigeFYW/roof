<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎您使用小A微信托管平台</title>

	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/flat-ui.min.css">
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/flat-ui.min.js"></script>
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
			font-size: 76px;
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
		.redtext{
			color: #ff9000;
		}
	</style>
</head>
<body>
<header>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="nav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
	        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-5">
	            <span class="sr-only">Toggle navigation</span>
	        </button>
          	<a class="navbar-brand" href="javascript:;">小A微信托管平台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-5">
          	<ul class="nav navbar-nav">

           	</ul>
          	<ul class="nav navbar-nav navbar-right">
            	<li class="dropdown">
              		<a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎: {{$user->name}} <b class="caret"></b></a>
	              	<ul class="dropdown-menu">
	                	<li><a href="{{url('/')}}">返回首页</a></li>
	                	<li><a href="#">修改密码</a></li>
	                	<li class="divider"></li>
	                	<li><a href="{{url('auth/logout')}}">安全登出</a></li>
	              	</ul>
            	</li>
          	</ul>
        </div>
    </nav>
</header>
<div class="title">
	欢迎使用<span class="redtext">小A</span>微信托管平台
	<br>
	@if($user->status == 0)
		<p>系统给您的邮箱: {{$user->email}}发送了一封激活邮件,激活后方可使用本平台!</p>
		@elseif($user->status == 1)
			@if(session('succ'))
				<p>恭喜您邮箱验证成功!</p>
				@endif
			<p>您还没有配置您的公众账号，<a href="{{url('cus/enable')}}">点我进入配置界面</a></p>
		@endif
</div>
<footer>
	<p>copyright © <a href="http://wp.hhsblog.cn">Mr.Adam 技术支持</a> 2016-2017 </p>
</footer>
</body>
</html>