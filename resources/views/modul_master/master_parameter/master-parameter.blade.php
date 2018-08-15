@extends('layouts.app-admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Parameter
                <small>Add your master data like: Travel data and Code</small>
            </h1>
        </section>

        <!-- Main content -->

        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="row">
                <div class="col-lg-12">

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
                                        @if(Session::get('sukses'))
                                            <div class="callout callout-success">
                                                <h4>{{ Session::get('sukses') }}</h4>

                                                <p>Data Anda berhasil masuk database.</p>
                                            </div>
                                        @endif
                                        @if(Session::get('sukses-delete'))
                                            <div class="callout callout-danger">
                                                <h4>{{ Session::get('sukses-delete') }}</h4>

                                                <p>Data Anda berhasil dihapus dari database.</p>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <form class="form-horizontal" method="post" action="{{url(action('MasterParameterController@store'))}}">
                                        {{ csrf_field() }}
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
                                    <div
                                            class="form-horizontal"
                                    >

                                        <div class="box-body">
                                            <div class="col-lg-8">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Jenis Transaksi</th>
                                                        <th scope="col">Kode</th>
                                                        <th scope="col">Action</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($data_number as $data)

                                                    <tr>
                                                        <form
                                                                method="post"
                                                                action="{{ url(action('MasterParameterController@update')) }}"
                                                        >
                                                            {{ csrf_field() }}
                                                        <th scope="row">{{ $data->id }}</th>
                                                        <td>{{ $data->transaction_type }}</td>
                                                        <td>

                                                            <input type="text" class="form-control"
                                                                   id="type_data"
                                                                   name="set_number_code"
                                                                   value="{{ $data->set_number_code }}">
                                                            <input type="hidden"
                                                                   name="jenis_data"
                                                                   value="code_data">
                                                            <input type="hidden"
                                                                   name="number_id"
                                                                   value="{{ $data->id }}">

                                                        </td>
                                                        <td><button type="submit" class="btn btn-info btn-sm">Save</button></td>
                                                        </form>
                                                    </tr>

                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <a href="#" class="btn btn-danger btn-lg">Reset</a>
                                            {{--<button type="submit" class="btn btn-info btn-lg">Save</button>--}}
                                        </div>
                                        <!-- /.box-footer -->
                                    </div>
                                </div>



                            </div>

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h1 class="box-title">List of Travel</h1>
                        </div>
                        <div class="box-body table-responsive no-padding">

                            <table id="table_supplier" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Travel</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($data_travel as $data)
                                    <tr>
                                        <form method="post" action="{{ url(action('MasterParameterController@delete')) }}">
                                            {{ csrf_field() }}
                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td>{{ $data->travel_name }} </td>
                                            <td>{{ $data->address }}  </td>
                                            <td>{{ $data->contact }}  </td>
                                            <td>{{ $data->contact_number }}  </td>
                                            <input type="hidden" name="travel_id" value= "{{ $data->id }}" required autofocus>

                                            <td>
                                                <a type="button" href="{{ url(action('MasterParameterController@edit',$data->id)) }}"
                                                   class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger" type="submit">
                                                    Delete
                                                </button>
                                            </td>

                                        </form>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop