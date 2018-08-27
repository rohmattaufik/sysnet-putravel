<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Master DIPA
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
                    
                </div>

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
                                        <select class="form-control select-data">
                                            <option value="1" data-select2-id="1">Kota</option>
                                            <option value="2" data-select2-id="2">Golongan</option>
                                            <option value="3" data-select2-id="3">Departemen</option>
                                            <option value="4" data-select2-id="4">Unit Kerja</option>
                                            <option value="5" data-select2-id="5">Kota</option>
                                            <option value="6" data-select2-id="6">Jenis Supplier</option>

                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="name[]"
                                               placeholder="Enter your Name"
                                               class="form-control name_list" />
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text"
                                               name="name[]"
                                               placeholder="Enter your Name"
                                               class="form-control name_list" />
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text"
                                               name="name[]"
                                               placeholder="Enter your Name"
                                               class="form-control name_list" />
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control select-data">
                                            <option value="1" data-select2-id="1">Kota</option>
                                            <option value="2" data-select2-id="2">Golongan</option>
                                            <option value="3" data-select2-id="3">Departemen</option>
                                            <option value="4" data-select2-id="4">Unit Kerja</option>
                                            <option value="5" data-select2-id="5">Kota</option>
                                            <option value="6" data-select2-id="6">Jenis Supplier</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control select-data">
                                            <option value="1" data-select2-id="1">Kota</option>
                                            <option value="2" data-select2-id="2">Golongan</option>
                                            <option value="3" data-select2-id="3">Departemen</option>
                                            <option value="4" data-select2-id="4">Unit Kerja</option>
                                            <option value="5" data-select2-id="5">Kota</option>
                                            <option value="6" data-select2-id="6">Jenis Supplier</option>

                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"
                                               name="name[]"
                                               placeholder="Enter your Name"
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
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('new-script'); ?>
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
                    '<td><input type="text" name="name[]" placeholder="Enter your Name" ' +
                    'class="form-control name_list" /></td><td>' +
                    '<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button>' +
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>