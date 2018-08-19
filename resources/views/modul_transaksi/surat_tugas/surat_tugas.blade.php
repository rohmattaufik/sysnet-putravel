@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Transaksi Surat Tugas
                <small>Create your Surat Tugas</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        @if(Session::get('sukses') || Session::get('sukses-delete'))
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
                        @endif

                        <div class="box-body">
                            <form class="form-horizontal" method="post" action="{{url(action('TransaksiSuratTugasController@store'))}}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="tanggal_surat">
                                            Tanggal Surat Tugas
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="tanggal_surat" class="form-control pull-right" id="datepicker1">
                                            </div>
                                                <!-- /.input group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="tanggal_surat">
                                            Dari Tanggal
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="dari_tanggal" class="form-control pull-right" id="datepicker2">
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="tanggal_surat">
                                            Sampai Tanggal
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="sampai_tanggal" class="form-control pull-right" id="datepicker3">
                                            </div>
                                            <!-- /.input group -->
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
                                        <label class="col-sm-2 control-label" for="dipa">Pembebanan Anggaran</label>
                                        <div class="col-lg-4">
                                            <select id="dipa" name="dipa" class="form-control select-data">
                                                @foreach($data_dipa as $data)
                                                    <option value="{{ $data->id }}"
                                                            data-select2-id="{{ $data->id }}">
                                                        {{ $data->DIPA_code }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>

                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3"
                                                      id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="department">Object Audit Kerja</label>
                                        <div class="col-lg-4">
                                            <select id="department" name="department" class="form-control select-data">
                                                @foreach($data_department as $data)
                                                    <option value="{{ $data->id }}"
                                                            data-select2-id="{{ $data->id }}">
                                                        {{ $data->department_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="keterangan1" class="col-sm-2 control-label"></label>
                                        <div class="col-sm-4">
                                            <textarea class="form-control" rows="3"
                                                      id="keterangan1" name="keterangan1"
                                                      placeholder="Masukkan Keterangan Tambahan"></textarea>
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
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h1 class="box-title">List of Surat Tugas</h1>
                        </div>
                        <div class="box-body table-responsive no-padding">

                            <table id="table_supplier" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Tanggal Surat Tugas</th>
                                    <th scope="col">Dari Tanggal</th>
                                    <th scope="col">Sampai Tanggal</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Pembebanan Anggaran</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Object Audit Kerja</th>
                                    <th scope="col">Keterangan Tambahan</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($data_surat_tugas_h as $data)
                                    <tr>
                                        <form method="post" action="{{ url(action('TransaksiSuratTugasController@delete')) }}">
                                            {{ csrf_field() }}
                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }} </td>
                                            <td>{{ $data->start_date }}  </td>
                                            <td>{{ $data->end_date }}  </td>
                                            <td>{{ $data->city_name }}  </td>
                                            <td>{{ $data->DIPA_code }}</td>
                                            <td>{{ $data->description}}</td>
                                            <td>{{ $data->department_name }}</td>
                                            <td>{{ $data->description_1 }}</td>
                                            <input type="hidden" name="supplier_id" value= "{{ $data->id }}" required autofocus>

                                            <td>
                                                <a type="button"
                                                   href="{{ url(action('TransaksiSuratTugasController@edit',$data->id)) }}"
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

    <script>
        //Date picker
        $('#datepicker1').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
        });
        $('#datepicker2').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
        });
        $('#datepicker3').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
        });
    </script>

@stop