@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Modul Master SBU
                <small>Add your master data like: Kota, Golongan, dan Nilai</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid col-lg-6">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="{{ url(action('MasterSBUController@index')) }}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        Edit SBU
                    </h3>
                </div>

                <div class="box-body">
                    <div class="col-lg-12">

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>


                        <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form method="post" action="{{ url(action('MasterSBUController@update'))}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $sbu[0]->id }}">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <thead>
                                    <th>Kota</th>
                                    <th>Golongan</th>
                                    <th class="col-lg-4">Nilai</th>
                                </thead>
                                <tr>
                                    <td>
                                        <select name="kota" class="form-control">
                                            @foreach ($kotas as $kota)
                                                @if( $kota->id == $sbu[0]->idKota)
                                                    <option  value="{{ $kota->id }}" selected="true" >{{ $kota->city_name }}</option>
                                                @else
                                                    <option  value="{{ $kota->id }}" >{{ $kota->city_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="golongan" class="form-control">
                                            @foreach ($golongans as $golongan)
                                                @if( $golongan->id == $sbu[0]->idGolongan)

                                                <option  value="{{ $golongan->id }}" selected="true">{{ $golongan->class_name }}</option>
                                                @else

                                                    <option  value="{{ $golongan->id }}">{{ $golongan->class_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input type="text"
                                                   name="value"
                                                   placeholder="Enter value"
                                                   value="{{$sbu[0]->value}}"
                                                   class="form-control name_list uang" aria-describedby="basic-addon2" />
                                            <span class="input-group-addon" id="basic-addon2">Rupiah</span>
                                        </div>
                                    </td>
                                </tr>
                                
                            </table>

                        </div>

                        <div class="box-footer">
                            
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        </form>
                    </div>
                
            </div>

        </section>
    </div>
@stop

@section('new-script')
    <script>
        $(document).ready(function(){

            // Format mata uang.
            $( '.uang' ).mask('000.000.000', {reverse: true});

        })
    </script>
@stop