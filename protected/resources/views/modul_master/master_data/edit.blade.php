@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Data
                <small>Edit your master data like: Jabatan, Golongan, dll</small>
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
                                <a href="{{ url(action('MasterDataController@index')) }}">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                Edit {{ $jenis_data }}
                            </h3>
                            <form class="form-horizontal" method="post" action="{{ url(action('MasterDataController@update')) }}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="nama_jabatan" class="col-sm-4 control-label">Nama {{$jenis_data}}</label>

                                        <div class="col-sm-8">
                                            <input type="text" name="data_content"
                                                   class="form-control" id="data_content"
                                                   value="{{ $data_content }}">
                                            <input type="hidden" name="data_id"
                                                   class="form-control" id="data_id"
                                                   value="{{ $data_id }}">
                                            <input type="hidden" name="jenis_data"
                                                   class="form-control" id="jenis_data"
                                                   value="{{ $jenis_data_input }}">
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
@stop