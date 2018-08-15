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
                    <h3 class="box-title"></h3>
                    @if(Session::get('sukses'))
                        <div class="callout callout-success">
                            <h4>{{ Session::get('sukses') }}</h4>

                            <p>Data Anda berhasil masuk database.</p>
                        </div>
                    @endif
                </div>

                <div class="box-body">

                    <form class="form-horizontal" method="post" action="{{url(action('MasterSupplierController@store'))}}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="jenis_supplier">Jenis Supplier</label>
                                <div class="col-lg-4">

                                    <select id="jenis_supplier" name="jenis_supplier" class="form-control select-data">
                                        @foreach($data_jenis_supplier as $data)
                                            <option value="{{ $data->id }}"
                                                    data-select2-id="{{ $data->id }}">
                                                {{ $data->supplier_type_name }}
                                            </option>
                                        @endforeach
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
                                    @foreach($data_kota as $data)
                                        <option value="{{ $data->id }}"
                                                data-select2-id="{{ $data->id }}">
                                            {{ $data->city_name }}
                                        </option>
                                    @endforeach
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of Supplier</h1>
                </div>
                <div class="box-body">
                    <p>test 123</p>
                    {{-- @foreach($suppliers as $item)
                        <p>{{$item->supplier_name}} -- {{$item->supplier_address}} -- {{$item['jenis_supplier']->supplier_type_name}}</p>
                    @endforeach --}}
                </div>
            </div>

        </section>
    </div>
@stop