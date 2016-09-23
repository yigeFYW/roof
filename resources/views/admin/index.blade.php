<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>总览</title>
    @include('comm.css')
    <style>
        #connn .col-xs-4{
            text-align:center;
        }
        #connn a,#connn a:hover{
            text-decoration: none;
            color: #333;
        }
        .bounceIn{
            font-size:30px;
            display: block;
            width:60px;
            margin:0 auto;
            line-height:60px;
            -webkit-border-radius:30px;
            -moz-border-radius:30px;
            border-radius:30px;
            background: #ff9000;
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
                <h2>总览</h2>
                <ol class="breadcrumb">
                    <li>
                        微信公众号总览
                    </li>
                </ol>
            </div>
        </div>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <div class="container">
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="widget style1 navy-bg">
                                                <div class="row">
                                                    <div class="col-xs-4 text-center">
                                                        <i class="fa fa-wechat fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-8 text-right">
                                                        <span> 近7日新关注用户 </span>
                                                        <h2 class="font-bold">232</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="widget style1 navy-bg" style="background-color:#5F7DF2;">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-paper-plane fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-8 text-right">
                                                        <span> 总用户数 </span>
                                                        <h2 class="font-bold">3233</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="widget style1 lazur-bg">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-moon-o fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-8 text-right">
                                                        <span> 本月收入 </span>
                                                        <h2 class="font-bold">￥ 21</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="widget style1 yellow-bg">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-thumbs-o-up fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-8 text-right">
                                                        <span> 总收入 </span>
                                                        <h2 class="font-bold">￥ 232</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" id="connn">
                                        <div class="col-xs-4">
                                            <a href="{{url('admin/media_img')}}">
                                                <i class="fa fa-inbox animated bounceIn"></i>
                                                媒体仓库
                                            </a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href="{{url('admin/text_list')}}">
                                                <i class="fa fa-undo animated bounceIn" style="background-color: #fb6a59;"></i>
                                                回复素材
                                            </a>
                                        </div>
                                        <div class="col-xs-4">
                                            <a href="{{url('admin/wel_list')}}">
                                                <i class="fa fa-pencil animated bounceIn" style="background-color: #96cc6c;"></i>
                                                自定义回复设置
                                            </a>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row" id="connn">
                                        <div class="col-xs-4">
                                            <a href="">
                                                <i class="fa fa-line-chart animated bounceIn" style="background-color: #23c6c8;"></i>
                                                数据统计
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
</script>
</html>
