<div class="" id="magangDetails">
    <!-- Content Header (Page header) -->

    <section class="content-header m-3">
        <h4>{{ __('Magang, Pengalaman Organisasi, Kepanitiaan, Kegiatan Sosial/Volunter') }}
            @if (auth()->user()->checkSpPermission('magang.create') && Auth::user()->role == 'mahasiswa')
            <a class="btn btn-small btn-success pull-right" href="#addMagangModal" data-toggle='modal'>
                <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah') }}</a>
                @endif
        </h4>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        @include('partials.filters', ['filter_route'=>url('/magang'), 'filter_id'=>'magangFilter'])
                    </div>
                    <div class="box-body">
                        @include('magang.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addMagangModal">
            <div class="modal-dialog modal-lg">
                @include('magang.formadd', ['magang'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editMagangModal">
            <div class="modal-dialog modal-lg">
                @include('magang.formedit', ['magang'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showMagangModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showMagang"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
