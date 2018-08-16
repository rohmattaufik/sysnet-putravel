@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Employee
                <small>Add your master data : Employee</small>
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
                    <form class="form-horizontal" method="post" action="{{ url(action('MasterEmployeeController@store')) }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nik"
                                           name="nik" placeholder="NIK">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama*</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="nama"
                                           name="nama" placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Unit Kerja</label>
                                <div class="col-lg-4">
                                    <select name="unit_kerja" class="form-control select-data">
                                        @foreach ($unit_kerjas as $items)
                                            <option value="{{ $items->id }}"
                                                data-select2-id="{{ $items->id }}">{{ $items->work_unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Jabatan*</label>
                                <div class="col-lg-4">
                                    <select name="jabatan" class="form-control select-data">
                                        @foreach ($jabatans as $items)
                                        <option value="{{ $items->id }}"
                                            data-select2-id="{{ $items->id }}">{{ $items->position_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="unit_kerja">Golongan</label>
                                <div class="col-lg-4">
                                    <select name="golongan" class="form-control select-data">
                                        @foreach ($golongans as $items)
                                            <option value="{{ $items->id }}"
                                                data-select2-id="{{ $items->id }}">{{ $items->class_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_travel" class="col-sm-2 control-label">E-Mail</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="email"
                                           name="email" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-sm-2 control-label">Telp</label>

                                <div class="col-sm-4">
                                    <input type="text" class="form-control"
                                           id="phone"
                                           name="phone" placeholder="No. Telpon">
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
                                           name="user_id" placeholder="User ID">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password" placeholder="Password">
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of Employees</h1>
                </div>

                    <div class="box-body table-responsive no-padding">

                        <table id="table_employee" class="table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Unit Kerja</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $key => $person)
                                <tr>
                                    <form method="post" action="{{ url(action('MasterEmployeeController@delete')) }}">
                                        {{ csrf_field() }}
                                        <td scope="row"><?php echo ++$key; ?></td>
                                        <td>{{ $person->NIK }} </td>
                                        <td>{{ $person->employee_name }}  </td>
                                        <td>{{ $person->work_unit }}  </td>
                                        <td>{{ $person->position_name }}  </td>
                                        <td>{{ $person->class_name }}</td>
                                        <td>{{ $person->email}}</td>
                                        <td>{{ $person->phone}}</td>
                                        <td>{{ $person->photo  }}</td>
                                        <input type="hidden" name="employee_id" value= "{{ $person->id }}" required autofocus>

                                        <td>
                                            <a type="button" href="{{ url(action('MasterEmployeeController@edit',$person->id)) }}"
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


        </section>
    </div>
@stop
