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

            <div class="box box-primary">
                <div class="box-header with-border">
                    {{--<h3 class="box-title">Quick Example</h3>--}}
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" name="add_name" id="add_name">
                    <div class="box-body">

                        <div class="form-group">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-9">
                                        <label class="col-lg-2">Input Data</label>
                                        <div class="col-lg-4">
                                            <select class="form-control select-data">

                                                <option value="AZ" data-select2-id="12">Jabatan</option>
                                                <option value="CO" data-select2-id="13">Golongan</option>
                                                <option value="ID" data-select2-id="14">Departemen</option>
                                                <option value="MT" data-select2-id="15">Unit Kerja</option>
                                                <option value="NE" data-select2-id="16">Kota</option>
                                                <option value="NM" data-select2-id="17">Jenis Supplier</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="form-group" method="post" action="{{url('master/data/jabatan/create')}}">
                            <div class="col-lg-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="text-center">Jabatan</h3>
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
                                                           name="jabatans[]"
                                                           placeholder="Enter your Name"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="jabatans[]"
                                                           placeholder="Enter your Name"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="jabatans[]"
                                                           placeholder="Enter your Name"
                                                           class="form-control name_list" />
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="text"
                                                           name="jabatans[]"
                                                           placeholder="Enter your Name"
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

                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Email address</label>--}}
                            {{--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputPassword1">Password</label>--}}
                            {{--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputFile">File input</label>--}}
                            {{--<input type="file" id="exampleInputFile">--}}

                            {{--<p class="help-block">Example block-level help text here.</p>--}}
                        {{--</div>--}}
                        {{--<div class="checkbox">--}}
                            {{--<label>--}}
                                {{--<input type="checkbox"> Check me out--}}
                            {{--</label>--}}
                        {{--</div>--}}
                    </div>
                    <!-- /.box-body -->

                </form>
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
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
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