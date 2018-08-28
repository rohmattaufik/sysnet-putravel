@extends('layouts.app-admin')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Konfirmasi
                <small>Hotel</small>
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
                            <!-- @if(Auth::user()->role == 1 || Auth::user()->role == 2)
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
                            @endif -->
                        </ul>
                        @if(Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3)
                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">

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
                                                            @if(count($data) > 0)

                                                                <form action="{{ url('konfirmasi/hotel/submit') }}" method="post">

                                                                {{csrf_field()}}
                                                                Date = {{ \Carbon\Carbon::parse($data[0]['data_pesan_hotel'][0]->suratPesan_date)->format('d-m-Y')  }} <br>
                                                                Surat Tugas = {{ $data[0]['assignment_letter_code'] }} <br>
                                                                Kota= {{$data[0]['data_pesan_hotel'][0]->city_name }} <br>

                                                                <table class="table table-bordered" id="dynamic_field">
                                                                    <thead class="">
                                                                        <th class="text-nowrap">Nama</th>
                                                                        <th class="text-nowrap">No Voucher</th>
                                                                        <th class="text-nowrap">Tanggal Check In</th>
                                                                        <th class="text-nowrap">Tanggal Check Out</th>
                                                                        <th class="text-nowrap">Day</th>
                                                                        <th class="text-nowrap">No. Pax</th>
                                                                        <th class="text-nowrap">Cost Per Pax</th>
                                                                        <th class="text-nowrap">Total Invoice</th>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach( $data[0]['data_pesan_hotel'] as $data_pesan_hotel)
                                                                    <input type="hidden" name="id_pesan_hotel_d[]" value="{{ $data_pesan_hotel->id }}">
                                                                    <tr>
                                                                        <td>{{ $data_pesan_hotel->employee_name }}</td>
                                                                        <td>{{ $data_pesan_hotel->voucher_number }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($data_pesan_hotel->checkin_date)->format('d-m-Y')  }}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($data_pesan_hotel->checkout_date)->format('d-m-Y')  }}</td>
                                                                        <td>3</td>
                                                                        <td>1</td>
                                                                        <td>{{ $data_pesan_hotel->AR_price }}</td>
                                                                        <td>{{ $data_pesan_hotel->AR_price * 3 }}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                    <input type="submit" value="Approve" class="btn btn-info">
                                                                    </form>
                                                                    </tbody>
                                                                </table>
                                                            @endif
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
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop