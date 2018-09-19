@extends('layouts.app-admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--Pesan Hotel--}}
                {{--<small>Pesan Hotel</small>--}}
            {{--</h1>--}}

        {{--</section>--}}

        <section class="content-header">
            <h1>
                <a href="{{ url(action('TransaksiPesananController@index')) }}">
                    <i class="fa fa-arrow-left"></i>
                </a>
                Modul Transaksi Pesan Hotel
                <small>Book your Hotel</small>
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
                            {{--<h1 class="box-title">Pesan Hotel</h1>--}}
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
                                                    <td>{{ $data_surat_tugas[0]['assignment_letter_code']}}</td>
                                                <tr>
                                                <tr>
                                                    <th>Kota Tujuan</th>
                                                    <td>{{ $data_surat_tugas[0]['city_name']}}</td>
                                                <tr>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <td>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" name="tanggal_surat_tugas" value="{{ (\Carbon\Carbon::now()->format('d-m-Y'))  }}"
                                                                class="form-control pull-right datepicker" required="true" placeholder="Masukkan Tanggal">
                                                        </div>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <th>Tanggal Tugas</th>
                                                    <td>{{ \Carbon\Carbon::parse($data_surat_tugas[0]['start_date'])->format('d-m-Y')  }} SD {{ \Carbon\Carbon::parse($data_surat_tugas[0]['end_date'])->format('d-m-Y')  }}</td>
                                                <tr>
                                                <tr>
                                                    <th>Term</th>
                                                    <td>



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
                                                        </div>
                                                        <!-- /.input group -->

                                                    </td>
                                                </tr>
                                            <thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <table id="table_surat_tuga" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th class="text-nowrap" scope="col"></th>
                                    <th class="text-nowrap" scope="col">Nama</th>
                                    <th class="text-nowrap" scope="col">Nama Hotel</th>
                                    <th class="text-nowrap" scope="col">Tanggal Check In</th>
                                    <th class="text-nowrap" scope="col">Tanggal Check Out</th>
                                    <th class="text-nowrap" scope="col">Jumlah Hari</th>
                                    <th class="text-nowrap" scope="col">Harga</th>
                                    <th class="text-nowrap" scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_surat_tugas[0]['suratTugasD'] as $key=> $surat_tugas)

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
                                                <input type="text" name="tanggal_check_in[]" id="start_date" onchange="changeDate()"
                                                    value="{{ \Carbon\Carbon::parse($data_surat_tugas[0]['start_date'])->format('d-m-Y')  }}" class="form-control pull-right check-in datepicker" id="datepicker1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" name="tanggal_check_out[]" id="end_date" onchange="changeDate()"
                                                    value="{{ \Carbon\Carbon::parse($data_surat_tugas[0]['end_date']) ->format('d-m-Y') }}" class="form-control pull-right check-out datepicker" id="datepicker1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number"
                                                        class="form-control jumlahHari"
                                                        value="{{ $different }}"
                                                        disabled="true"
                                                        placeholder="jumlah hari" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text"
                                                        class="form-control hargaPerHari uang"
                                                        name="harga[]"
                                                        onchange="harga_hotel()"
                                                        placeholder="Harga" >
                                            </div>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text"
                                                        class="form-control hargahotel uang"
                                                        name="total[]"
                                                        placeholder="Total" disabled="true">
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
                                        <td></td>
                                        <td></td>
                                        <td>
                                            Total
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text"
                                                        class="form-control"
                                                       id="totalhotel"
                                                        name="harga[]"
                                                       value="0"
                                                        placeholder="Harga" disabled>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script>

        $(document).ready(function() {
//            var table = $('#table_supplier').DataTable( {
//                responsive: true,
//                "order": [[ 0, "asc" ]]
//            } );
//
//            new $.fn.dataTable.FixedHeader( table );
            moment().format();  
            $('input[name^="tanggal_check_in"]').each(function() {
                
            });
            var start = moment( $("#tanggal_check_in").val());
            var end   = moment($("#tanggal_check_out").val());
            end.from(start);       // "in 5 days"
            end.from(start, true);
          //  console.log(end.from(start, true));
            for(var i = 0;i<document.getElementsByClassName("check-in").length; i++) {
                var date1 = new Date(document.getElementsByClassName("check-in")[i].value);
                var date2 = new Date(document.getElementsByClassName("check-out")[i].value);
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());

                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                console.log(diffDays);
            }

            
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
            format : 'mm-dd-yyyy'
        });
        $('#datepicker1').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'dd-mm-yyyy'
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
        function autosums_hotel() {
            var totalhotel = 0;
            var hargahotel = [];
            for(var i = 0;i<document.getElementsByClassName("hargahotel").length; i++) {
                hargahotel[i] = document.getElementsByClassName("hargahotel")[i].value;
                if(!hargahotel[i]) {
                    hargahotel[i] = '0.0';
                }
                str = hargahotel[i];
                strchange = str.replace(/\./g,'');
                totalhotel += Number(strchange);
            }
            document.getElementById("totalhotel").value = format1(totalhotel, 'Rp. ');
        }
        function format1(n, currency) {
            return currency + n.toFixed(0).replace(/./g, function(c, i, a) {
                    return i > 0 && c !== "," && (a.length - i) % 3 === 0 ? "." + c : c;
                });
        }
        function harga_hotel()
        {   var totalhotel = 0;
            var hargaPerHari = [];
            var jumlahHari  = 0;
            var jumlahTotalPerHari;
            for(var i = 0;i<document.getElementsByClassName("hargaPerHari").length; i++) {
                hargaPerHari[i] = Number(document.getElementsByClassName("hargaPerHari")[i].value.replace(/\./g,''));
//                hargaPerHari[i] = document.getElementsByClassName("hargaPerHari")[i].value;
                jumlahHari      = document.getElementsByClassName("jumlahHari")[i].value;
                if(!hargaPerHari[i]) {
                    hargaPerHari[i] = '0.0';
                }
                str = Number(hargaPerHari[i]) * Number(jumlahHari);
                
                jumlahTotalPerHari = Number(str);
                totalhotel += Number(str);
                document.getElementsByClassName("hargahotel")[i].value = format1(jumlahTotalPerHari, 'Rp. ');
            }
            document.getElementById("totalhotel").value = format1(totalhotel, 'Rp. ');
        }
        function changeDate()
        {
            for(var i = 0;i<document.getElementsByClassName("check-in").length; i++) {
                var date1 = new Date(document.getElementsByClassName("check-in")[i].value);
                var date2 = new Date(document.getElementsByClassName("check-out")[i].value);
                var timeDiff = Math.abs(date2.getTime() - date1.getTime());

                var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
                document.getElementsByClassName("jumlahHari")[i].value  = diffDays;
            }
            harga_hotel();
        }
    </script>
@stop
