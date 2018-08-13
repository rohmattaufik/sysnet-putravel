@extends('layouts.app-admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Parameter
                <small>Add your master data like: Travel data and Code</small>
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

            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab" aria-expanded="true">Travel Data</a>
                    </li>
                    <li class="">
                        <a href="#tab_2" data-toggle="tab" aria-expanded="false">Code Data</a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="tab_1">




                        <div class="box box-info">
                            <div class="box-header with-border">
                                {{--<h3 class="box-title">Form</h3>--}}
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nama_travel" class="col-sm-2 control-label">Nama Travel</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="nama_travel"
                                                   name="nama_travel" placeholder="Nama Travel">
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
                                        <label for="contact_person" class="col-sm-2 control-label">Contact Person</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="contact_person"
                                                   name="contact_person" placeholder="Contact Person">
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
                                        <label for="email" class="col-sm-2 control-label">E-Mail</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="email"
                                                   name="email" placeholder="E-Mail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="logo" class="col-sm-2 control-label">Logo</label>

                                        <div class="col-sm-4">
                                            <input type="file" class="form-control"
                                                   id="logo"
                                                   name="logo" placeholder="Logo">
                                            <p class="help-block">Masukkan logo travel</p>
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
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">

                        <div class="box box-info">
                            <div class="box-header with-border">
                                {{--<h3 class="box-title">Form</h3>--}}
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="col-lg-8">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Jenis Transaksi</th>
                                                <th scope="col">Kode</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Surat Tugas</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_surat_tugas"
                                                           name="kode_surat_tugas" placeholder="Kode Surat Tugas">
                                                </td>

                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Pesan Tiket</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_pesan_tiket"
                                                           name="kode_pesan_tiket" placeholder="Kode Pesan Tiket">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Pesan Hotel</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="contact_person"
                                                           name="contact_person" placeholder="Kode Pesan Hotel">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>Pesan Lain2</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_pesan_tiket"
                                                           name="kode_pesan_tiket" placeholder="Kode Pesan Lain2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>Invoice Hotel</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_pesan_tiket"
                                                           name="kode_pesan_tiket" placeholder="Kode Invoice Hotel">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">6</th>
                                                <td>Invoice Tiket</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_pesan_tiket"
                                                           name="kode_pesan_tiket" placeholder="Kode Invoice Tiket">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">7</th>
                                                <td>Voucher Hotel</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_pesan_tiket"
                                                           name="kode_pesan_tiket" placeholder="Kode Voucher Hotel">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">8</th>
                                                <td>Kwitansi</td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                           id="kode_pesan_tiket"
                                                           name="kode_pesan_tiket" placeholder="Kode Kwitansi">
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
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

                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop