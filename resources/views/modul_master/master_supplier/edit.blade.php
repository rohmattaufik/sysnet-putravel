@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Supplier
                <small>Edit your master data of supplier</small>
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
                                <a href="{{ url(action('MasterSupplierController@index')) }}">
                                    <i class="fa fa-arrow-left"></i>
                                </a>
                                Edit Supplier
                            </h3>
                            <form class="form-horizontal" method="post" action="{{ url(action('MasterSupplierController@update')) }}">
                                {{ csrf_field() }}
                                <div class="box-body">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="jenis_supplier">Jenis Supplier</label>
                                        <div class="col-lg-6">

                                            <select id="jenis_supplier" name="jenis_supplier" class="form-control select-data">
                                                <option value="{{ $data_supplier->idJenisSupplier }}"
                                                        data-select2-id="{{ $data_supplier->idJenisSupplier }}" selected>
                                                    {{ $data_supplier->supplier_type_name }}
                                                </option>
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

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="nama_supplier"
                                                   name="nama_supplier"
                                                   value="{{ $data_supplier->supplier_name }}"
                                                   placeholder="Masukkan Nama Supplier">
                                            <input class="form-control"
                                                   id="supplier_id"
                                                   name="supplier_id"
                                                   value="{{ $data_supplier->id }}"
                                                   type="hidden"
                                                   hidden>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>

                                        <div class="col-sm-6">
                                            <textarea class="form-control" rows="3"
                                                      id="alamat" name="alamat">
                                                {{ $data_supplier->supplier_address }}
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="kota">Kota</label>
                                        <div class="col-sm-6">
                                            <select id="kota" name="kota" class="form-control select-data">
                                                <option value="{{ $data_supplier->idKota }}"
                                                        data-select2-id="{{ $data_supplier->idKota }}" selected>
                                                    {{ $data_supplier->city_name }}
                                                </option>
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

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="kode_pos"
                                                   name="kode_pos"
                                                   placeholder="Masukkan Kode Pos">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp" class="col-sm-2 control-label">No. Telp</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="no_telp"
                                                   name="no_telp"
                                                   value="{{ $data_supplier->contact_number }}"
                                                   placeholder="Nomor Telepon">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fax" class="col-sm-2 control-label">Fax</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="fax"
                                                   name="fax"

                                                   placeholder="Fax">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-Mail</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="email"
                                                   name="email"
                                                   value="{{ $data_supplier->email }}"
                                                   placeholder="E-Mail">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="website" class="col-sm-2 control-label">Website</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="website"
                                                   name="website"
                                                   value="{{ $data_supplier->website }}"
                                                   placeholder="Website">
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

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="name_cp"
                                                   name="name_cp"
                                                   value="{{ $data_supplier->contact_person }}"
                                                   placeholder="Nama">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="no_telp_cp" class="col-sm-2 control-label">No. Telp</label>

                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"
                                                   id="no_telp_cp"
                                                   name="no_telp_cp"
                                                   value="{{ $data_supplier->contact_person_number }}"
                                                   placeholder="Nomor Telepon">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_cp" class="col-sm-2 control-label">Alamat</label>

                                        <div class="col-sm-6">
                                    <textarea class="form-control" rows="3"
                                              id="alamat_cp" name="alamat_cp"
                                              placeholder="Masukkan Alamat">
                                        {{ $data_supplier->contact_person_address }}
                                    </textarea>
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