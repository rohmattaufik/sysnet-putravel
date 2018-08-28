<!DOCTYPE html>
<html>
<head>
   <?php echo $__env->make("layouts.head", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('/plugins/iCheck/square/blue.css')); ?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?php echo e(url('/')); ?>"><b>Sistem </b>Surat Tugas</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="<?php echo e(route('login')); ?>" aria-label="<?php echo e(__('Login')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <?php if($errors->has('email')): ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                <?php endif; ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                       name="password" required placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php if($errors->has('password')): ?>
                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        
                            
                        
                        <label for="remember">
                            <input type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <?php echo e(__('Remember Me')); ?>

                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary">
                        <?php echo e(__('Login')); ?>

                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        
            
            
                
            
                
        
        <!-- /.social-auth-links -->

        <a href="<?php echo e(route('password.request')); ?>">
            <?php echo e(__('Forgot Your Password?')); ?>

        </a>
        
        

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->





<?php echo $__env->make('layouts/script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(URL::asset('/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
