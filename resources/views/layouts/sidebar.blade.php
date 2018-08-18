<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Luthfi Abdurrahim</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online - Admin PU</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
              {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
              {{--</button>--}}
            {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{
            Request::is('/home') ? 'active' : ''
            }}">
                <a href="{{ url('/home') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="treeview {{
                     Request::is('master/*') ? 'active' : ''
                     }}">
                <a href="#">
                    <i class="fa fa-database"></i>

                    <span>Master Modul</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">
                    <li class="{{
                     Request::is('master/parameter') ||
                     Request::is('master/parameter/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('master/parameter') }}">
                            Parameter
                        </a>
                    </li>
                    <li class="{{
                    Request::is('master/data') ||
                     Request::is('master/data/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('master/data') }}">
                            Master Data
                        </a>
                    </li>
                    <li class="{{
                     Request::is('master/sbu') ||
                     Request::is('master/sbu/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('master/sbu') }}">
                            Master SBU
                        </a>
                    </li>
                    <li class="{{
                     Request::is('master/employee') ||
                     Request::is('master/employee/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('master/employee') }}">
                            Master Employee
                        </a>
                    </li>
                    <li class="{{
                     Request::is('master/supplier') ||
                     Request::is('master/supplier/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('master/supplier') }}">
                            Master Supplier
                        </a>
                    </li>
                    <li class="{{
                     Request::is('master/dipa') ||
                     Request::is('master/dipa/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('master/dipa') }}">
                            Master DIPA
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>