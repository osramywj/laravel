<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @if (Auth::guard('admin')->user()->can('user_manage'))
            {{--@can('user_manage')--}}
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>系统管理</span>
                    <span class="pull-right-container"></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 权限管理</a></li>
                    <li><a href="/admin/users"><i class="fa fa-circle-o"></i> 用户管理</a></li>
                    <li><a href="/admin/role"><i class="fa fa-circle-o"></i> 角色管理</a></li>
                </ul>
            </li>
            @endif
                @if (Auth::guard('admin')->user()->can('article_manage'))
{{--            @can('article_manage',Auth::guard('admin')->user())--}}
            <li class="active treeview">
                <a href="/admin/posts">
                    <i class="fa fa-dashboard"></i> <span>文章管理</span>
                </a>
            </li>
            @endif

            @if (Auth::guard('admin')->user()->can('notice'))
            <li class="active treeview">
                <a href="/admin/notices">
                    <i class="fa fa-dashboard"></i> <span>通知管理</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>