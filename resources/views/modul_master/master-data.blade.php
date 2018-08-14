@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Data
                <small>Add your master data like: Jabatan, Golongan, dll</small>
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

            <div class="row">

        <div class="col-lg-8">


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                    </h3>
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
                <form role="form" method="post" action="{{ url(action('MasterDataController@store_jabatan')) }}">
                    {{ csrf_field() }}
                    <div class="box-body">

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <label class="col-lg-2">Input Data</label>
                                        <div class="col-lg-4">
                                            <select id="jenis_data" name="jenis_data" class="form-control select-data">

                                                <option value="jabatan" data-select2-id="12">Jabatan</option>
                                                <option value="golongan" data-select2-id="13">Golongan</option>
                                                <option value="departemen" data-select2-id="14">Departemen</option>
                                                <option value="unit_kerja" data-select2-id="15">Unit Kerja</option>
                                                <option value="kota" data-select2-id="16">Kota</option>
                                                <option value="jenis_supplier" data-select2-id="17">Jenis Supplier</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <div class="col-lg-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 id="title_jenis_data" class="text-center">Jabatan</h3>
                                    </div>
                                    <div class="alert alert-danger print-error-msg" style="display:none">
                                        <ul></ul>
                                    </div>


                                    <div class="alert alert-success print-success-msg" style="display:none">
                                        <ul></ul>
                                    </div>


                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dynamic_field">
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="inputs[]"
                                                           placeholder="Input your data"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="inputs[]"
                                                           placeholder="Input your data"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="inputs[]"
                                                           placeholder="Input your data"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="inputs[]"
                                                           placeholder="Input your data"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        </table>

                                    </div>

                                    <div class="box-footer">
                                        <button type="button" name="add" id="add" class="btn btn-success btn-block">
                                            Add Row
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                </form>
            </div>

        </div>

            <div class="row">
                <div class="col-lg-10">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">


                            <li class="dropdown" style="cursor: pointer;">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"
                                   aria-expanded="false" style="cursor: pointer;">
                                    Daftar Jenis Data<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">

                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#tab_jabatan" data-toggle="tab">Jabatan</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#tab_department" data-toggle="tab">Department</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#tab_golongan" data-toggle="tab">Golongan</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#tab_3" data-toggle="tab">Unit Kerja</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#tab_3" data-toggle="tab">Kota</a>
                                    </li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="#tab_3" data-toggle="tab">Jenis Supplier</a>
                                    </li>

                                </ul>
                            </li>

                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_jabatan">
                                <h3 class="box-title">
                                    Daftar Nama Jabatan
                                </h3>

                                <table id="table_jabatan" class="table display responsive no-wrap" width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Jabatan</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0; ?>
                                        @foreach($data_jabatan as $data)
                                            <tr>
                                                <form method="post" action="{{ url(action('MasterDataController@delete_jabatan')) }}">
                                                    {{ csrf_field() }}
                                                    <td scope="row"><?php echo ++$count; ?></td>
                                                    <td>{{ $data->position_name }}</td>
                                                    <input type="hidden" name="jabatan_id" value= "{{ $data->id }}" required autofocus>

                                                    <td>
                                                        <a type="button" href="{{ url(action('MasterDataController@edit_jabatan',$data->id)) }}"
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

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_department">
                                <h3 class="box-title">
                                    Daftar Nama Department
                                </h3>

                                <table id="table_department" class="table display responsive no-wrap" width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Department</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0; ?>
                                    @foreach($data_department as $data)
                                        <tr>
                                            <form method="post" action="{{ url(action('MasterDataController@delete_jabatan')) }}">
                                                {{ csrf_field() }}
                                                <td scope="row"><?php echo ++$count; ?></td>
                                                <td>{{ $data->department_name }}</td>
                                                <input type="hidden" name="jabatan_id" value= "{{ $data->id }}" required autofocus>

                                                <td>
                                                    <a type="button" href="{{ url(action('MasterDataController@edit_jabatan',$data->id)) }}"
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
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_golongan">
                                <h3 class="box-title">
                                    Daftar Nama Golongan
                                </h3>

                                <table id="table_golongang" class="table display responsive no-wrap" width="100%">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Golongan</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 0; ?>
                                    @foreach($data_golongan as $data)
                                        <tr>
                                            <form method="post" action="{{ url(action('MasterDataController@delete_jabatan')) }}">
                                                {{ csrf_field() }}
                                                <td scope="row"><?php echo ++$count; ?></td>
                                                <td>{{ $data->class_name }}</td>
                                                <input type="hidden" name="jabatan_id" value= "{{ $data->id }}" required autofocus>

                                                <td>
                                                    <a type="button" href="{{ url(action('MasterDataController@edit_jabatan',$data->id)) }}"
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
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>

                </div>
            </div>


        </div>



        </section>
    </div>



@stop

@section('new-script')

    <script>
//        $(document).ready( function () {
//            $('#table_jabatan').DataTable( {
//                responsive: true
//            } )
//        } );

        $(document).ready(function() {
            var table = $('#table_jabatan').DataTable( {
                responsive: true,
                "order": [[ 0, "asc" ]]
            } );

            new $.fn.dataTable.FixedHeader( table );
        } );

        $(document).ready(function() {
            var table = $('#table_department').DataTable( {
                responsive: true,
                "order": [[ 0, "asc" ]]
            } );

            new $.fn.dataTable.FixedHeader( table );
        } );

        $(document).ready(function() {
            var table = $('#table_golongan').DataTable( {
                responsive: true,
                "order": [[ 0, "asc" ]]
            } );

            new $.fn.dataTable.FixedHeader( table );
        } );
    </script>

    <script>
//        var e = document.getElementById("jenis_data");
//        var strUser = e.options[e.selectedIndex].text;
//
//        document.getElementById("title_jenis_data").innerHTML = strUser;
            $(document).ready(function() {
                $("#jenis_data").change(function() {
                    $('#title_jenis_data').html($(this).val());
                }).change();
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
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="inputs[]" placeholder="Input your data" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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
@stop
