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
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
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

                                    {{--<div class="form-group">--}}
                                        {{--<label for="kode_pos" class="col-sm-2 control-label">Kode Pos</label>--}}

                                        {{--<div class="col-sm-4">--}}
                                            {{--<input type="text" class="form-control"--}}
                                                   {{--id="kode_pos"--}}
                                                   {{--name="kode_pos" placeholder="Masukkan Kode Pos">--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

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
                                <div class="box-footer col-lg-6">
                                    <button type="submit" class="btn btn-sm btn-primary btn-block">Save</button>
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
                                    <th class="text-nowrap" scope="col">No</th>
                                    <th class="text-nowrap" scope="col">Jenis Supplier</th>
                                    <th class="text-nowrap" scope="col">Nama Supplier</th>
                                    <th class="text-nowrap" scope="col">Alamat Supplier</th>
                                    <th class="text-nowrap" scope="col">Kota</th>
                                    <th class="text-nowrap" scope="col">E-Mail</th>
                                    <th class="text-nowrap" scope="col">Contact Number</th>
                                    <th class="text-nowrap" scope="col">Website</th>
                                    <th class="text-nowrap" scope="col">Nama Contact Person</th>
                                    <th class="text-nowrap" scope="col">Nomor Telp Contact Person</th>
                                    <th class="text-nowrap" scope="col">Alamat Contact Person</th>
                                    <th class="text-nowrap" scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($data_supplier as $data)
                                    <tr>
                                        <form method="post" action="{{ url(action('MasterSupplierController@delete')) }}">
                                            {{ csrf_field() }}
                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td class="text-nowrap">{{ $data->supplier_type_name }} </td>
                                            <td class="text-nowrap">{{ $data->supplier_name }}  </td>
                                            <td class="text-nowrap">{{ $data->supplier_address }}  </td>
                                            <td class="text-nowrap">{{ $data->city_name }}  </td>
                                            <td class="text-nowrap">{{ $data->email }}</td>
                                            <td class="text-nowrap">{{ $data->contact_number}}</td>
                                            <td class="text-nowrap">{{ $data->website  }}</td>
                                            <td class="text-nowrap">{{ $data->contact_person }}</td>
                                            <td class="text-nowrap">{{ $data->contact_person_number }}</td>
                                            <td class="text-nowrap">{{ $data->contact_person_address}}  </td>
                                            <input type="hidden" name="supplier_id" value= "{{ $data->id }}" required autofocus>

                                            <td class="text-nowrap">
                                                <a type="button" href="{{ url(action('MasterSupplierController@edit',$data->id)) }}"
                                                   class="btn btn-sm btn-primary">Edit</a>
                                                <button class="btn btn-sm btn-danger" type="submit">
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
    </div>
@stop

@section('new-script')
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

    <script src="{{ URL::asset('js/jquery-3.3.1.js') }}" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_supplier').DataTable();
        } );
    </script>

@stop