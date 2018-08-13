@extends('layouts.app-admin')

@section('content')
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">Quick Example</h3>--}}
                </div>

                <div class="box-body">

                    <form class="form-horizontal">
                        <div class="box-body">
                            {{--<div class="form-group">--}}
                                {{--<label for="nama_travel" class="col-sm-2 control-label">Nama Travel</label>--}}

                                {{--<div class="col-sm-4">--}}
                                    {{--<input type="text" class="form-control"--}}
                                           {{--id="nama_travel"--}}
                                           {{--name="nama_travel" placeholder="Nama Travel">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Jenis Vendor</label>
                                <div class="col-lg-4">
                                    <select class="form-control select-data">
                                        <option value="AZ" data-select2-id="12">Set Number</option>
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">Nama Supplier</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama_travel"
                                           name="nama_travel" placeholder="Nama Supplier">
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
                                <label class="col-sm-2 control-label" for="unit_kerja">Kota</label>
                                <div class="col-lg-4">
                                    <select class="form-control select-data">
                                        <option value="AZ" data-select2-id="12">Kota</option>
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="contact_person" class="col-sm-2 control-label">Kode Pos</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="contact_person"
                                           name="contact_person" placeholder="Kode Pos">
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
                                <label for="no_telp" class="col-sm-2 control-label">Website</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="no_telp"
                                           name="no_telp" placeholder="Website">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-12">
                                    <hr/>
                                    <h3 class="box-title col-sm-2 control-label">Contact person</h3>
                                    <hr/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">Nama</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama_travel"
                                           name="nama_travel" placeholder="Nama">
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
                                <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control" rows="3"
                                            id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                    </textarea>
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
                    <h1 class="box-title">List of Supplier</h1>
                </div>
                <div class="box-body">
                    <p>test 123</p>
                </div>
            </div>

        </section>
    </div>
@stop