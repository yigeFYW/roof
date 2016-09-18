<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>图片素材</title>
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
        .modal .row p,hr{
            margin:0;
        }
        .modal .row hr{
            margin-bottom:5px;
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
                <h2>媒体库</h2>
                <ol class="breadcrumb">
                    <li>
                        图片素材
                    </li>
                </ol>
            </div>
        </div>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="file-manager">
                                <h4>素材类型:</h4>
                                <a href="#" class="file-control active">全部</a>
                                <a href="#" class="file-control">图片</a>
                                <a href="#" class="file-control">视频</a>
                                <a href="#" class="file-control">音频</a>
                                <a href="#" class="file-control">文本</a>
                                <a href="#" class="file-control">文件</a>
                                <div class="hr-line-dashed"></div>
                                    <a href="{{url('admin/media_add')}}" class="btn btn-primary btn-block">上传文件</a>
                                <div class="hr-line-dashed"></div>
                                <h4>格式:</h4>
                                <ul class="folder-list" style="padding: 0">
                                    <li><a href=""><i class="fa fa-folder"></i> 全部格式</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> jpg</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> png</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> gif</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> mp3</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> mp4</a></li>
                                </ul>
                                <h5 class="tag-title">标签:</h5>
                                <ul class="tag-list" style="padding: 0">
                                    <li><a href="">微信</a></li>
                                    <li><a href="">图文</a></li>
                                    <li><a href="">微商城</a></li>
                                    <li><a href="">Children</a></li>
                                    <li><a href="">Holidays</a></li>
                                    <li><a href="">Music</a></li>
                                    <li><a href="">Photography</a></li>
                                    <li><a href="">Film</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>
                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="file-name">
                                    Document_2014.doc
                                    <br/>
                                    <small>上传时间: 2014/03/03</small>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#"  data-toggle="modal" data-target="#infomodal" onclick="media_info_init(this);">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p1.jpg">
                                </div>
                                <div class="file-name">
                                    Italy street.jpg &nbsp;&nbsp;<span style="color: #000;">|</span>&nbsp;&nbsp;
                                    <a style="padding: 0;text-align: right;color: #ff9000;" href="javascript:;">替换</a>
                                    <br/>
                                    <small>Added: Jan 6, 2014</small>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p2.jpg">
                                </div>
                                <div class="file-name">
                                    My feel.png
                                    <br/>
                                    <small>Added: Jan 7, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-music"></i>
                                </div>
                                <div class="file-name">
                                    Michal Jackson.mp3
                                    <br/>
                                    <small>Added: Jan 22, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p3.jpg">
                                </div>
                                <div class="file-name">
                                    Document_2014.doc
                                    <br/>
                                    <small>Added: Fab 11, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="img-responsive fa fa-film"></i>
                                </div>
                                <div class="file-name">
                                    Monica's birthday.mpg4
                                    <br/>
                                    <small>Added: Fab 18, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <a href="#">
                            <div class="file">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="file-name">
                                    Annual report 2014.xls
                                    <br/>
                                    <small>Added: Fab 22, 2014</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-file"></i>
                                </div>
                                <div class="file-name">
                                    Document_2014.doc
                                    <br/>
                                    <small>Added: Jan 11, 2014</small>
                                </div>
                            </a>
                        </div>

                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p1.jpg">
                                </div>
                                <div class="file-name">
                                    Italy street.jpg
                                    <br/>
                                    <small>Added: Jan 6, 2014</small>
                                </div>
                            </a>

                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p2.jpg">
                                </div>
                                <div class="file-name">
                                    My feel.png
                                    <br/>
                                    <small>Added: Jan 7, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-music"></i>
                                </div>
                                <div class="file-name">
                                    Michal Jackson.mp3
                                    <br/>
                                    <small>Added: Jan 22, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="image">
                                    <img alt="image" class="img-responsive" src="img/p3.jpg">
                                </div>
                                <div class="file-name">
                                    Document_2014.doc
                                    <br/>
                                    <small>Added: Fab 11, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <div class="file">
                            <a href="#">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="img-responsive fa fa-film"></i>
                                </div>
                                <div class="file-name">
                                    Monica's birthday.mpg4
                                    <br/>
                                    <small>Added: Fab 18, 2014</small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="file-box">
                        <a href="#">
                            <div class="file">
                                <span class="corner"></span>

                                <div class="icon">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="file-name">
                                    Annual report 2014.xls
                                    <br/>
                                    <small>Added: Fab 22, 2014</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="infomodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content animated fadeIn">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <p class="modal-title">图片详细信息</p>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="icon" style="font-size: 100px;line-height: 1em;display:none;">
                                    <i class="fa fa-music"></i>
                                </div>
                                <img src="img/p2.jpg" alt="" style="width:100%;" class="img-rounded">
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p><label>文件名:&nbsp;</label><span id="media_img_name">2016090212145596.jpg</span></p>
                                        <p><label>文件类型:&nbsp;</label><span id="media_img_type">image/jpeg</span></p>
                                        <p><label>上传于:&nbsp;</label><span id="media_img_subtime">2016年9月2日</span></p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p><label>文件大小:&nbsp;</label><span id="media_img_size">30kb</span></p>
                                        <p><label>分辨率:&nbsp;</label><span id="media_img_res">400*233</span></p>
                                        <p><label>上传者:&nbsp;</label><span id="media_img_auth"></span>Mr.adam</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-2" style="padding: 0;line-height: 2.5em;">
                                            URL:
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputEmail3" value="http://wx.hhsblog.cn/public/sdf.jpg" readonly>
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-2" style="padding: 0;line-height: 2.5em;">
                                            文件描述:
                                        </div>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="" value="这是一张图片">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="col-lg-2" style="padding: 0;line-height: 2.5em;">
                                            文件标签:
                                        </div>
                                        <div class="col-lg-10">
                                            <ul class="tag-list" style="padding: 0">
                                                <li><a href="">微信</a></li>
                                                <li><a href="">图文</a></li>
                                                <li><a href="">微商城</a></li>
                                            </ul>
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
    $(document).ready(function(){
        $('.file-box').each(function() {
            animationHover(this, 'pulse');
        });
    });
    function media_info_init(th){

    }
</script>
</html>
