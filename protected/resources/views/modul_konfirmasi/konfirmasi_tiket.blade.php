@extends('layouts.app-admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Konfirmasi
                <small>Tiket Pesawat</small>
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
                            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab" aria-expanded="true">User - Pengguna</a>
                            </li>
                            <li class="">
                                <a href="#tab_2" data-toggle="tab" aria-expanded="false">User - Pembuat Surat</a>
                            </li>
                            @endif
                            @if(Auth::user()->role == 3)
                            <li class="active">
                                <a href="#tab_3" data-toggle="tab" aria-expanded="true">User - Travel</a>
                            </li>
                            @endif
                        </ul>
                        @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">


                                        {{--<h3 class="box-title">Form</h3>--}}
                                        @if(Session::get('sukses'))
                                    <div class="box box-info">

                                        <div class="box-header with-border">
                                            <div class="callout callout-success">
                                                <h4>{{ Session::get('sukses') }}</h4>

                                                <p>Data Anda berhasil masuk database.</p>
                                            </div>
                                        </div>
                                    </div>
                                        @endif
                                        @if(Session::get('sukses-delete'))
                                    <div class="box box-info">

                                        <div class="box-header with-border">
                                            <div class="callout callout-danger">
                                                <h4>{{ Session::get('sukses-delete') }}</h4>

                                                <p>Data Anda berhasil dihapus dari database.</p>
                                            </div>
                                        </div>
                                    </div>
                                        @endif

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


                                                                <table class="table table-bordered" id="dynamic_field">
                                                                    <thead class="">
                                                                    <th class="text-nowrap">No</th>
                                                                    <th class="text-nowrap">No Surat Tugas</th>
                                                                    <th class="text-nowrap">No Ticket</th>
                                                                    <th class="text-nowrap">Nama</th>
                                                                    <th class="text-nowrap">Kota</th>
                                                                    <th class="text-nowrap">Tanggal Berangkat</th>
                                                                    <th class="text-nowrap">Reservasi Tiket Berangkat</th>
                                                                    <th class="text-nowrap">Tanggal Kembali</th>
                                                                    <th class="text-nowrap">Reservasi Tiket Kembali</th>
                                                                    <th class="text-nowrap">Selling Price</th>
                                                                    <th class="text-nowrap">File Tiket</th>
                                                                    <th class="text-nowrap">Action</th>
                                                                    </thead>

                                                                    <tbody>

                                                                    @for($j=1,$i=0;$i<count($data_tiket_user);$i++,$j++)
                                                                        @if($data_tiket_user[$i]->sts == '1')
                                                                            <form method="post" action="{{ url(action('KonfirmasiTiketController@update')) }}">
                                                                                {{ csrf_field() }}
                                                                                <input type="hidden" name="id_tiket_d" value="{{ $data_tiket_user[$i]->id }}">
                                                                                <input type="hidden" name="jenis" value="konfirmasi_user">
                                                                        <tr>
                                                                            <td class="text-nowrap">
                                                                                {{ $index_user++ }}
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data_tiket_user[$i]->assigment_letter_code }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data_tiket_user[$i]->booking_code }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data_tiket_user[$i]->employee_name}}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data_tiket_user[$i]->city_name }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ \Carbon\Carbon::parse($data_tiket_user[$i]->departure_date)->format('d-m-Y')  }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data_tiket_user[$i]->reserve_berangkat }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ \Carbon\Carbon::parse($data_tiket_user[$i]->arrival_date)->format('d-m-Y')  }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data_tiket_user[$i]->reserve_kembali }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>Rp <span class="uang">{{ $data_tiket_user[$i]->AP_ticket_price }}</span></p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                @if(!is_null($data_tiket_user[$i]->file_tiket))
                                                                                    <a href="{{ URL::asset($data_tiket_user[$i]->file_tiket) }}" target="_blank">View Tiket</a>
                                                                                    @else
                                                                                    <p>Tidak ada tiket</p>
                                                                                @endif
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <button type="submit" class="btn btn-primary">
                                                                                    Approve
                                                                                </button>
                                                                            </td>

                                                                        </tr>
                                                                            </form>
                                                                        @endif
                                                                    @endfor

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="box-footer">
                                                        <div class="callout callout-info">
                                                            Silahkan Approve tiket yang sesuai pada tombol paling kanan di atas.
                                                        </div>
                                                        {{--<a href="{{ url(action('TransaksiPesananController@index')) }}"--}}
                                                           {{--type="button" class="btn btn-danger btn-block">Batal</a>--}}
                                                        {{--<button type="submit" class="btn btn-primary btn-block">Pesan</button>--}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </form>
                                    </div>
                                </div>



                            </div>
                            <!-- /.tab-pane -->



                            <div class="tab-pane" id="tab_2">

                                {{--<h3 class="box-title">Form</h3>--}}
                                @if(Session::get('sukses'))
                                    <div class="box box-info">

                                        <div class="box-header with-border">
                                            <div class="callout callout-success">
                                                <h4>{{ Session::get('sukses') }}</h4>

                                                <p>Data Anda berhasil masuk database.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(Session::get('sukses-delete'))
                                    <div class="box box-info">

                                        <div class="box-header with-border">
                                            <div class="callout callout-danger">
                                                <h4>{{ Session::get('sukses-delete') }}</h4>

                                                <p>Data Anda berhasil dihapus dari database.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="box box-primary">
                                            <div class="box-title">
                                                <h3>
                                                    Konfirmasi Pembuat Surat
                                                </h3>
                                            </div>

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

                                                                @for($j=1,$i=0;$i<count($data_tiket_surat);$i++,$j++)
                                                                    @if(count($data_tiket_surat[$i]["pesanTiketD"]) > 0)
                                                                <table class="table table-bordered" id="dynamic_field">
                                                                    <thead class="">
                                                                    <th class="text-nowrap">Action</th>
                                                                    <th class="text-nowrap">No</th>
                                                                    <th class="text-nowrap">No Surat Tugas</th>
                                                                    </thead>

                                                                    <tbody>

                                                                        <tr>
                                                                            <td class="text-nowrap" rowspan="{{ count($data_tiket_surat[$i]["pesanTiketD"]) }}">
                                                                                <form method="post" action="{{ url(action('KonfirmasiTiketController@update')) }}">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="id_tiket_h" value="{{ $data_tiket_surat[$i]['id'] }}">
                                                                                    <input type="hidden" name="jenis" value="konfirmasi_pembuat_surat">
                                                                                <button type="submit" class="btn btn-primary">
                                                                                    Approve
                                                                                </button>
                                                                                </form>
                                                                            </td>
                                                                            <td class="text-nowrap" rowspan="{{ count($data_tiket_surat[$i]["pesanTiketD"]) }}">
                                                                                {{ $index_pembuat_surat++ }}
                                                                            </td>
                                                                            <td class="text-nowrap" rowspan="{{ count($data_tiket_surat[$i]["pesanTiketD"]) }}">
                                                                                <p>{{ $data_tiket_surat[$i]["assigment_letter_code"] }}</p>
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>


                                                                <table class="table table-bordered" id="dynamic_field">
                                                                    <thead class="">
                                                                    <th class="text-nowrap">No Ticket</th>
                                                                    <th class="text-nowrap">Nama</th>
                                                                    <th class="text-nowrap">Kota</th>
                                                                    <th class="text-nowrap">Tanggal Berangkat</th>
                                                                    <th class="text-nowrap">Reservasi Tiket Berangkat</th>
                                                                    <th class="text-nowrap">Tanggal Kembali</th>
                                                                    <th class="text-nowrap">Reservasi Tiket Kembali</th>
                                                                    <th class="text-nowrap">Selling Price</th>
                                                                    <th class="text-nowrap">Tiket</th>
                                                                    </thead>
                                                                    <tbody>


                                                                    @foreach($data_tiket_surat[$i]["pesanTiketD"] as $data)

                                                                        <tr>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data->booking_code }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data->employee_name}}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data->city_name }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ \Carbon\Carbon::parse($data->departure_date)->format('d-m-Y')  }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data->reserve_berangkat }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ \Carbon\Carbon::parse($data->arrival_date)->format('d-m-Y')  }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>{{ $data->reserve_kembali }}</p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                <p>Rp <span class="uang">{{ $data->AP_ticket_price }}</span></p>
                                                                            </td>
                                                                            <td class="text-nowrap">
                                                                                @if(!is_null($data->file_tiket))
                                                                                    <a href="{{ URL::asset($data->file_tiket) }}" target="_blank">View Tiket</a>
                                                                                @else
                                                                                    <p>Tidak ada tiket</p>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                                        <br/>
                                                                        <hr style="border-top: 10px solid grey;"/>
                                                                    @endif
                                                                @endfor


                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="box-footer">
                                                        <div class="callout callout-info">
                                                            Silahkan Approve tiket yang sesuai pada tombol paling kanan di atas.
                                                        </div>
                                                        {{--<a href="{{ url(action('TransaksiPesananController@index')) }}"--}}
                                                        {{--type="button" class="btn btn-danger btn-block">Batal</a>--}}
                                                        {{--<button type="submit" class="btn btn-primary btn-block">Pesan</button>--}}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </form>
                                    </div>
                                </div>



                            </div>
                            <!-- /.tab-pane -->
                            @endif

                            @if(Auth::user()->role == 3)
                                <div class="tab-pane" id="tab_3">

                                    {{--<h3 class="box-title">Form</h3>--}}
                                    @if(Session::get('sukses'))
                                        <div class="box box-info">

                                            <div class="box-header with-border">
                                                <div class="callout callout-success">
                                                    <h4>{{ Session::get('sukses') }}</h4>

                                                    <p>Data Anda berhasil masuk database.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(Session::get('sukses-delete'))
                                        <div class="box box-info">

                                            <div class="box-header with-border">
                                                <div class="callout callout-danger">
                                                    <h4>{{ Session::get('sukses-delete') }}</h4>

                                                    <p>Data Anda berhasil dihapus dari database.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12">

                                            <div class="box box-primary">
                                                <div class="box-header">
                                                    <h1 class="box-title">
                                                        Konfirmasi Tiket - Travel
                                                    </h1>
                                                </div>

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

                                                                    @if(count($data_tiket_travel) < 1)
                                                                        <h1> Belum ada tiket yang perlu dikonfirmasi.</h1>
                                                                    @endif

                                                                    @for($j=1,$i=0;$i<count($data_tiket_travel);$i++,$j++)
                                                                        @if(count($data_tiket_travel[$i]["pesanTiketD"]) > 0)
                                                                            <table class="table table-bordered" id="dynamic_field">
                                                                                <thead class="">
                                                                                <th class="text-nowrap">Action</th>
                                                                                <th class="text-nowrap">No</th>
                                                                                <th class="text-nowrap">No Surat Tugas</th>
                                                                                </thead>

                                                                                <tbody>

                                                                                <tr>
                                                                                    <td class="text-nowrap" rowspan="{{ count($data_tiket_travel[$i]["pesanTiketD"]) }}">
                                                                                        <form method="post" action="{{ url(action('KonfirmasiTiketController@update')) }}">
                                                                                            {{ csrf_field() }}
                                                                                            <input type="hidden" name="id_tiket_h" value="{{ $data_tiket_travel[$i]['id'] }}">
                                                                                            <input type="hidden" name="jenis" value="konfirmasi_travel">
                                                                                            <button type="submit" class="btn btn-primary">
                                                                                                Approve
                                                                                            </button>
                                                                                        </form>
                                                                                    </td>
                                                                                    <td class="text-nowrap" rowspan="{{ count($data_tiket_travel[$i]["pesanTiketD"]) }}">
                                                                                        {{ $index_travel++ }}
                                                                                    </td>
                                                                                    <td class="text-nowrap" rowspan="{{ count($data_tiket_travel[$i]["pesanTiketD"]) }}">
                                                                                        <p>{{ $data_tiket_travel[$i]["assigment_letter_code"] }}</p>
                                                                                    </td>
                                                                                </tr>

                                                                                </tbody>
                                                                            </table>


                                                                            <table class="table table-bordered" id="dynamic_field">
                                                                                <thead class="">
                                                                                <th class="text-nowrap">No Ticket</th>
                                                                                <th class="text-nowrap">Nama</th>
                                                                                <th class="text-nowrap">Kota</th>
                                                                                <th class="text-nowrap">Tanggal Berangkat</th>
                                                                                <th class="text-nowrap">Reservasi Tiket Berangkat</th>
                                                                                <th class="text-nowrap">Tanggal Kembali</th>
                                                                                <th class="text-nowrap">Reservasi Tiket Kembali</th>
                                                                                <th class="text-nowrap">Selling Price</th>
                                                                                <th class="text-nowrap">Tiket</th>
                                                                                </thead>
                                                                                <tbody>


                                                                                @foreach($data_tiket_travel[$i]["pesanTiketD"] as $data)

                                                                                    <tr>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ $data->booking_code }}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ $data->employee_name}}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ $data->city_name }}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ \Carbon\Carbon::parse($data->departure_date)->format('d-m-Y')  }}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ $data->reserve_berangkat }}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ \Carbon\Carbon::parse($data->arrival_date)->format('d-m-Y')  }}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>{{ $data->reserve_kembali }}</p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            <p>Rp <span class="uang">{{ $data->AP_ticket_price }}</span></p>
                                                                                        </td>
                                                                                        <td class="text-nowrap">
                                                                                            @if(!is_null($data->file_tiket))
                                                                                                <a href="{{ URL::asset($data->file_tiket) }}" target="_blank">View Tiket</a>
                                                                                            @else
                                                                                                <p>Tidak ada tiket</p>
                                                                                            @endif
                                                                                        </td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                            <br/>
                                                                                <hr style="border-top: 10px solid grey;"/>
                                                                        @endif
                                                                    @endfor


                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="box-footer">
                                                            <div class="callout callout-info">
                                                                Silahkan Approve tiket yang sesuai pada tombol paling kanan di atas.
                                                            </div>
                                                            {{--<a href="{{ url(action('TransaksiPesananController@index')) }}"--}}
                                                            {{--type="button" class="btn btn-danger btn-block">Batal</a>--}}
                                                            {{--<button type="submit" class="btn btn-primary btn-block">Pesan</button>--}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <!-- /.tab-pane end tab3-->

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    @endif

                </div>
            </div>


            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="box box-primary">--}}
                        {{--<div class="box-header with-border">--}}
                            {{--<h1 class="box-title">List of Travel</h1>--}}
                        {{--</div>--}}
                        {{--<div class="box-body table-responsive no-padding">--}}
                            {{----}}

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop

@section('new-script')
    <script type="text/javascript">
        $(document).ready(function(){

            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});

        });
    </script>
@stop