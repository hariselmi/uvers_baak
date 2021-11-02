<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo e(__('Sistem Layanan Kemahasiswaan | Universitas Universal')); ?></title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/jquery-ui.css')); ?>">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo e(asset('/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('/css/dataTables.bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/skin-blue.min.css')); ?>">
	<link href="<?php echo e(asset('/dist/css/AdminLTE.css')); ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
	<!-- page wise style -->
	<?php echo $__env->yieldContent('page-style'); ?>
	<!-- Fonts -->
	
	<?php if(!empty(setting('fevicon_path'))): ?>
	<link rel="icon" href="<?php echo e(asset(\Storage::url(setting('fevicon_path')))); ?>"  />
	<?php else: ?>
	<link rel="icon" href="<?php echo e(asset('images/fuvers.png')); ?>"  />
	<?php endif; ?>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div id="progressbar-recommendation" class="pt-loading">
		<div class="loading-progress"></div>
	  </div>
	<div class="wrapper">
		<?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<div id="app">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
		<?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="control-sidebar-bg"></div>
		<script src="<?php echo e(asset('js/app.js')); ?>"></script>
		
		<!-- notify js -->
		<?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- theme js -->
		
		<!-- AdminLTE App -->
		
		<!-- page script -->
		<script src="<?php echo e(asset('js/main.js')); ?>"></script>
		<?php echo $__env->yieldContent('script'); ?>
		<?php echo $__env->make('partials.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</body>
</html>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/layouts/app.blade.php ENDPATH**/ ?>