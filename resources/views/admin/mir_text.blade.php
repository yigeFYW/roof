<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>公众号基本功能</title>

    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="/admin/css/animate.css" rel="stylesheet">
    <link href="/admin/css/style.css" rel="stylesheet">
    <link href="/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="/admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
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

<nav class="navbar-default navbar-static-side lift-nav" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img src="/admin/img/zender_logo.png" alt="">
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li  class="active">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">公众号基本功能</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li  class="active"><a href="index.html">素材列表</a></li>
                    <li><a href="dashboard_2.html">微信欢迎语</a></li>
                    <li><a href="dashboard_3.html">微信自动回复</a></li>
                    <li><a href="dashboard_4_1.html">微信群发消息</a></li>
                    <li><a href="dashboard_5.html">自定义菜单设置</a></li>
                </ul>
            </li>
            <li>
                <a href="layouts.html"><i class="fa fa-diamond"></i> <span class="nav-label">Layouts</span></a>
            </li>
            
            <li class="special_link">
                <a href="package.html"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
            </li>
        </ul>
    </div>
</nav>

<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">xxx : Welcome to INSPINIA+ Admin.</span>
            </li>
            
            <li>
                <a href="login.html">
                    <i class="fa fa-sign-out"></i>安全登出
                </a>
            </li>
        </ul>

    </nav>
</div>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>公众号基本功能</h2>
        <ol class="breadcrumb">
            <li>
                <a href="javascript:;">素材列表</a>/
            </li>
            <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" aria-expanded="false">文本素材<span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a href="#">图文素材</a></li>
                    <li><a href="#">图片素材</a></li>
                    <li><a href="#">声音素材</a></li>
                    <li><a href="#">视频素材</a></li>
                </ul>
            </div>
        </ol>
    </div>
</div>


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>文本素材列表</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-5 m-b-xs">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addmodal">添加</button>
                                    &nbsp;
                                    <button class="btn btn-danger btn-sm" id="zdel">删除</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>文本内容</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbdy">
                                    @foreach($text_list as $v)
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" value="{{$v->mid}}" name="input[]"></td>
                                        <td class="con">{{$v->content}}</td>
                                        <td class="id" style="display:none;">{{$v->mid}}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editmodal">编辑</button>
                                            <button class="btn btn-danger btn-sm del" delval="{{$v->mid}}">删除</button>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                {!! $text_list->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
<div class="modal inmodal" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">添加文本素材</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="exampleInputEmail1">文本内容:</label>
                        <textarea class="form-control" rows="3" id="add_con"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">退出</button>
                <button type="button" class="btn btn-primary" id="addbtn">提交</button>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">修改文本素材</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post"> 
                    <div class="form-group">
                        <label for="exampleInputEmail1">文本内容:</label>
                        <textarea class="form-control" rows="3" id="edit_con"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">退出</button>
                <button type="button" class="btn btn-primary">确认修改</button>
            </div>
        </div>
    </div>
</div>
<div class="footer" >
    <div class="pull-right">
        10GB of <strong>250GB</strong> Free.
    </div>
    <div>
        <strong>Copyright</strong> Example Company &copy; 2014-2015
    </div>
</div>

</div>
</div>



<!-- Mainly scripts -->
<script src="/admin/js/jquery-2.1.1.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Peity -->
    <script src="/admin/js/plugins/peity/jquery.peity.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/admin/js/inspinia.js"></script>
    <script src="/admin/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="/admin/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Peity -->
    <script src="/admin/js/demo/peity-demo.js"></script>
    
    <!-- Sweet alert -->
    <script src="/admin/js/plugins/sweetalert/sweetalert.min.js"></script>



<script>
    var checkval = "";
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
</script>
<script>
    $('#zdel').click(function(){
        if(getCheckBox()){
            swal({
                title: "确认删除选中项吗?",
                text: "删除后数据将不可恢复!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确认删除!",
                cancelButtonText: "取消!",
                closeOnConfirm: false,
            }, function () {
                getCheckBox();
                alert(checkval);
                swal("删除成功!", "选中项已删除!", "success");
            });
        }else{
            swal("请选择需要删除的项目!");
        }
        
    });
    //获取到checkbox的值  以逗号分开
    var getCheckBox = function(){
        var checkobj = document.getElementsByName('input[]');
        checkval = "";
        for(var i = 0;i<checkobj.length;i++){
            if(checkobj[i].checked){
                checkval += checkobj[i].value+',';
            }
        }
        checkval=checkval.substring(0,checkval.length-1);
        if(checkval.length == 0){
            return false;
        }else{
            return true;
        }
    }
    $('.del').click(function(){
        var data = $(this).attr('delval');
        swal({
                title: "确认删除此条目吗?",
                text: "删除后数据将不可恢复!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确认删除!",
                cancelButtonText: "取消!",
                closeOnConfirm: false,
            }, function () {
                //ajax        
                swal("删除成功!", "选中项已删除!", "success");
                //swal("删除失败!", "事实上!", "warning");
            });
    });
    $('.edit').click(function(){
        var val = $(this).parent().siblings('.con').html();
        var id = $(this).parent().siblings('.id').html();
        $('#edit_con').html(val);
    });
    $('#addbtn').click(function(){
        var data = {
            _token : $("input[name='_token']").val(),
            add_con : $('#add_con').val()
        }
        $.post('{{url('admin/text_list')}}',data,function(res){
            if(res.error > 0){
                swal("添加失败!", '',"warning");
            }else{
                swal("添加成功!");
                setTimeout('location.reload()',1000);
//                var ht = $('#tbdy').html();
//                ht += '<tr><td><input type="checkbox" class="i-checks" value="'+res.id+'" name="input[]"></td><td class="con">'+data.add_con+'</td><td class="id" style="display:none;">'+res.id+'</td><td><button class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editmodal">编辑</button><button class="btn btn-danger btn-sm del" delval="'+res.id+'">删除</button></td></tr>';
//                $('#tbdy').html(ht);
                /*
                 <tr>
                 <td><input type="checkbox" class="i-checks" value="'+res.id+'" name="input[]"></td>
                 <td class="con">'+data.add_con+'</td>
                 <td class="id" style="display:none;">'+res.id+'</td>
                 <td>
                 <button class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editmodal">编辑</button>
                 <button class="btn btn-danger btn-sm del" delval="'+res.id+'">删除</button>
                 </td>
                 </tr>
                */
            }
        },'json');
    });
</script>
</body>

</html>
