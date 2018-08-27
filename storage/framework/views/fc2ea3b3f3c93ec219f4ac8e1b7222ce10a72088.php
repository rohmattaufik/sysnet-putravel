<?php $__env->startSection('content'); ?>


<!-- #create -->
<div class="container">
   <div class="form">
     <form role="form" method="POST" action="position/create" >
       <?php echo e(csrf_field()); ?>

       <div class="form-row">
         <div class="form-group col-md-12">
           <input type="text" name="position_name" class="form-control" id="name" placeholder="position_name*" data-msg="Please enter at least 4 chars" required />
           <div class="validation"></div>
         </div>
       </div>
       <div class="text-center"><button type="submit" name="submit">Post</button></div>
     </form>
   </div>
 </div>
</div>
<!-- #create -->


<!-- #List -->
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  Title : <?php echo e($content->position_name); ?>

  <br>
  Created_at : <?php echo e($content->created_at); ?>

  <br>
  Created_by : <?php echo e($content->created_by); ?>

  <br>
  <div class="form">
    <form role="form" method="POST" action="position/delete" >
      <?php echo e(csrf_field()); ?>

      <input type="hidden" name="code" value= "<?php echo e($content->id); ?>" required autofocus>
      <div class="text-center"><button type="submit" name="submit">Delete</button></div>
    </form>
  <a href="position/edit/<?php echo e($content->id); ?>"> Edit</a>
  </div>
  <br>
  <br>
  <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<!-- List -->

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>