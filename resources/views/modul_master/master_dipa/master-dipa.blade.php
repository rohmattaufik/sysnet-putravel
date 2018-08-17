@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master DIPA
                <small>Add your master DIPA</small>
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
                    <form method="post" action="{{ url(action('MasterDIPAController@store'))}}">
                    {{ csrf_field()}}
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
                                <th>No</th>
                                <th>Department</th>
                                <th>Akun</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <select name="department[]" class="form-control">
                                            @foreach( $departments as $department)
                                            <option value="{{ $department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="akun[]"
                                               placeholder="Enter Account"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <select name="department[]" class="form-control">
                                            @foreach( $departments as $department)
                                            <option value="{{ $department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="akun[]"
                                               placeholder="Enter Account"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <select name="department[]" class="form-control">
                                            @foreach( $departments as $department)
                                            <option value="{{ $department->id}}">{{$department->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="akun[]"
                                               placeholder="Enter Account"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                </tbody>
                                
                            </table>

                        </div>

                        <div class="box-footer">
                            <button type="button" name="add" id="add" class="btn btn-success btn-block">
                                Add Row
                            </button>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of DIPA</h1>
                </div>

                    <div class="box-body table-responsive no-padding">
                        
                        <table id="table_employee" class="table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Departemen</th>
                                <th scope="col">Akun</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($dipas as $key => $dipa)
                            <tr>
                                
                                <form method="post" action="{{ url(action('MasterDIPAController@delete'))}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $dipa->department_name }}</td>
                                    <td>{{ $dipa->DIPA_code }}</td>
                                    <td>

                                        <a type="button" href="{{ url(action('MasterDIPAController@edit',$dipa->id)) }}"
                                                class="btn btn-primary">Edit</a>
                                        
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_dipa" value="{{ $dipa->id }}">
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
            var count = 3;


            $('#add').click(function(){
                i++;
                count++;
                $('#dynamic_field').append('' +
                    '<tr id="row'+i+'" class="dynamic-added">' +
                        '<td>'+count+'</td>'+
                        '<td>'+
                            '<select name="department[]" class="form-control">'+
                                '@foreach( $departments as $department)'+
                                '<option value="{{ $department->id}}">{{$department->department_name}}</option>'+
                                '@endforeach'+
                            '</select>'+
                        '</td>'+
                        '<td>'+
                            '<input type="text"'+
                                    'name="akun[]"'+
                                    'placeholder="Enter Account"'+
                                    'class="form-control name_list" />'+
                        '</td>'+
                    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +
                    '</td></tr>');
            });

            $(document).on('click', '.btn_remove', function(){
                count--;
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