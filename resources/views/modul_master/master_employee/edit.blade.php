@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Employee
                <small>Edit your master data : Employee</small>
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
                    <form class="form-horizontal" method="post" action="{{ url(action('MasterEmployeeController@update')) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="employee_id" value="{{ $employee->id }}">

                        <div class="box-body">
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nik"
                                           name="nik" 
                                           value="{{ $employee->nik }}"
                                           placeholder="NIK">
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
                                <label for="nama_travel" class="col-sm-2 control-label">E-Mail</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="email"
                                           name="email" 
                                           value="{{ $employee->email }}"
                                           placeholder="Email">
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

                                <div class="col-sm-4">
                                    <input type="file" class="form-control"
                                           id="photo"
                                           name="photo" placeholder="Photo">
                                    <p class="help-block">Masukkan Foto Karyawan</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user_id" class="col-sm-2 control-label">User ID</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="user_id"
                                           name="user_id" 
                                           value="{{$employee->id}}"
                                           placeholder="User ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password" 
                                           placeholder="Password">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-danger btn-lg">Reset</button>
                            <button type="submit" class="btn btn-primary btn-lg">Save</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>


        </section>
    </div>
@stop