<?php $__env->startSection('content'); ?>
<div class="login-background"></div>
<div class="login-box">
  <div class="login-logo">
    <a href="#">
<?php if(!empty(setting('logo_path'))): ?>
        <img src="<?php echo e(asset(setting('logo_path'))); ?>" alt="" height="70px">
        <?php else: ?>
        <img src="<?php echo e(asset('images/logo_uvers.png')); ?>" alt="" height="70px">
        <?php endif; ?>

    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <p class="login-box-msg"><?php echo e(__('Sistem Layanan Kemahasiswaan')); ?></p>
	<?php if(count($errors) > 0): ?>
		<div class="alert alert-danger">
		<strong>Whoops!</strong> <?php echo e(__('There were some problems with your input.')); ?><br><br>
			<ul>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</ul>
		</div>
	<?php endif; ?>
    <form data-no-ajax action="<?php echo e(route('login')); ?>" method="post">
    	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
<!--           <div class="checkbox icheck">
            <label>
              <input type="checkbox"> <?php echo e(__('Remember Me')); ?>

            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<button type="submit" submit-text="Loading..." class="btn btn-success btn-block"><?php echo e(__('MASUK')); ?></button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">

    </div>
    <!-- /.social-auth-links -->

<!-- 	<a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('I forgot my password')); ?></a><br>
  <a href="<?php echo e(url('/register')); ?>" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/auth/login.blade.php ENDPATH**/ ?>