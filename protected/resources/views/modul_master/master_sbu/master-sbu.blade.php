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
                <form method="post" action="{{ url(action('MasterSBUController@store'))}}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="col-lg-8">

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>


                        <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <thead>
                                    <th>Kota</th>
                                    <th>Golongan</th>
                                    <th>Nilai</th>
                                </thead>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control">
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="value[]"
                                               placeholder="Enter value"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control">
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="value[]"
                                               placeholder="Enter value"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control">
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="value[]"
                                               placeholder="Enter value"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control">
                                            @foreach ($golongans as $golongan)
                                                <option  value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number"
                                               name="value[]"
                                               placeholder="Enter value"
                                               class="form-control name_list" />
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
                    </form>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of SBU</h1>
                </div>

                    <div class="box-body table-responsive no-padding">
                        
                        <table id="table_employee" class="table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Golongan</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sbus as $key => $sbu)
                            <tr>
                                
                                <form method="post" action="{{ url(action('MasterSBUController@delete'))}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $sbu->city_name }}</td>
                                    <td>{{ $sbu->class_name }}</td>
                                    <td>{{ $sbu->value }}</td>
                                    <td>

                                        <a type="button" href="{{ url(action('MasterSBUController@edit',$sbu->id)) }}"
                                                class="btn btn-primary">Edit</a>
                                        
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_sbu" value="{{ $sbu->id }}">
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

@section('new-script')
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
                    '<tr id="row'+i+'" class="dynamic-added">' +
                    '<td>' +
                        '<select name="kota[]" class="form-control">' +
                            '@foreach ($kotas as $kota)' +
                                '<option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td>'+
                        '<select name="golongan[]" class="form-control">'+
                            '@foreach ($golongans as $golongan)'+
                                '<option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td>'+
                        '<input type="number"'+
                                'name="value[]"'+
                                'placeholder="Enter value"'+
                                'class="form-control name_list" />'+
                    '</td>'+
                    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +
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
@stop