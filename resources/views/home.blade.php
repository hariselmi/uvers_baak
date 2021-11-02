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
                    <h1>{{ __('Dashboard Sistem Layanan Kemahasiswaan') }}</h1>
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>


@endsection
