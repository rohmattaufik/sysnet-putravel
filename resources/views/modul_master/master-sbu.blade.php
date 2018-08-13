@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master SBU
                <small>Add your master data like: Kota, Golongan, dan Nilai</small>
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">Quick Example</h3>--}}
                </div>

                <div class="box-body">
                    <div class="col-lg-8">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Kota</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Nilai</th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td>
                                    <select class="form-control select-data">

                                        <option value="AZ" data-select2-id="12">Jabatan</option>
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>

                                    </select>
                                </td>
                                <td>
                                    <select class="form-control select-data">

                                        <option value="AZ" data-select2-id="12">Jabatan</option>
                                        <option value="CO" data-select2-id="13">Golongan</option>
                                        <option value="ID" data-select2-id="14">Departemen</option>
                                        <option value="MT" data-select2-id="15">Unit Kerja</option>
                                        <option value="NE" data-select2-id="16">Kota</option>
                                        <option value="NM" data-select2-id="17">Jenis Supplier</option>

                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control"
                                           id="kode_surat_tugas"
                                           name="kode_surat_tugas" placeholder="Kode Surat Tugas">
                                </td>

                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@section('new-script')
    <script>
        $(document).ready(function() {
            $('.select-data').select2();
        });
    </script>
@stop