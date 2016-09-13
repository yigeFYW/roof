<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎您使用小A微信托管平台</title>

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/flat-ui.min.css">
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/flat-ui.min.js"></script>
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
			background-image: url(./assets/img/bg.gif);
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
			margin-top: 12%;
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
		#div>div{
			height:200px;
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
          	<a class="navbar-brand" href="javascript:;">A+微信托管平台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-5">
          	<ul class="nav navbar-nav">

           	</ul>
          	<ul class="nav navbar-nav navbar-right">
            	<li class="dropdown">
              		<a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎: {{$user}} <b class="caret"></b></a>
	              	<ul class="dropdown-menu">
	                	<li><a href="{{url('/')}}">返回首页</a></li>
	                	<li><a href="#">账号设置</a></li>
	                	<li><a href="{{url('')}}">修改密码</a></li>
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

	<!-- Button trigger modal -->

</div>
<div style="text-align: center">
	<p>您好，您的公众账号<span class="redtext">{{$name}}</span>信息已配置成功，请点击配置向导按照过程进行最后的认证配置</p>
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="text-align: center">
		配置向导
	</button>
</div>
<br>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h6 class="modal-title" id="myModalLabel">配置向导 <small class="redtext">(按照如下步骤操作)</small></h6>
			</div>
			<div class="modal-body">
				<p>第一步：进入微信公众号平台 <a href="http://mp.weixin.qq.com">mp.weixin.qq.com</a></p>
				<p>第二步：进入“开发”->“基本配置”</p>
				<p>第三步：URL项填写 <span class="redtext">{{$url}}</span></p>
				<p>第四步：ToKen项填写 <span class="redtext">{{$token}}</span></p>
				<p>第五步：点击提交 <span class="redtext">(如果未配置成功，则联系客服处理)</span></p>
				<p>第六步：点击启用按钮</p>
				<p>第七步：使用您的微信给公众号发送"<span class="redtext">{{$rep}}</span>"完成认证启用(注意区分大小写)</p>
				<p>第八步：在此页面安全登出再登录即可进入控制台</p>
			</div>
		</div>
	</div>
</div>
<footer>
	<p>copyright © <a href="http://wp.hhsblog.cn" target="_blank">Mr.Adam 技术支持</a> 2016-2017 </p>
</footer>
</body>
</html>