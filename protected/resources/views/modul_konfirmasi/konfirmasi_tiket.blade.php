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
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab" aria-expanded="true">User - Pengguna</a>
                            </li>
                            <li class="">
                                <a href="#tab_2" data-toggle="tab" aria-expanded="false">User - Pembuat Surat</a>
                            </li>
                            <li class="">
                                <a href="#tab_3" data-toggle="tab" aria-expanded="false">User - Travel</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">

                                <div class="box box-info">

                                    <div class="box-header with-border">
                                        {{--<h3 class="box-title">Form</h3>--}}
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
                                    <!-- /.box-header -->
                                    <!-- form start -->

                                </div>



                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">

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
                                                                    <th class="text-nowrap">No Surat Tugas</th>
                                                                    <th class="text-nowrap">No Ticket</th>
                                                                    <th class="text-nowrap">Nama</th>
                                                                    <th class="text-nowrap">Kota</th>
                                                                    <th class="text-nowrap">Tanggal Berangkat</th>
                                                                    <th class="text-nowrap">Reservasi Tiket Berangkat</th>
                                                                    <th class="text-nowrap">Tanggal Kembali</th>
                                                                    <th class="text-nowrap">Reservasi Tiket Kembali</th>
                                                                    <th class="text-nowrap">Selling Price</th>
                                                                    </thead>

                                                                    <tbody>
                                                                    <input placeholder="Pilih Tanggal"
                                                                           type="hidden"
                                                                           name="tanggal_surat"
                                                                           class="form-control pull-right"
                                                                           hidden>
                                                                    <input type="hidden" name="no_surat_tugas"
                                                                           class="form-control pull-right" hidden>
                                                                    <input type="hidden" name="id_surat_h"
                                                                           class="form-control pull-right" hidden>
                                                                    <input type="hidden" name="idKota"
                                                                           class="form-control pull-right" hidden>
                                                                    <input type="hidden" name="idDept"
                                                                           class="form-control pull-right" hidden>
                                                                    <input type="hidden" name="idDipa"
                                                                           class="form-control pull-right" hidden>

                                                                    @for($i=0;$i<count($data_surat[0]['suratTugasD']);$i++)
                                                                        @if($data_surat[0]['suratTugasD'][$i]->plane_status == 1)
                                                                            <tr class="">
                                                                                <td class="text-nowrap">
                                                                                    <p>{{ $data_surat[0]['suratTugasD'][$i]->employee_name }}</p>
                                                                                </td>
                                                                                <td class="text-nowrap">
                                                                                    <select name="maskapai[]" class="form-control select-data">
                                                                                        <option value="0" >Pilih Maskapai</option>
                                                                                        @foreach ($data_supplier as $data)
                                                                                            @if($data->idJenisSupplier == 7)
                                                                                                <option value="{{ $data->id }}" >
                                                                                                    {{ $data->supplier_name }}
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
                                                                                               class="form-control uang"
                                                                                               name="harga_tiket[]"
                                                                                               placeholder="Harga Tiket (PP)">
                                                                                    </div>
                                                                                </td>

                                                                                <td class="text-nowrap">
                                                                                    <div class="input-group">
                                                                                        <input type="text"
                                                                                               class="form-control uang"
                                                                                               name="harga_maskapai[]"
                                                                                               placeholder="Harga Maskapai">
                                                                                    </div>
                                                                                </td>

                                                                                <td class="text-nowrap">
                                                                                    {{--<div class="input-group">--}}
                                                                                    {{----}}
                                                                                    {{--<input type="file" value="Upload Tiket" name="upload_tiket">--}}
                                                                                    {{--</div>--}}
                                                                                    <div class="input-group">
                                                                                        <div class="custom-file">
                                                                                            <input type="file" class="custom-file-input"
                                                                                                   id="inputGroupFile01" name="file_tiket[]" aria-describedby="inputGroupFileAddon01">
                                                                                            <label class="custom-file-label" for="inputGroupFile01">Upload Tiket</label>
                                                                                        </div>
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
                                                                        <td>
                                                                            <p>Total</p>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                       class="form-control uang"
                                                                                       name="total_harga_tiket_pp"
                                                                                       value="1.000.000"
                                                                                       placeholder="Total Harga Tiket (PP)" disabled>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                <input type="text"
                                                                                       class="form-control uang"
                                                                                       name="total_harga_tiket_maskapai"
                                                                                       value="2.000.000"
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
                                                        <a href="{{ url(action('TransaksiPesananController@index')) }}"
                                                           type="button" class="btn btn-danger btn-block">Batal</a>
                                                        <button type="submit" class="btn btn-primary btn-block">Pesan</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </form>
                                    </div>
                                </div>



                            </div>

                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h1 class="box-title">List of Travel</h1>
                        </div>
                        <div class="box-body table-responsive no-padding">

                            <table id="table_supplier" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Travel</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">No Telp</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($data_travel as $data)
                                    <tr>
                                        <form method="post" action="{{ url(action('MasterParameterController@delete')) }}">
                                            {{ csrf_field() }}
                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td>{{ $data->travel_name }} </td>
                                            <td>{{ $data->address }}  </td>
                                            <td>{{ $data->contact }}  </td>
                                            <td>{{ $data->contact_number }}  </td>
                                            <input type="hidden" name="travel_id" value= "{{ $data->id }}" required autofocus>

                                            <td>
                                                <a type="button" href="{{ url(action('MasterParameterController@edit',$data->id)) }}"
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
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop