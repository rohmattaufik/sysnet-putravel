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

                            <table id="table_surat_tugas" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Surat Tugas</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Tanggal Surat Tugas</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($data_surat_tugas_h as $data)
                                    <tr>
                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td>{{ $data->assigment_letter_code }}  </td>
                                            <td>{{ $data->city_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }} </td>
                                            <input type="hidden" name="surat_id" value= "{{ $data->id }}" required autofocus>

                                            <td>
                                              @if($data->hotel_status == 0)
                                              <button type="button"
                                                 class="btn btn-primary" disabled>Pesan Hotel</button>
                                              @else
                                              <a type="button"
                                                 href="#"
                                                 class="btn btn-primary">Pesan Hotel</a>
                                              @endif

                                              @if($data->plane_status == 0)
                                              <a type="button"
                                                 class="btn btn-primary" disabled>Pesan Tiket</a>
                                              @else
                                              <a type="button"
                                                 href="{{ url(action('TransaksiPesanTiket@index',$data->id)) }}"
                                                 class="btn btn-primary">Pesan Tiket</a>
                                              @endif

                                            </td>
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
