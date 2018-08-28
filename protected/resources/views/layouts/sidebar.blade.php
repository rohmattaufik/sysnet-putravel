<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->employee_name }}</p>
                <!-- Status -->
                @if(Auth::user()->role == 1)
                    <a href="#"><i class="fa fa-circle text-success"></i> Online - Admin PU</a>
                @elseif(Auth::user()->role == 2)
                    <a href="#"><i class="fa fa-circle text-success"></i> Online - Finance PU</a>
                @elseif(Auth::user()->role == 3)
                    <a href="#"><i class="fa fa-circle text-success"></i> Online - Travel</a>
                @endif
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

            {{--Modul Master--}}
            <li class="treeview {{
                     Request::is('master/*') ? 'active' : ''
                     }}">
                <a href="#">
                    <i class="fa fa-database"></i>

                    <span>Modul Master</span>

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
            {{--End of Modul Master--}}

            {{-- Modul Transaksi --}}
            <li class="treeview {{
                     Request::is('transaksi/*') ? 'active' : ''
                     }}">
                <a href="#">
                    <i class="fa fa-exchange"></i>

                    <span>Modul Transaksi</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">
                    <li class="{{
                     Request::is('transaksi/surat-tugas') ||
                     Request::is('transaksi/surat-tugas/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('transaksi/surat-tugas') }}">
                            Surat Tugas
                        </a>
                    </li>
                    <li class="{{
                    Request::is('transaksi/pesanan') ||
                     Request::is('transaksi/pesanan/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('transaksi/pesanan') }}">
                            Input Pesanan Surat Tugas
                        </a>
                    </li>

                </ul>
            </li>
            {{--End of Modul Transaksi--}}

            {{--Modul Konfirmasi--}}
            <li class="treeview {{
                     Request::is('konfirmasi/*') ? 'active' : ''
                     }}">
                <a href="#">
                    <i class="fa fa-check-square"></i>

                    <span>Modul Konfirmasi</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">
                    <li class="{{
                     Request::is('konfirmasi/hotel') ||
                     Request::is('konfirmasi/hotel/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('konfirmasi/hotel') }}">
                            Konfirmasi Hotel
                        </a>
                    </li>
                    <li class="{{
                    Request::is('konfirmasi/tiket') ||
                     Request::is('konfirmasi/tiket/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('konfirmasi/tiket') }}">
                            Konfirmasi Tiket
                        </a>
                    </li>

                </ul>
            </li>
            {{--End of Modul Konfirmasi--}}

            {{--Modul Konfirmasi Pembayaran--}}
            @if(Auth::user()->role == 2)
            <li class="treeview {{
                     Request::is('konfirmasi-pembayaran/*') ? 'active' : ''
                     }}">
                <a href="#">
                    <i class="fa fa-money"></i>

                    <span>Konfirmasi Pembayaran</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">
                    <li class="{{
                     Request::is('konfirmasi-pembayaran/hotel') ||
                     Request::is('konfirmasi-pembayaran/hotel/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('konfirmasi-pembayaran/hotel') }}">
                            Konfirmasi Pembayaran Hotel
                        </a>
                    </li>
                    <li class="{{
                    Request::is('konfirmasi-pembayaran/tiket') ||
                     Request::is('konfirmasi-pembayaran/tiket/*')
                     ? 'active' : ''
                     }}">
                        <a href="{{ url('konfirmasi-pembayaran/tiket') }}">
                            Konfirmasi Pembayaran Tiket
                        </a>
                    </li>

                </ul>
            </li>
            {{--End of Modul Konfirmasi--}}
            @endif

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
