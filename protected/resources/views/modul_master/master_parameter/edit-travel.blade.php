@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Parameter
                <small>Edit your master data of travel</small>
            </h1>

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
                                <a href="{{ url(action('MasterParameterController@index')) }}">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                Edit Travel
                            </h3>
                            <form class="form-horizontal" method="post" action="{{ url(action('MasterParameterController@update')) }}">
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="nama_travel" class="col-sm-2 control-label">Nama Travel</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="nama_travel"
                                                   value="{{ $data_travel->travel_name }}"
                                                   name="nama_travel" placeholder="Nama Travel">
                                            <input type="hidden" class="form-control"
                                                   id="travel_id"
                                                   value="{{ $data_travel->id }}"
                                                   name="travel_id" hidden>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3"
                                                      id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                                {{ $data_travel->address }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_person" class="col-sm-2 control-label">Contact Person</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="contact_person"
                                                   value="{{ $data_travel->contact }}"
                                                   name="contact_person" placeholder="Contact Person">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp" class="col-sm-2 control-label">No. Telp</label>

                                        <div class="col-sm-4">
                                            <input type="text" class="form-control"
                                                   id="no_telp"
                                                   value="{{ $data_travel->contact_number }}"
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
                                    <a type="button" href="#" class="btn btn-danger btn-lg">Reset</a>
                                    <button type="submit" class="btn btn-info btn-lg">Update</button>
                                </div>

                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop