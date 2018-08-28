<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Employee
                <small>Add your master data : Employee</small>
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    
                </div>

                <div class="box-body">
                    <form class="form-horizontal" method="post" action="<?php echo e(url(action('MasterEmployeeController@store'))); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="box-body">
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nik"
                                           name="nik" placeholder="NIK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Unit Kerja</label>
                                <div class="col-lg-4">
                                    <select name="unit_kerja" class="form-control select-data">
                                        <?php $__currentLoopData = $unit_kerjas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($items->id); ?>"
                                                data-select2-id="<?php echo e($items->id); ?>"><?php echo e($items->work_unit); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Jabatan*</label>
                                <div class="col-lg-4">
                                    <select name="jabatan" class="form-control select-data">
                                        <?php $__currentLoopData = $jabatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($items->id); ?>"
                                            data-select2-id="<?php echo e($items->id); ?>"><?php echo e($items->position_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Golongan</label>
                                <div class="col-lg-4">
                                    <select name="golongan" class="form-control select-data">
                                        <?php $__currentLoopData = $golongans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($items->id); ?>"
                                                data-select2-id="<?php echo e($items->id); ?>"><?php echo e($items->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">E-Mail</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="email"
                                           name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Telp</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="phone"
                                           name="phone" placeholder="No. Telpon">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="photo" class="col-sm-2 control-label">Photo</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control"
                                           id="photo"
                                           name="photo" placeholder="Photo">
                                    <p class="help-block">Masukkan Foto Karyawan</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user_id" class="col-sm-2 control-label">User ID</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="user_id"
                                           name="user_id" placeholder="User ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password" placeholder="Password">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger btn-lg">Reset</button>
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of Employees</h1>
                </div>

                    <div class="box-body table-responsive no-padding">

                        <table id="table_employee" class="table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Unit Kerja</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <form method="post" action="<?php echo e(url(action('MasterEmployeeController@delete'))); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <td scope="row"><?php echo ++$key; ?></td>
                                        <td><?php echo e($person->NIK); ?> </td>
                                        <td><?php echo e($person->employee_name); ?>  </td>
                                        <td><?php echo e($person->work_unit); ?>  </td>
                                        <td><?php echo e($person->position_name); ?>  </td>
                                        <td><?php echo e($person->class_name); ?></td>
                                        <td><?php echo e($person->email); ?></td>
                                        <td><?php echo e($person->phone); ?></td>
                                        <td><?php echo e($person->photo); ?></td>
                                        <input type="hidden" name="employee_id" value= "<?php echo e($person->id); ?>" required autofocus>

                                        <td>
                                            <a type="button" href="<?php echo e(url(action('MasterEmployeeController@edit',$person->id))); ?>"
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


        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>