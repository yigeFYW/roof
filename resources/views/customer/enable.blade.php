<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎您使用A+微信托管平台</title>

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
				<li class="active"><a href="javascript:;">账号初始化</a></li>
           	</ul>
          	<ul class="nav navbar-nav navbar-right">
            	<li class="dropdown">
              		<a href="#" class="dropdown-toggle" data-toggle="dropdown">欢迎: {{$user->name}} <b class="caret"></b></a>
	              	<ul class="dropdown-menu">
	                	<li><a href="#">返回首页</a></li>
	                	<li><a href="javascript:;">账号设置</a></li>
	                	<li><a href="#">修改密码</a></li>
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
				★账号初始化
			</div>
			<div class="panel-body">
				<div class="alert alert-warning alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<strong>注意！</strong>
					请登录微信公众平台 <a href="http://mp.weixin.qq.com" target="_blank">http://mp.weixin.qq.com</a> ，按照以下说明如实填写您的公众号信息,如果填错,可能会影响您的正常使用！
				</div>

				<form class="form-horizontal" action="" method="post">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">公众号名称(必填) :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="wechat_name" placeholder="公众号名称（例：宁夏E营销）">
						</div>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">公众号类型 :</label>
						<div class="col-sm-5">
							<select class="form-control" name="wechat_cat" style="display: inline;">
								<option value="0">普通订阅号</option>
								<option value="1">通过认证的订阅号</option>
								<option value="2">普通服务号</option>
								<option value="3">通过认证的服务号</option>
							</select>
						</div>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">公众号原始ID(必填) :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputPassword3" name="wechat_id" placeholder="公众号原始ID（例：gh_ac97ce30c110）">
						</div>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">微信号(必填) :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputPassword3" name="wechat_num" placeholder="您的微信账号（例：huanghe6233）">
						</div>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">公众号AppId(必填) :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputPassword3" name="appid" placeholder="您的开发者AppID">
						</div>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">公众号AppSecret(必填) :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputPassword3" name="appsecret" placeholder="您的应用密钥">
						</div>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">公众号EncodingAESKey :</label>
						<div class="col-sm-5">
							<input type="text" class="form-control" id="inputPassword3" name="aeskey" placeholder="消息加解密密钥(如果选择明文模式则可以不填)">
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
	<p>copyright © <a href="http://wp.hhsblog.cn">Mr.Adam 技术支持</a> 2016-2017 </p>
</footer>
</body>
<script>
	var data = {
		_token:null,
		wechat_name:null,
		wechat_id:null,
		wechat_cat:null,
		wechat_num:null,
		appid:null,
		appsecret:null,
		aeskey:null
	};
	$('#sub').click(function(){
		data.wechat_name = $("input[name='wechat_name']").val();
		data.wechat_id = $("input[name='wechat_id']").val();
		data.wechat_cat = $("select[name='wechat_cat']").val();
		data.wechat_num = $("input[name='wechat_num']").val();
		data.appid = $("input[name='appid']").val();
		data.appsecret = $("input[name='appsecret']").val();
		data.aeskey = $("input[name='aeskey']").val();
		data._token = $("input[name='_token']").val();
		$.post('{{url('cus/enable')}}',data,function(res){
			if(res.error > 0){
				$("input[name='"+res.list+"']").parent().siblings('.text-danger').html(res.msg);
				var del = function(){$("input[name='"+res.list+"']").parent().siblings('.text-danger').empty();}
				setTimeout(del,3000);
			}else if(res.error == 0){
				window.location = res.msg;
			}
		},'json');
	});
</script>
</html>