<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Modul Transaksi Surat Tugas
                <small>Create your Surat Tugas</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <!--------------------------
              | Your Page Content Here |
              -------------------------->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <?php if(Session::get('sukses') || Session::get('sukses-delete')): ?>
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                            <?php if(Session::get('sukses')): ?>
                                <div class="callout callout-success">
                                    <h4><?php echo e(Session::get('sukses')); ?></h4>

                                    <p>Data Anda berhasil masuk database.</p>
                                </div>
                            <?php endif; ?>
                            <?php if(Session::get('sukses-delete')): ?>
                                <div class="callout callout-danger">
                                    <h4><?php echo e(Session::get('sukses-delete')); ?></h4>

                                    <p>Data Anda berhasil dihapus dari database.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h1 class="box-title">List of Surat Tugas</h1>
                        </div>
                        <div class="box-body table-responsive no-padding">

                            <table id="table_surat_tugas" class="table display responsive no-wrap" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Surat Tugas</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Tanggal Surat Tugas</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                <?php $__currentLoopData = $data_surat_tugas_h; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                            <td scope="row"><?php echo ++$count; ?></td>
                                            <td><?php echo e($data->assigment_letter_code); ?>  </td>
                                            <td><?php echo e($data->city_name); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($data->created_at)->format('d-m-Y')); ?> </td>
                                            <input type="hidden" name="surat_id" value= "<?php echo e($data->id); ?>" required autofocus>

                                            <td>
                                              <?php if($data->hotel_status == 0): ?>
                                              <button type="button"
                                                 class="btn btn-primary" disabled>Pesan Hotel</button>
                                              <?php else: ?>
                                              <a type="button"
                                                 href="#"
                                                 class="btn btn-primary">Pesan Hotel</a>
                                              <?php endif; ?>

                                              <?php if($data->plane_status == 0): ?>
                                              <button type="button"
                                                 class="btn btn-primary" disabled>Pesan Tiket</button>
                                              <?php else: ?>
                                              <a type="button"
                                                 href="#"
                                                 class="btn btn-primary">Pesan Tiket</a>
                                              <?php endif; ?>

                                            </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>

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
//            var table = $('#table_supplier').DataTable( {
//                responsive: true,
//                "order": [[ 0, "asc" ]]
//            } );
//
//            new $.fn.dataTable.FixedHeader( table );

        } );
        $('#').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive' : true
        })
    </script>

    <script>
        //Date picker
        $('#datepicker1').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
        });
        $('#datepicker2').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
        });
        $('#datepicker3').datepicker({
            autoclose: true,
            todayHighlight : true,
            todayBtn : "linked",
            format : 'yyyy-mm-dd'
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

    <script>
        $('#table_surat_tugas').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true,
            'responsive' : true,
            "order": [[ 1, "desc" ]]
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>