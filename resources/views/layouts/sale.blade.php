<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{__('Sistem Layanan Kemahasiswaan | Universitas Universal')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @if(!empty(setting('fevicon_path')))
  <link rel="icon" href="{{asset(\Storage::url(setting('fevicon_path')))}}"  />
  @else
  <link rel="icon" href="{{asset('images/fuvers.png')}}"  />
  @endif
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- DataTables -->
  {{-- <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap.min.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/select2.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> --}}
  {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
  <script src="{{asset('js/app.js')}}"></script>
  @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div id="progressbar-recommendation" class="pt-loading">
    <div class="loading-progress"></div>
  </div>
<div class="wrapper">
  @include('partials.navbar')
  <!-- Left side column. contains the logo and sidebar -->
  @include('partials.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('partials.footer')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <div id="app"></div>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 & bootstrap 3.3.7 -->
{{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
<!-- DataTables -->
{{-- <script src="{{asset('js/jquery-ui.js')}}"></script> --}}
{{-- <script src="{{asset('js/jquery.dataTables.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script> --}}
<!-- AdminLTE App -->
{{-- <script src="{{asset('dist/js/select2.full.min.js')}}"></script> --}}
{{-- <script src="{{asset('dist/js/adminlte.js')}}"></script> --}}
<!-- notify js -->
@include('partials.notify')
<!-- theme js -->
{{-- <script src="{{asset('js/theme.js')}}"></script> --}}
<!-- page script -->
<script src="{{asset('js/main_sale.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('script')
</body>
</html>
