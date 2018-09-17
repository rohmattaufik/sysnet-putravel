@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Employee
                <small>Add your master data : Employee</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="box box-primary">
                {{--<div class="box-header with-border">--}}
                    {{--<h3 class="box-title">Quick Example</h3>--}}
                {{--</div>--}}

                <div class="box-body">
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

                    <form class="form-horizontal" enctype="multipart/form-data"
                          method="post" action="{{ url(action('MasterEmployeeController@store')) }}">
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
                                <label for="nama_travel" class="col-sm-2 control-label">E-Mail*</label>

                                <div class="col-sm-4">
                                    <input type="email" class="form-control"
                                           id="email"
                                           name="email" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password*</label>

                                <div class="col-sm-4">
                                    <input type="password" class="form-control"
                                           id="password"
                                           name="password" placeholder="Password" required>
                                </div>
                            </div>

                            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="role">Role*</label>
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

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of Employees</h1>
                </div>

                <div class="box-body">

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-lg-12">
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
                                        <th scope="col">Role</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $key => $person)
                                        <tr>
                                            <form method="post" enctype="multipart/form-data"
                                                  action="{{ url(action('MasterEmployeeController@delete')) }}">
                                                {{ csrf_field() }}
                                                <td scope="row"><?php echo ++$key; ?></td>
                                                <td class="text-nowrap">{{ $person->NIK }} </td>
                                                <td class="text-nowrap">{{ $person->employee_name }}  </td>
                                                <td class="text-nowrap">{{ $person->work_unit }}  </td>
                                                <td class="text-nowrap">{{ $person->position_name }}  </td>
                                                <td class="text-nowrap">{{ $person->class_name }}</td>
                                                <td class="text-nowrap">{{ $person->email}}</td>
                                                <td class="text-nowrap">{{ $person->phone}}</td>
                                                <td class="text-nowrap">
                                                    @if(is_null($person->photo))
                                                        Foto tidak ada
                                                    @else
                                                        <a href="{{ URL::asset($person->photo) }}" target="_blank">View Photo</a>
                                                    @endif
                                                </td>
                                                <input type="hidden" name="employee_id" value= "{{ $person->id }}" required autofocus>
                                                @if($person->role == 1)
                                                    <td class="text-nowrap">Admin PU</td>
                                                @elseif($person->role == 2)
                                                    <td class="text-nowrap">Finance PU</td>
                                                @elseif($person->role == 3)
                                                    <td class="text-nowrap">Travel</td>
                                                @else
                                                    <td class="text-nowrap">Tidak ada role</td>
                                                @endif
                                                <td class="text-nowrap">
                                                    <a type="button" href="{{ url(action('MasterEmployeeController@edit',$person->id)) }}"
                                                       class="btn btn-primary btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" type="submit">
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

                </div>
            </div>


        </section>
    </div>
@stop

@section('new-script')
    <script src="{{ URL::asset('js/jquery-3.3.1.js') }}" type="text/javascript"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#table_employee').DataTable();
        } );
    </script>
@stop