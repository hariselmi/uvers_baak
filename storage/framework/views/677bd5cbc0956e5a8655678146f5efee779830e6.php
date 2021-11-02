<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo e(__('Sistem Layanan Kemahasiswaan | Universitas Universal')); ?></title>
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="<?php echo e(asset('images/fuvers.png')); ?>"  />
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
  <!-- DataTables -->
  
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/select2.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/AdminLTE.min.css')); ?>">
  <!--AdminLTE Skins.Choose a skin from the css/skins folder instead of downloading all of them to reduce the load.-->
  <link rel="stylesheet" href="<?php echo e(asset('dist/css/skins/skin-blue.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dist/clockpicker/bootstrap-clockpicker.min.css')); ?>">

  <style>

    .entry:not(:first-of-type)
      {
          margin-top: 10px;
      }

      .glyphicon
      {
          font-size: 12px;
      }

      .pt-3-half { padding-top: 1.4rem; }

      .tableFixHead          { overflow: auto; height: 400px; width: 100%; }
      .tableFixHead thead th { position: sticky; top: 0; z-index: 1 !important; background-color: #f4f4f4 !important; border: 1px solid #f4f4f4 !important}
      .tableFixHead tbody td { border: 1px solid #f4f4f4 !important ; z-index: }


      .modal-dialog {
        width: 90%;
        height: 90%;
        margin: auto;
        padding-top: 10px;
      }

      .modal-content {
        height: auto;
        border-radius: 0;
      }

      .border-black{
        border: 1px solid #f4f4f4 !important
      }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="progressbar-recommendation" class="pt-loading">
    <div class="loading-progress"></div>
  </div>
  <div class="wrapper" id="app">

    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php echo $__env->make('partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- /.content-wrapper -->
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<!-- ./wrapper -->
<!-- jQuery 3 & bootstrap -->

<!-- DataTables -->



<!-- SlimScroll -->

<!-- AdminLTE App -->

<!-- notify js -->
<?php echo $__env->make('partials.notify', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- page script -->
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="<?php echo e(asset('assets/ckeditor/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('assets/ckeditor/styles.js')); ?>"></script>

<!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


<script type="text/javascript" src="<?php echo e(asset('dist/clockpicker/bootstrap-clockpicker.min.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>
<?php echo $__env->make('partials.analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
  var path = "<?php echo e(route('kegiatan')); ?>";
  $('#nama_kegiatan').typeahead({
      source:  function (query, process) {
      return $.get(path, { term: query }, function (data) {
              return process(data);
          });
      },
  });
</script>

</script>
</body>
</html>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/layouts/admin_dynamic.blade.php ENDPATH**/ ?>