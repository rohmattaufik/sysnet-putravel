@extends('layouts.app-admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master
                <small>Edit your master Bank</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Modul Master</a></li>
                <li class="active">Bank</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->

              <div class="box box-primary">
                  <div class="box-header with-border">
                      <div class="box-header with-border">
                          <h3 class="box-title">
                              <a href="{{ url(action('MasterEmployeeController@index')) }}">
                                  <i class="fa fa-arrow-left"></i>
                              </a>
                              Edit Bank
                          </h3>
                      </div>
                  </div>

                  <div class="box-body">
                      <form method="post" action="{{ url(action('MasterBankController@update'))}}">
                      {{ csrf_field()}}
                      <input type="hidden" name="id" value="{{ $bank->id }}">
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
                                               name="bank_name"
                                               placeholder="Enter Bank Name"
                                               class="form-control name_list"
                                               value = "{{ $bank->bank_name}}"/>
                                      </td>
                                      <td>
                                          <input type="text"
                                                 name="account_number"
                                                 placeholder="Enter Account Number"
                                                 class="form-control name_list"
                                                 value = "{{ $bank->account_number}}"/>
                                      </td>
                                      <td>
                                          <input type="text"
                                                 name="account_holder"
                                                 placeholder="Enter Account Name"
                                                 class="form-control name_list"
                                                 value = "{{ $bank->account_holder}}"/>
                                      </td>
                                  </tr>
                                  </tbody>

                              </table>

                          </div>

                          <div class="box-footer">
                              <div class="row">
                                  <div class="col-lg-9">

                                  </div>
                                  <div class="col-lg-3">
                                      <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                                  </div>
                              </div>
                          </div>
                          </form>
                      </div>

                  </div>

              </div>
        </section>
    </div>
@stop
