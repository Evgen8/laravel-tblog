<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/avatar5.png')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Найти..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li><a href="/"><i class='fa fa-globe'></i> <span>Перейти на сайт</span></a></li>
            <li class="header">Управление</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/admin') }}"><span>Главная</span></a></li>
            <li><a href="{{ url('/admin/posts') }}"><i class='fa fa-file-text-o'></i> <span>Статьи</span></a></li>
            <li><a href="{{ url('/admin/users') }}"><i class='fa fa-users'></i> <span>Пользователи</span></a></li>
            <li><a href="{{ url('/admin/administrators') }}"><i class='fa fa-star'></i> <span>Администраторы</span></a></li>
            {{--<li class="treeview">
                <a href="{{ url('/admin/') }}"><i class='fa fa-link'></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">Link in level 2</a></li>
                    <li><a href="#">Link in level 2</a></li>
                </ul>
            </li>--}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
