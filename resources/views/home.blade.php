@extends('layouts.app')
@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/pages/dashboard.css') }}">
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-heading">
                    @include('partials.flash')
                    @if (Auth::user()->role == 'mahasiswa')
                        <h4>{{ __('Selamat datang di Sistem Layanan Kemahasiswaan (SILMA) Universitas Universal.') }}</h4>
                    @else
                        <h1>{{ __('Dashboard Sistem Layanan Kemahasiswaan') }}</h1>
                    @endif
                </div>
                <div class="panel-body">
                    @if (Auth::user()->role == 'mahasiswa')

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box box-success">
                                    <div class="box-body">
                                        <div class="col-md-2">
                                            <h5>NIM</h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{ Get_field::get_data(Auth::user()->mahasiswa_id, 'mahasiswa', 'nim') }}</h5>
                                        </div>
            
            
                                        <div class="col-md-2">
                                            <h5>NAMA</h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{ Get_field::get_data(Auth::user()->mahasiswa_id, 'mahasiswa', 'nama') }}</h5>
                                        </div>
            
            
                                        <div class="col-md-2">
                                            <h5>Program Studi</h5>
                                        </div>
                                        <div class="col-md-10">
                                            <h5>: {{ Get_field::get_data(Get_field::get_data(Auth::user()->mahasiswa_id, 'mahasiswa', 'prodi'), 'prodi', 'name') }}</h5>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                            <!-- /.col -->
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>


@endsection
