<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Supplier
                <small>Add your master data : supplier</small>
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
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <?php if(Session::get('sukses')): ?>
                                <div class="callout callout-success">
                                    <h4><?php echo e(Session::get('sukses')); ?></h4>

                                    <p>Data Anda berhasil masuk database.</p>
                                </div>
                            <?php endif; ?>
                            <?php if(Session::get('sukses-delete')): ?>
                                <div class="callout callout-danger">
                                    <h4><?php echo e(Session::get('sukses-delete')); ?></h4>

                                    <p>Data Anda berhasil dihapus dari database.</p>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="box-body">

                            <form class="form-horizontal" method="post" action="<?php echo e(url(action('MasterSupplierController@store'))); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="jenis_supplier">Jenis Supplier</label>
                                        <div class="col-lg-4">

                                            <select id="jenis_supplier" name="jenis_supplier" class="form-control select-data">
                                                <?php $__currentLoopData = $data_jenis_supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>"
                                                            data-select2-id="<?php echo e($data->id); ?>">
                                                        <?php echo e($data->supplier_type_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama_supplier" class="col-sm-2 control-label">Nama Supplier</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="nama_supplier"
                                                   name="nama_supplier" placeholder="Masukkan Nama Supplier">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3"
                                                      id="alamat" name="alamat" placeholder="Masukkan Alamat"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="kota">Kota</label>
                                        <div class="col-lg-4">
                                            <select id="kota" name="kota" class="form-control select-data">
                                                <?php $__currentLoopData = $data_kota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($data->id); ?>"
                                                            data-select2-id="<?php echo e($data->id); ?>">
                                                        <?php echo e($data->city_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="kode_pos"
                                                   name="kode_pos" placeholder="Masukkan Kode Pos">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp" class="col-sm-2 control-label">No. Telp</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="no_telp"
                                                   name="no_telp" placeholder="Nomor Telepon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fax" class="col-sm-2 control-label">Fax</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="fax"
                                                   name="fax" placeholder="Fax">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-Mail</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="email"
                                                   name="email" placeholder="E-Mail">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="website" class="col-sm-2 control-label">Website</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="no_telp"
                                                   name="website" placeholder="Website">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <hr/>
                                            <h3 class="box-title col-sm-2 control-label">Contact person</h3>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name_cp" class="col-sm-2 control-label">Nama</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="name_cp"
                                                   name="name_cp" placeholder="Nama">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp_cp" class="col-sm-2 control-label">No. Telp</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="no_telp_cp"
                                                   name="no_telp_cp" placeholder="Nomor Telepon">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_cp" class="col-sm-2 control-label">Alamat</label>

                                        <div class="col-sm-4">
                                    <textarea class="form-control" rows="3"
                                              id="alamat_cp" name="alamat_cp" placeholder="Masukkan Alamat">
                                    </textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <a type="button" href="#" class="btn btn-danger btn-lg">Reset</a>
                                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h1 class="box-title">List of Supplier</h1>
                        </div>
                        <div class="box-body table-responsive no-padding">

                            <table id="table_supplier" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jenis Supplier</th>
                                    <th scope="col">Nama Supplier</th>
                                    <th scope="col">Alamat Supplier</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">E-Mail</th>
                                    <th scope="col">Contact Number</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Nama Contact Person</th>
                                    <th scope="col">Nomor Telp Contact Person</th>
                                    <th scope="col">Alamat Contact Person</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                <?php $__currentLoopData = $data_supplier; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <form method="post" action="<?php echo e(url(action('MasterSupplierController@delete'))); ?>">
                                            <?php echo e(csrf_field()); ?>

                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td><?php echo e($data->supplier_type_name); ?> </td>
                                            <td><?php echo e($data->supplier_name); ?>  </td>
                                            <td><?php echo e($data->supplier_address); ?>  </td>
                                            <td><?php echo e($data->city_name); ?>  </td>
                                            <td><?php echo e($data->email); ?></td>
                                            <td><?php echo e($data->contact_number); ?></td>
                                            <td><?php echo e($data->website); ?></td>
                                            <td><?php echo e($data->contact_person); ?></td>
                                            <td><?php echo e($data->contact_person_number); ?></td>
                                            <td><?php echo e($data->contact_person_address); ?>  </td>
                                            <input type="hidden" name="supplier_id" value= "<?php echo e($data->id); ?>" required autofocus>

                                            <td>
                                                <a type="button" href="<?php echo e(url(action('MasterSupplierController@edit',$data->id))); ?>"
                                                   class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </td>

                                        </form>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('new-script'); ?>
    <script>
        $(document).ready(function() {
//            var table = $('#table_supplier').DataTable( {
//                responsive: true,
//                "order": [[ 0, "asc" ]]
//            } );
//
//            new $.fn.dataTable.FixedHeader( table );

        } );
        $('#').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive' : true
        })
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>