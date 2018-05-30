<ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->

    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">10</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 10 notifications</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li>
                        <a href="#">
                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                            page and may cause design problems
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
        </ul>
    </li>
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/user.jpg') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ auth()->user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="{{ asset('images/user.jpg') }}" class="img-circle" alt="User Image">

                <p>
                    注册时间
                    <small style="margin-top: 10px;">{{ auth()->user()->created_at}}</small>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <a href="#">Menu1</a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#">Menu2</a>
                    </div>
                    <div class="col-xs-4 text-center">
                        <a href="#">Menu3</a>
                    </div>
                </div>
                <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="{{ route('home') }}" class="btn btn-default btn-flat">主页</a>
                </div>
                <div class="pull-right">
                    @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
                        <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" class="btn btn-danger btn-flat">
                            退出
                        </a>
                    @else
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger btn-flat">
                            退出
                        </a>
                        <form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
                            @if(config('adminlte.logout_method'))
                                {{ method_field(config('adminlte.logout_method')) }}
                            @endif
                            {{ csrf_field() }}
                        </form>
                    @endif
                </div>
            </li>
        </ul>
    </li>
    <!-- Control Sidebar Toggle Button -->
</ul>
