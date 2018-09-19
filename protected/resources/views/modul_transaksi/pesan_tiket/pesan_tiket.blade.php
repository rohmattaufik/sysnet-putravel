@extends('layouts.app-admin')

@section('new-style')
<style>
    .table td.fit,
    .table th.fit {
        white-space: nowrap;
        width: 1%;
    }
    .table-fit {
        width: 1px;
    }
</style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <a href="{{ url(action('TransaksiPesananController@index')) }}">
                    <i class="fa fa-arrow-left"></i>
                </a>
                Modul Transaksi Pesan Tiket
                <small>Book your Ticket</small>
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
                                @if(Session::get('gagal'))
                                    <div class="callout callout-danger">
                                        <h4>{{ Session::get('gagal') }}</h4>

                                        <p>Silahkan input ulang data Anda.</p>
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="box-body">
                            <form enctype="multipart/form-data" class="form-horizontal"
                                  method="post" action="{{url(action('TransaksiPesanTiketController@store'))}}">
                                {{ csrf_field() }}
                                <div class="box-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="nomor_surat">
                                            Nomor Surat Tugas
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-sticky-note"></i>
                                                </div>
                                                <input type="text" name="no_surat_tugas"
                                                       value="{{ $data_surat[0]['assignment_letter_code'] }}"
                                                       class="form-control pull-right" disabled>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="tanggal_surat">
                                            Tanggal
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input placeholder="Pilih Tanggal"
                                                       type="text"
                                                       value="{{  \Carbon\Carbon::parse($data_surat[0]['created_at'])->format('d-m-Y') }}"
                                                       class="form-control pull-right"
                                                       id="datepicker2" disabled>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="kota">
                                            Kota Tujuan
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-map-pin"></i>
                                                </div>
                                                {{--<input type="text" placeholder="Pilih Kota Tujuan"--}}
                                                       {{--name="kota" class="form-control pull-right" id="datepicker3">--}}
                                                <select name="kota" id="kota" class="form-control select-data" disabled>
                                                    <option value="{{ $data_surat[0]['idKota'] }}" >
                                                        {{ $data_surat[0]['city_name'] }}
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="kota">
                                            Term
                                        </label>
                                        <div class="col-lg-4">
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-sticky-note"></i>
                                                </div>
                                                {{--<input type="text" placeholder="Pilih Kota Tujuan"--}}
                                                {{--name="kota" class="form-control pull-right" id="datepicker3">--}}
                                                <input type="number"
                                                       class="form-control"
                                                       name="term"
                                                       placeholder="Term" required>
                                                <input type="hidden" name="id_surat_h" value="{{ $id_surat_h }}">
                                            </div>
                                            <!-- /.input group -->
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
                            <div class="col-lg-12">

                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>


                                <div class="alert alert-success print-success-msg" style="display:none">
                                    <ul></ul>
                                </div>

                                <div class="table-responsive">
                                    <div class="row">
                                        <div class="col-lg-12">


                                    <table class="table table-bordered" id="dynamic_field" width="100%">
                                        <thead class="">
                                        <th class="text-nowrap">Nama</th>
                                        <th class="text-nowrap">Nama Maskapai</th>
                                        <th class="text-nowrap">Booking Number</th>
                                        <th class="text-nowrap" style="padding-left: 50px; padding-right: 50px;">
                                            Tanggal Berangkat
                                        </th>
                                        <th class="text-nowrap" style="padding-left: 50px; padding-right: 50px;">
                                            Tanggal Kembali
                                        </th>
                                        <th class="text-nowrap">Reservasi Tiket Berangkat</th>
                                        <th class="text-nowrap">Reservasi Tiket Kembali</th>
                                        <th class="text-nowrap" style="padding-left: 50px; padding-right: 50px;">
                                            Harga Tiket (PP)
                                        </th>
                                        <th class="text-nowrap" style="padding-left: 50px; padding-right: 50px;">
                                            Harga Maskapai
                                        </th>
                                        </thead>

                                        <tbody>
                                        <input placeholder="Pilih Tanggal"
                                               type="hidden"
                                               name="tanggal_surat"
                                               value="{{  \Carbon\Carbon::parse($data_surat[0]['created_at'])->format('Y-m-d') }}"
                                               class="form-control pull-right"
                                               hidden>
                                        <input type="hidden" name="no_surat_tugas"
                                               value="{{ $data_surat[0]['assignment_letter_code'] }}"
                                               class="form-control pull-right" hidden>
                                        <input type="hidden" name="id_surat_h"
                                               value="{{ $data_surat[0]['id'] }}"
                                               class="form-control pull-right" hidden>
                                        <input type="hidden" name="idKota"
                                               value="{{ $data_surat[0]['idKota'] }}"
                                               class="form-control pull-right" hidden>
                                        <input type="hidden" name="idDept"
                                               value="{{ $data_surat[0]['idDepartment'] }}"
                                               class="form-control pull-right" hidden>
                                        <input type="hidden" name="idDipa"
                                               value="{{ $data_surat[0]['idDipa'] }}"
                                               class="form-control pull-right" hidden>

                                        @for($i=0;$i<count($data_surat[0]['suratTugasD']);$i++)
                                            @if($data_surat[0]['suratTugasD'][$i]->plane_status == 1)
                                            <tr class="">
                                                <td class="text-nowrap">
                                                    <p>{{ $data_surat[0]['suratTugasD'][$i]->employee_name }}</p>
                                                </td>
                                                <td class="text-nowrap">
                                                    <select name="maskapai[]" class="form-control select-data text-nowrap" style="width: 100%;">
                                                        <option value="0" >Pilih Maskapai</option>
                                                        @foreach ($data_supplier as $data)
                                                            @if($data->idJenisSupplier == 7 || $data->idJenisSupplier == 8)
                                                                <option value="{{ $data->id }}" >
                                                                    {{ $data->supplier_name }} - {{ $data->city_name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="book_number[]"
                                                               placeholder="Booking Number">
                                                        <input type="hidden" name="idSuratTugas_D[]"
                                                               value="{{ $data_surat[0]['suratTugasD'][$i]->id }}"
                                                               class="form-control pull-right" hidden>
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input placeholder="Pilih Tanggal Berangkat"
                                                               type="text"

                                                               name="tanggal_berangkat[]"
                                                               class="form-control pull-right"
                                                               id="datepicker1{{ $i }}">

                                                        <script>
                                                            $('#datepicker1{{ $i }}').datepicker({
                                                                autoclose: true,
                                                                todayHighlight : true,
                                                                todayBtn : "linked",
                                                                format : 'yyyy-mm-dd'
                                                            });
                                                        </script>
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input placeholder="Pilih Tanggal Kembali"
                                                               type="text"
                                                               name="tanggal_kembali[]"
                                                               class="form-control pull-right"
                                                               id="datepicker2{{ $i }}">

                                                        <script>
                                                            $('#datepicker2{{ $i }}').datepicker({
                                                                autoclose: true,
                                                                todayHighlight : true,
                                                                todayBtn : "linked",
                                                                format : 'yyyy-mm-dd'
                                                            });
                                                        </script>
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="reservasi_berangkat[]"
                                                               placeholder="Reservasi Tiket Berangkat">
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control"
                                                               name="reservasi_kembali[]"
                                                               placeholder="Reservasi Tiket Kembali">
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control hargapp uang"
                                                               onchange="autosums_pp()"
                                                               name="harga_tiket[]"
                                                               placeholder="Harga Tiket (PP)"
                                                               aria-describedby="basic-addon2">
                                                        <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    <div class="input-group">
                                                        <input type="text"
                                                               class="form-control hargamaskapai uang"
                                                               onchange="autosums_maskapai()"
                                                               name="harga_maskapai[]"
                                                               placeholder="Harga Maskapai"
                                                               aria-describedby="basic-addon2">
                                                        <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                                    </div>
                                                </td>

                                                <td class="text-nowrap">
                                                    {{--<div class="input-group">--}}
                                                        {{----}}
                                                        {{--<input type="file" value="Upload Tiket" name="upload_tiket">--}}
                                                    {{--</div>--}}
                                                    <div class="input-group">

                                                        <input type="file" class="custom-file-input"
                                                               id="inputGroupFile01" name="file_tiket[]"
                                                               aria-describedby="inputGroupFileAddon01" required>
                                                        <label class="custom-file-label" for="inputGroupFile01">Harus Upload Tiket</label>

                                                    </div>
                                                </td>

                                            </tr>
                                            @endif
                                        @endfor

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th class="text-nowrap">
                                                <p>Total</p>
                                            </th>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control uang"
                                                           name="total_harga_tiket_pp"
                                                           value="0"
                                                           id="totalpp"
                                                           placeholder="Total Harga Tiket (PP)" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text"
                                                           class="form-control uang"
                                                           name="total_harga_tiket_maskapai"
                                                           value="0"
                                                           id="totalmaskapai"
                                                           placeholder="Total Harga Maskapai" disabled>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                        </div>
                                    </div>

                                </div>

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <a href="{{ url(action('TransaksiPesananController@index')) }}"
                                               type="button" class="btn btn-danger btn-block btn-sm">Batal</a>
                                        </div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-primary btn-block btn-sm">Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>


            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="box box-primary">--}}
                        {{--<div class="box-header with-border">--}}
                            {{--<h1 class="box-title">List of Surat Tugas</h1>--}}
                        {{--</div>--}}
                        {{--<div class="box-body table-responsive no-padding">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-lg-12">--}}

                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}




        </section>
    </div>
@stop

@section('new-script')

    <script>
        $(document).ready(function(){

            // Format mata uang.
            $( '.uang' ).mask('0.000.000.000', {reverse: true});

            // Format nomor HP.
            $( '.no_hp' ).mask('0000−0000−0000');

            // Format tahun pelajaran.
            $( '.tapel' ).mask('0000/0000');
        })
    </script>


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
                    '<tr id="row'+i+'">' +
                    '<td>' +
                    '+' +
                    '</td>' +
                    '<td>' +
                    '<select name="employee[]" class="form-control select-data">' +
                    '<option value="0" >Choose Employee</option>'+
                    '@foreach ($data_employee as $data)' +
                    '<option value="{{ $data->id }}" >' +
                    '{{ $data->employee_name.' - '.$data->position_name .' - '.$data->class_name }}'+
                    '</option>'+
                    '@endforeach'+
                    '</select>'+
                    '</td>'+

                    '<td>'+
                    '<div class="input-group">'+
                    '<input type="text"'+
                    'class="form-control"'+
                    'name="lama_penugasan[]"'+
                    'placeholder="Lama Penugasan"'+
                    'aria-describedby="basic-addon2">'+
                    '<span class="input-group-addon" id="basic-addon2">hari</span>'+
                    '</div>'+
                    '</td>'+
                    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +
                    '</tr>');


                $('.select-data').select2();
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

    <script>
        $(document).ready(function () {
            $("#thebase").change(function () {
                var val = $(this).val();
                if (val == "item1") {
                    $("#size").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
                } else if (val == "item2") {
                    $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
                } else if (val == "item3") {
                    $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
                } else if (val == "item0") {
                    $("#size").html("<option value=''>--select one--</option>");
                }
            });
        });
    </script>
    <script>
        function autosums_pp() {
            var totalpp = 0;
            var hargapp = [];
            for(var i = 0;i<document.getElementsByClassName("hargapp").length; i++) {
                hargapp[i] = document.getElementsByClassName("hargapp")[i].value;
                if(!hargapp[i]) {
                    hargapp[i] = '0.0';
                }
                str = hargapp[i];
                strchange = str.replace(/\./g,'');
                totalpp += Number(strchange);
            }
            document.getElementById("totalpp").value = format1(totalpp, 'Rp. ');
        }

        function autosums_maskapai() {
            var totalmaskapai = 0;
            var hargamaskapai = [];
            for(var i = 0;i<document.getElementsByClassName("hargamaskapai").length; i++) {
                hargamaskapai[i] = document.getElementsByClassName("hargamaskapai")[i].value;
                if(!hargamaskapai[i]) {
                    hargamaskapai[i] = '0.0';
                }
                str = hargamaskapai[i];
                strchange = str.replace(/\./g,'');
                totalmaskapai += Number(strchange);
            }

            document.getElementById("totalmaskapai").value = format1(totalmaskapai, 'Rp. ');

        }
        function format1(n, currency) {
            return currency + n.toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
                });
        }
    </script>
@stop