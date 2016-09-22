<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>上传素材</title>
    @include('comm.css')
    <link href="css/plugins/dropzone/dropzone.css" rel="stylesheet">
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

            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 10,

            // Dropzone settings
            init: function() {
                var myDropzone = this;

                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {

                    e.preventDefault();
                    e.stopPropagation();

                    myDropzone.processQueue();
                });
                this.on("sendingmultiple", function() {
                    return false;
                });
                this.on("successmultiple", function(files, response) {

                });
                this.on("errormultiple", function(files, response) {

                });
            }

        }

    });
</script>
</html>
