<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Data
                <small>Add your master data like: Jabatan, Golongan, dll</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="row">

                <div class="col-lg-8">


                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">
                                <a href="<?php echo e(url(action('MasterDataController@index'))); ?>">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                Edit Jabatan
                            </h3>
                            <form class="form-horizontal" method="post" action="<?php echo e(url(action('MasterDataController@update_jabatan'))); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nama_jabatan" class="col-sm-4 control-label">Nama Jabatan</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="position_name"
                                                   class="form-control" id="position_name"
                                                   value="<?php echo e($jabatan->position_name); ?>">
                                            <input type="hidden" name="jabatan_id"
                                                   class="form-control" id="jabatan_id"
                                                   value="<?php echo e($jabatan->id); ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>