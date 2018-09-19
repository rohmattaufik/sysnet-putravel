@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Employee
                <small>Edit your master data : Employee</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ url(action('MasterEmployeeController@index')) }}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        Edit Employee
                    </h3>
                </div>

                <div class="box-body">
                    <div class="box-header with-border">
                        {{--<h3 class="box-title">Form</h3>--}}
                        @if(Session::get('gagal'))
                            <div class="callout callout-danger">
                                <h4>{{ Session::get('gagal') }}</h4>

                                <p>Data Anda gagal diinput ke database.</p>
                            </div>
                        @endif
                    </div>


                    <form class="form-horizontal" enctype="multipart/form-data"
                          method="post" action="{{ url(action('MasterEmployeeController@update')) }}">
                        {{ csrf_field() }}


                        <div class="box-body">
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nik"
                                           name="nik"
                                           value="{{ $employee->NIK }}"
                                           placeholder="NIK">
                                    <input type="hidden" name="employee_id" value="{{ $employee_id }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama"
                                           name="nama"
                                           value="{{ $employee->employee_name}}"
                                           placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Unit Kerja</label>
                                <div class="col-lg-4">
                                    <select name="unit_kerja" class="form-control select-data">
                                        @foreach ($unit_kerjas as $items)
                                            @if ($items->id == $employee->idUnitKerja)
                                            <option value="{{ $items->id }}"
                                                data-select2-id="{{ $items->id }}"
                                                selected="true">{{ $items->work_unit }}</option>
                                            @else
                                            <option value="{{ $items->id }}"
                                                data-select2-id="{{ $items->id }}">{{ $items->work_unit }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Jabatan*</label>
                                <div class="col-lg-4">
                                    <select name="jabatan" class="form-control select-data">
                                        @foreach ($jabatans as $items)
                                            @if($items->id == $employee->idJabatan)
                                            <option value="{{ $items->id }}"
                                                data-select2-id="{{ $items->id }}"
                                                selected="true">{{ $items->position_name }}</option>
                                            @else
                                            <option value="{{ $items->id }}"
                                                data-select2-id="{{ $items->id }}">{{ $items->position_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Golongan</label>
                                <div class="col-lg-4">
                                    <select name="golongan" class="form-control select-data">
                                        @foreach ($golongans as $items)
                                            @if( $items->id == $employee->idGolongan)
                                                <option value="{{ $items->id }}"
                                                    data-select2-id="{{ $items->id }}"
                                                    selected="true">{{ $items->class_name}}</option>
                                            @else
                                                <option value="{{ $items->id }}"
                                                    data-select2-id="{{ $items->id }}">{{ $items->class_name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Telp</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="phone"
                                           name="phone"
                                           value="{{ $employee->phone }}"
                                           placeholder="No. Telpon">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="photo" class="col-sm-2 control-label">Photo</label>

                                <div class="col-sm-6">
                                    <input type="file" class="form-control"
                                           id="photo"
                                           name="photo" placeholder="Photo">
                                    <p class="help-block">Biarkan saja jika tidak ingin mengubah photo.</p>
                                    <a class="help-block" href="{{ URL::asset($employee->photo) }}" target="_blank">View Current Photo</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">E-Mail</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="email"
                                           value="{{ $employee->email }}"
                                           name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password" placeholder="Isi Password Baru">
                                </div>
                            </div>

                            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="role">Role</label>
                                    <div class="col-lg-4">
                                        <select name="role" class="form-control select-data">
                                            <option value="1"
                                                    data-select2-id="1">
                                                Admin PU / Karyawan PU
                                            </option>
                                            <option value="2"
                                                    data-select2-id="2">
                                                Finance PU
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            @else
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="role">Role</label>
                                    <div class="col-lg-4">
                                        <select name="role" class="form-control select-data">
                                            <option value="3"
                                                    data-select2-id="3">
                                                Admin Travel
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-6">
                                    {{--<button type="submit" class="btn btn-danger btn-lg">Reset</button>--}}
                                    <button type="submit" class="btn-block btn-primary btn">Save</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>


        </section>
    </div>
@stop
