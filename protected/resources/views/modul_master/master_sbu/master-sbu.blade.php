@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master SBU
                <small>Add your master data like: Kota, Golongan, dan Nilai</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="box box-primary">
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
                            <table class="table table-bordered" id="dynamic_field" style="width: 100%;">
                                <thead>
                                    <th class="col-lg-4">Kota</th>
                                    <th class="col-lg-4">Golongan</th>
                                    <th style="padding-right: 10px; padding-left:10px;">Nilai</th>
                                </thead>
                                <tr>
                                    <td class="text-nowrap">
                                        <select name="kota[]" class="form-control select-data" style="width: 100%;">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control select-data" style="width: 100%;">
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 120%;">
                                            <input type="text"
                                                   name="value[]"
                                                   placeholder="Enter value"
                                                   class="form-control name_list uang" aria-describedby="basic-addon2" />
                                            <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control select-data"  style="width: 100%;">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control select-data"  style="width: 100%;">
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 120%;">
                                            <input type="text"
                                                   name="value[]"
                                                   placeholder="Enter value"
                                                   class="form-control name_list uang" aria-describedby="basic-addon2" />
                                            <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control select-data"  style="width: 100%;">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control select-data" style="width: 100%;">
                                            @foreach ($golongans as $golongan)
                                                <option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 120%;">
                                            <input type="text"
                                                   name="value[]"
                                                   placeholder="Enter value"
                                                   class="form-control name_list uang" aria-describedby="basic-addon2" />
                                            <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="kota[]" class="form-control select-data"  style="width: 100%;">
                                            @foreach ($kotas as $kota)
                                                <option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan[]" class="form-control select-data"  style="width: 100%;">
                                            @foreach ($golongans as $golongan)
                                                <option  value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 120%;">
                                            <input type="text"
                                                   name="value[]"
                                                   placeholder="Enter value"
                                                   class="form-control name_list uang" aria-describedby="basic-addon2" />
                                            <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                        </div>
                                    </td>
                                </tr>
                                
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

                        {{--<div class="box-footer">--}}
                            {{--<button type="button" name="add" id="add" class="btn btn-success btn-block">--}}
                                {{--Add Row--}}
                            {{--</button>--}}
                            {{--<button type="submit" class="btn btn-primary btn-block">Submit</button>--}}
                        {{--</div>--}}
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
                                    <td>Rp <span class="uang">{{ $sbu->value }}</span></td>
                                    <td>

                                        <a type="button" href="{{ url(action('MasterSBUController@edit',$sbu->id)) }}"
                                                class="btn btn-primary btn-sm">Edit</a>
                                        
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id_sbu" value="{{ $sbu->id }}">
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
    <script type="text/javascript">
        $(document).ready(function(){

            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});

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
                $('#dynamic_field').append('' +
                    '<tr id="row'+i+'" class="dynamic-added">' +
                    '<td>' +
                        '<select name="kota[]" class="form-control select-data">' +
                            '@foreach ($kotas as $kota)' +
                                '<option value="{{ $kota->id }}" >{{ $kota->city_name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td>'+
                        '<select name="golongan[]" class="form-control select-data">'+
                            '@foreach ($golongans as $golongan)'+
                                '<option value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>'+
                            '@endforeach'+
                        '</select>'+
                    '</td>'+
                    '<td>'+
                        '<div class="input-group">'+
                        '<input type="text"'+
                                'name="value[]"'+
                                'placeholder="Enter value"'+
                                'class="form-control name_list uang" aria-describedby="basic-addon2" />'+
                                '<span class="input-group-addon" id="basic-addon2">Rupiah</span>'+
                        '</div>'+
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