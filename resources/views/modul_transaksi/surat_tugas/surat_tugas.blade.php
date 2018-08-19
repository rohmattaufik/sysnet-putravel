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
                                    {{--<a type="button" href="#" class="btn btn-danger btn-lg">Reset</a>--}}
                                    {{--<button type="submit" class="btn btn-primary btn-lg">Save</button>--}}
                                </div>
                                <!-- /.box-footer -->


                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="box box-primary">

                            <div class="box-body">
                                <div class="col-lg-10">

                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>


                                    <div class="alert alert-success print-success-msg" style="display:none">
                                        <ul></ul>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dynamic_field">
                                            <thead>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Golongan</th>
                                            <th>Lama Penugasan</th>
                                            </thead>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    <select name="employee[]" class="form-control">
                                                        <option value="0" >Choose Employee</option>
                                                        @foreach ($data_employee as $data)
                                                            <option value="{{ $data->id }}" >{{ $data->employee_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="jabatan"
                                                           value="Marketing"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="golongan"
                                                           value="GOL - 23"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="lama_penugasan"
                                                               placeholder="Lama Penugasan"
                                                               aria-describedby="basic-addon2">
                                                        <span class="input-group-addon" id="basic-addon2">hari</span>
                                                    </div>

                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    2
                                                </td>
                                                <td>
                                                    <select name="employee[]" class="form-control">
                                                        <option value="0" >Choose Employee</option>
                                                        @foreach ($data_employee as $data)
                                                            <option value="{{ $data->id }}" >{{ $data->employee_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="jabatan"
                                                           value="Marketing"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="golongan"
                                                           value="GOL - 23"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="lama_penugasan"
                                                               placeholder="Lama Penugasan"
                                                               aria-describedby="basic-addon2">
                                                        <span class="input-group-addon" id="basic-addon2">hari</span>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    3
                                                </td>
                                                <td>
                                                    <select name="employee[]" class="form-control">
                                                        <option value="0" >Choose Employee</option>
                                                        @foreach ($data_employee as $data)
                                                            <option value="{{ $data->id }}" >{{ $data->employee_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="jabatan"
                                                           value="Marketing"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="golongan"
                                                           value="GOL - 23"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="lama_penugasan"
                                                               placeholder="Lama Penugasan"
                                                               aria-describedby="basic-addon2">
                                                        <span class="input-group-addon" id="basic-addon2">hari</span>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    4
                                                </td>
                                                <td>
                                                    <select name="employee[]" class="form-control">
                                                        <option value="0" >Choose Employee</option>
                                                        @foreach ($data_employee as $data)
                                                            <option value="{{ $data->id }}" >{{ $data->employee_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="jabatan"
                                                           value="Marketing"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <input type="text"
                                                           name="golongan"
                                                           value="GOL - 23"
                                                           disabled
                                                           class="form-control" />
                                                </td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="lama_penugasan[]"
                                                               placeholder="Lama Penugasan"
                                                               aria-describedby="basic-addon2">
                                                        <span class="input-group-addon" id="basic-addon2">hari</span>
                                                    </div>
                                                </td>
                                            </tr>

                                        </table>

                                    </div>

                                    <div class="box-footer">
                                        <button type="button" name="add" id="add" class="btn btn-success btn-block">
                                            Add Row
                                        </button>
                                        <a href="#" type="button" class="btn btn-danger btn-block">Reset</a>
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                                            <td>{{ \Carbon\Carbon::parse($data->start_date)->format('d-m-Y') }} </td>
                                            <td>{{ \Carbon\Carbon::parse($data->end_date)->format('d-m-Y') }} </td>
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


    <script>
        $(document).ready(function() {
            $('.select-data').select2();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var postURL = "<?php echo url('addmore'); ?>";
            var i=1;


            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('' +
                    {{--'<tr id="row'+i+'" class="dynamic-added">' +--}}
                    {{--'<td>' +--}}
                    {{--'<select name="kota[]" class="form-control">' +--}}
                    {{--'@foreach ($kotas as $kota)' +--}}
                    {{--'<option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>'+--}}
                    {{--'@endforeach'+--}}
                    {{--'</select>'+--}}
                    {{--'</td>'+--}}
                    {{--'<td>'+--}}
                    {{--'<select name="golongan[]" class="form-control">'+--}}
                    {{--'@foreach ($golongans as $golongan)'+--}}
                    {{--'<option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>'+--}}
                    {{--'@endforeach'+--}}
                    {{--'</select>'+--}}
                    {{--'</td>'+--}}
                    {{--'<td>'+--}}
                    {{--'<input type="number"'+--}}
                    {{--'name="value[]"'+--}}
                    {{--'placeholder="Enter value"'+--}}
                    {{--'class="form-control name_list" />'+--}}
                    {{--'</td>'+--}}
                    {{--'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +--}}
                    '</td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function(){
                $.ajax({
                    url:postURL,
                    method:"POST",
                    data:$('#add_name').serialize(),
                    type:'json',
                    success:function(data)
                    {
                        if(data.error){
                            printErrorMsg(data.error);
                        }else{
                            i=1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display','block');
                            $(".print-error-msg").css('display','none');
                            $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg (msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display','block');
                $(".print-success-msg").css('display','none');
                $.each( msg, function( key, value ) {
                    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
    </script>

@stop