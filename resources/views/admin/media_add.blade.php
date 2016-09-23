<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上传素材</title>
    @include('comm.css')
    <link rel="stylesheet" href="/admin/css/plugins/dropzone/dropzone.css">
    <style>
        #my-awesome-dropzone{
            border-radius: 10px;
            border:5px solid #bbb;
            min-height: 152px;
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
                        上传多媒体素材
                    </li>
                </ol>
            </div>
        </div>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>上传多媒体素材</h5>
                        </div>
                        <div class="ibox-content">
                            <form id="my-awesome-dropzone" class="dropzone" action="{{url('test3')}}">
                                {!! csrf_field() !!}
                                <div class="dropzone-previews"></div>
                                <button type="submit" class="btn btn-primary pull-right">上传!</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('comm.admin_footer')
        @include('comm.admin_javascript')
        <script src="/admin/js/plugins/dropzone/dropzone.js"></script>
    </div>
</div>
</body>

<script>

    $(document).ready(function(){
        Dropzone.options.myAwesomeDropzone = {
            paramName: "pic", //设置传输文件名称参数. 默认是 file
            maxFilesize: 8, //上传文件的大小限制(以M为单位)
            maxFiles: 100,
            uploadMultiple:true,//是否 Dropzone 应该在一个请求中发送多个文件.
            dictMaxFilesExceeded:"文件太大了",
            dictFileTooBig:"当前文件大小@{{filesize}}M,最大只能上传@{{maxFilesize}}M的文件!",
            dictResponseError:"错误@{{statusCode}}",
            acceptedFiles:".jpg,.png",
            autoProcessQueue: true,
            accept: function(file, done) {
                if (file.name == "201577221109505955.jpg") {
                    done("您的文件名重复了");
                    return false;
                }else {
                    done();
                }
            },
            init:function(){
                var myDropzone = this;
                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                myDropzone.on("complete", function(file) {
                    //上传完成执行
                });
            }
        };
    });
    window.onload = function(){
        $('.dz-message').html("<span style='font-size:20px;color:#999;'>将文件拖入或点击</span>");
    }
</script>
</html>
