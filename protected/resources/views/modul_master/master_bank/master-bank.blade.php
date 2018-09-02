@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master Bank
                <small>Add your master Bank</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Modul Master</a></li>
                <li class="active">Maser Bank</li>
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
                    <form method="post" action="{{ url(action('MasterBankController@store'))}}">
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
                                <th>Bank Name</th>
                                <th>Account Number</th>
                                <th>Account Name</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                      <input type="text"
                                             name="bank_name[]"
                                             placeholder="Enter Bank Name"
                                             class="form-control name_list" />
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="account_number[]"
                                               placeholder="Enter Account Number"
                                               class="form-control name_list" />
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="account_holder[]"
                                               placeholder="Enter Account Name"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                      <input type="text"
                                             name="bank_name[]"
                                             placeholder="Enter Bank Name"
                                             class="form-control name_list" />
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="account_number[]"
                                               placeholder="Enter Account Number"
                                               class="form-control name_list" />
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="account_holder[]"
                                               placeholder="Enter Account Name"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                      <input type="text"
                                             name="bank_name[]"
                                             placeholder="Enter Bank Name"
                                             class="form-control name_list" />
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="account_number[]"
                                               placeholder="Enter Account Number"
                                               class="form-control name_list" />
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="account_holder[]"
                                               placeholder="Enter Account Name"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                        </div>

                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-4">
                                    <button type="button" name="add" id="add" class="btn btn-success btn-block btn-sm">
                                        Add Row
                                    </button>
                                </div>
                                <div class="col-lg-8">
                                    <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                </div>

            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h1 class="box-title">List of Bank</h1>
                </div>

                    <div class="box-body table-responsive no-padding">

                        <table id="table_employee" class="table display responsive no-wrap" width="100%">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Account Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bank as $key => $data)
                            <tr>

                                <form method="post" action="{{ url(action('MasterBankController@delete'))}}">
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $data->bank_name }}</td>
                                    <td>{{ $data->account_number }}</td>
                                    <td>{{ $data->account_holder }}</td>
                                    <td>

                                        <a type="button" href="{{ url(action('MasterBankController@edit',$data->id)) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_bank" value="{{ $data->id }}">
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
                        '<td>' +
                            '<input type="text"'+
                                   'name="bank_name[]"'+
                                   'placeholder="Enter Bank Name"'+
                                   'class="form-control name_list" />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text"'+
                                   'name="account_number[]"'+
                                   'placeholder="Enter Account Number"'+
                                   'class="form-control name_list" />'+
                        '</td>'+
                        '<td>'+
                            '<input type="text"'+
                                   'name="account_holder[]"'+
                                   'placeholder="Enter Account Name"'+
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
