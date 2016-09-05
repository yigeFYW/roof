<nav class="navbar-default navbar-static-side lift-nav" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img src="/admin/img/logo.png" alt="" style="width:100%;">
                </div>
                <div class="logo-element">
                    A!
                </div>
            </li>
            <li class="admin_m" a="index">
                <a href="{{url('admin/index')}}"><i class="fa fa-home"></i> <span class="nav-label">总览</span></a>
            </li>
            <li  class="active admin_m">
                <a href="javascript:;"><i class="fa fa-th-large"></i> <span class="nav-label">公众号基本功能</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="active admin_m" a="text_list"><a href="{{url('admin/text_list')}}">素材列表</a></li>
                    <li class="admin_m" a="wel_list"><a href="{{url('admin/wel_list')}}">微信欢迎语</a></li>
                    <li class="admin_m"><a href="#">微信自动回复</a></li>
                    <li class="admin_m"><a href="#">微信群发消息</a></li>
                    <li class="admin_m"><a href="#">自定义菜单设置</a></li>
                </ul>
            </li>
            <li class="admin_m">
                <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">系统设置</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="admin_m" a="auth"><a href="{{url('admin/auth')}}">授权设置</a></li>
                    <li class="admin_m"><a href="#">支付认证</a></li>
                    <li class="admin_m"><a href="#">修改密码</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script>
    var url = window.location.href;
    var menu_list = $('.admin_m');
    for(var i=0;i<menu_list.length;i++){
        var va = menu_list[i].getAttribute('a');
        if(url.indexOf(va) >= 0){
            menu_list.removeClass('active');
            menu_list[i].className = menu_list[i].className +' '+'active';
            $(menu_list[i]).parent().parent().addClass('active');
        }
    }
</script>