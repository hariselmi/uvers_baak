<div class="" id="pendaftaranDetails">
    <!-- Content Header (Page header) -->

    <section class="content-header m-3">
        <h1>{{ __('Pendaftaran Beasiswa') }}
            @if (Auth::user()->role == 'admin')
            <a class="btn btn-small btn-success pull-right" href="#addPendaftaranBeasiswaModal" data-toggle='modal'>
                <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah') }}</a>
                @endif
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        @include('partials.filters', ['filter_route'=>url('/pendaftaran'), 'filter_id'=>'pendaftaranFilter'])
                    </div>
                    <div class="box-body">
                        @include('pendaftaran.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                @include('pendaftaran.formadd', ['pendaftaran'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                @include('pendaftaran.formedit', ['pendaftaran'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="daftarPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                @include('pendaftaran.daftar', ['pendaftaran'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showPendaftaranBeasiswa"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
