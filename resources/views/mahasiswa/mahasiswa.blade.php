<div class="" id="mahasiswaDetails">
    <!-- Content Header (Page header) -->

    @if (auth()->user()->checkSpPermission('mahasiswa.create'))
    <section class="content-header m-3">
        <h1>{{ __('Data Mahasiswa') }}
            <a class="btn btn-small btn-success pull-right" href="#addMahasiswaModal" data-toggle='modal'>
                <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah') }}</a>
        </h1>
    </section>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        @include('partials.filters', ['filter_route'=>url('/mahasiswa'), 'filter_id'=>'mahasiswaFilter'])
                    </div>
                    <div class="box-body">
                        @include('mahasiswa.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addMahasiswaModal">
            <div class="modal-dialog modal-lg">
                @include('mahasiswa.formadd', ['mahasiswa'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editMahasiswaModal">
            <div class="modal-dialog modal-lg">
                @include('mahasiswa.formedit', ['mahasiswa'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showMahasiswaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showMahasiswa"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
