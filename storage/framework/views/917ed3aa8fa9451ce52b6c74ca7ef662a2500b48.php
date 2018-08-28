<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo e(URL::asset('dist/img/user2-160x160.jpg')); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Luthfi Abdurrahim</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online - Admin PU</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        
            
                
                
              
              
            
            
        
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Main Menu</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="<?php echo e(Request::is('/home') ? 'active' : ''); ?>">
                <a href="<?php echo e(url('/home')); ?>">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="treeview <?php echo e(Request::is('master/*') ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-database"></i>

                    <span>Modul Master</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">
                    <li class="<?php echo e(Request::is('master/parameter') ||
                     Request::is('master/parameter/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('master/parameter')); ?>">
                            Parameter
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('master/data') ||
                     Request::is('master/data/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('master/data')); ?>">
                            Master Data
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('master/sbu') ||
                     Request::is('master/sbu/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('master/sbu')); ?>">
                            Master SBU
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('master/employee') ||
                     Request::is('master/employee/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('master/employee')); ?>">
                            Master Employee
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('master/supplier') ||
                     Request::is('master/supplier/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('master/supplier')); ?>">
                            Master Supplier
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('master/dipa') ||
                     Request::is('master/dipa/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('master/dipa')); ?>">
                            Master DIPA
                        </a>
                    </li>

                </ul>
            </li>

            <li class="treeview <?php echo e(Request::is('transaksi/*') ? 'active' : ''); ?>">
                <a href="#">
                    <i class="fa fa-exchange"></i>

                    <span>Modul Transaksi</span>

                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">
                    <li class="<?php echo e(Request::is('transaksi/surat-tugas') ||
                     Request::is('transaksi/surat-tugas/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('transaksi/surat-tugas')); ?>">
                            Surat Tugas
                        </a>
                    </li>
                    <li class="<?php echo e(Request::is('transaksi/pesanan') ||
                     Request::is('transaksi/pesanan/*')
                     ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('transaksi/pesanan')); ?>">
                            Input Pesanan Surat Tugas
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
