<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>公众号基本功能</title>
    @include('comm.css')
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

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal inmodal" id="addmodal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">
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
                <div class="modal-content animated fadeIn">
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
                        <button type="button" class="btn btn-primary" id="edit_btn">确认修改</button>
                    </div>
                </div>
            </div>
        </div>
        @include('comm.admin_footer')
        @include('comm.admin_javascript')
    </div>
</div>
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
                closeOnConfirm: false
            }, function () {
                getCheckBox();
                var data = {
                    _token : $("input[name='_token']").val(),
                    del_con : checkval
                };
                $.post('{{url('admin/text_list_del_arr')}}',data,function(res){
                    if(res.error > 0){
                        swal(res.msg, "", "warning");
                    }else{
                        swal("删除成功!", "选中项已删除!", "success");
                        setTimeout('location.reload()',1000);
                    }
                });
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
        var data = {
            _token : $("input[name='_token']").val(),
            del_con : $(this).attr('delval')
        };
        swal({
            title: "确认删除此条目吗?",
            text: "删除后数据将不可恢复!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确认删除!",
            cancelButtonText: "取消!",
            closeOnConfirm: false
        }, function () {
            //ajax
            $.post('{{url('admin/text_list_del')}}',data,function(res){
                if(res.error == 0){
                    swal("删除成功!", "选中项已删除!", "success");
                    setTimeout('location.reload()',1000);
                }else if(res.error > 0){
                    swal(res.msg, "", "warning");
                }
            });
        });
    });

    var edit_data = {
        _token : $("input[name='_token']").val(),
        edit_id : null,
        edit_con : null
    };

    $('.edit').click(function(){
        var val = $(this).parent().siblings('.con').html();
        edit_data.edit_id = $(this).parent().siblings('.id').html();
        $('#edit_con').html(val);
    });

    $('#edit_btn').click(function(){
        edit_data.edit_con = $('#edit_con').val();
        $.post('{{url('admin/text_list_edit_arr')}}',edit_data,function(res){
            if(res.error > 0){
                swal(res.msg, "", "warning");
            }else{
                swal("修改成功!", "", "success");
                setTimeout('location.reload()',1000);
            }
        });
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
            }
        },'json');
    });
</script>
</body>
</html>
