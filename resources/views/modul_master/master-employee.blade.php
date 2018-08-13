@extends('layouts.app-admin')

@section('content')
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
                    {{--<h3 class="box-title">Quick Example</h3>--}}
                </div>

                <div class="box-body">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">NIK*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama_travel"
                                           name="nama_travel" placeholder="NIK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">Nama*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Unit Kerja</label>
                                <div class="col-lg-4">
                                    <select class="form-control select-data">

                                        <option value="AZ" data-select2-id="12">Unit Kerja</option>
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Jabatan*</label>
                                <div class="col-lg-4">
                                    <select class="form-control select-data">

                                        <option value="AZ" data-select2-id="12">Jabatan</option>
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Golongan</label>
                                <div class="col-lg-4">
                                    <select class="form-control select-data">
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">E-Mail</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">Telp</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="No. Telpon">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="logo" class="col-sm-2 control-label">Photo</label>

                                <div class="col-sm-4">
                                    <input type="file" class="form-control"
                                           id="logo"
                                           name="logo" placeholder="Logo">
                                    <p class="help-block">Masukkan Foto Karyawan</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">User ID</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="User ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="Password">
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
                <div class="box-body">
                    <p>test 123</p>
                </div>
            </div>


        </section>
    </div>
@stop