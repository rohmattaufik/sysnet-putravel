@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Pesan Hotel
                <small>Pesan Hotel</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            
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

            @if(Session::get('gagal') )
            <div class="box-header with-border">
                <h3 class="box-title"></h3>
                <div class="callout callout-danger">
                    <h4>{{ Session::get('gagal') }}</h4>

                    <p>Proses anda gagal dilakukan</p>
                </div>
            </div>
            @endif
                    
         


            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h1 class="box-title">Pesan Hotel</h1>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <form action="{{ url('transaksi/pesan-hotel/submit') }}" method="post">
                            {{ csrf_field() }}

                            <input type="hidden" name="id_surat_tugas" value="{{ $data_surat_tugas[0]['id'] }}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Surat Tugas</th>
                                                    <th>{{ $data_surat_tugas[0]['assignment_letter_code']}}</th>
                                                <tr>
                                                <tr>
                                                    <th>Kota Tujuan</th>
                                                    <th>{{ $data_surat_tugas[0]['city_name']}}</th>
                                                <tr>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" name="tanggal_surat_tugas" 
                                                                class="form-control pull-right datepicker" id="datepicker1">
                                                        </div>
                                                    </th>
                                                <tr>
                                                <tr>
                                                    <th>Tanggal Tugas</th>
                                                    <th>{{ $data_surat_tugas[0]['start_date'] }} SD {{ $data_surat_tugas[0]['end_date'] }}</th>
                                                <tr>
                                            <thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table id="table_surat_tugas" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nama Hotel</th>
                                    <th scope="col">Tanggal Check In</th>
                                    <th scope="col">Tanggal Check Out</th>
                                    <th scope="col">No Voucher</th>
                                    <th scope="col">Harga</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_surat_tugas[0]['suratTugasD'] as $surat_tugas)

                                    @if($surat_tugas->hotel_status != 0)
                                    <!-- <input type="hidden" name="id_surat_tugas_d[]" value="{{ $surat_tugas->id }}"> -->
                                    <tr>
                                        <td>
                                            <div class="input-group">
                                                <input type="hidden"
                                                        class="form-control"
                                                        name="id_surat_tugas_d[]"
                                                        value="{{ $surat_tugas->id }}" >
                                            </div>  
                                        </td>
                                        <td>{{$surat_tugas->employee_name}}</td>
                                        <td>
                                            <select name="hotel[]" class="form-control">
                                                @foreach( $data_kota as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->supplier_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="tanggal_check_in[]" 
                                                    value="{{ $data_surat_tugas[0]['start_date']}}" class="form-control pull-right datepicker" id="datepicker1">
                                            </div>  
                                        </td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="tanggal_check_out[]" 
                                                    value="{{ $data_surat_tugas[0]['end_date']}}" class="form-control pull-right datepicker" id="datepicker1">
                                            </div>  
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text"
                                                        class="form-control"
                                                        name="voucher[]"
                                                        placeholder="Voucher" disabled="true">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text"
                                                        class="form-control"
                                                        name="harga[]"
                                                        placeholder="Harga">
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <tr>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td> </td>
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text"
                                                        class="form-control"
                                                        name="harga[]"
                                                        placeholder="Harga">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="box-footer">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Pesan
                                </button>
                            </div>
                            <div class="col-md-4">
                                <a href="#" type="button" class="btn btn-danger btn-block">Batal</a>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-primary btn-block">Pesan Lain</button>
                            </div>
                        </div>
                        </form>
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
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
        });
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

    <script>
        $('#table_surat_tugas').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive' : true,
            "order": [[ 1, "desc" ]]
        })
    </script>
@stop