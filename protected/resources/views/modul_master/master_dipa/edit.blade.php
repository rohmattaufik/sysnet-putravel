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
                    <h3 class="box-title">
                        <a href="{{ url(action('MasterDIPAController@index')) }}">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        Edit DIPA
                    </h3>
                </div>

                <div class="box-body">
                    <div class="col-lg-8">

                        <div class="alert alert-danger print-error-msg" style="display:none">
                            <ul></ul>
                        </div>


                        <div class="alert alert-success print-success-msg" style="display:none">
                            <ul></ul>
                        </div>
                        <form method="post" action="{{ url(action('MasterDIPAController@update'))}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $dipa[0]->id }}">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <thead>
                                    
                                    <th>Department</th>
                                    <th>Akun</th>
                                </thead>
                                <tr>
                                    <td>
                                        <select name="department" class="form-control">
                                            @foreach ($departments as $department)
                                                @if( $department->id == $dipa[0]->idDepartment)
                                                    <option  value="{{ $department->id }}" selected="true" >{{ $department->department_name }}</option>
                                                @else
                                                    <option  value="{{ $department->id }}" >{{ $department->department_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="akun"
                                               placeholder="Enter Account"
                                               value="{{$dipa[0]->DIPA_code}}"
                                               class="form-control name_list" />
                                    </td>
                                </tr>
                                
                            </table>

                        </div>

                        <div class="box-footer">
                            
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                        </form>
                    </div>
                
            </div>

        </section>
    </div>
@stop

