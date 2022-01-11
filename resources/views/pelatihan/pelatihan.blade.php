<div class="" id="pelatihanDetails">
    <!-- Content Header (Page header) -->

    <section class="content-header m-3">
        <h4>{{ __('Keikutsertaan Pelatihan/ Seminar/ Workshop') }}
            @if (auth()->user()->checkSpPermission('pelatihan.create')  && Auth::user()->role == 'mahasiswa')
            <a class="btn btn-small btn-success pull-right" href="#addPelatihanModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/pelatihan'), 'filter_id'=>'pelatihanFilter'])
                    </div>
                    <div class="box-body">
                        @include('pelatihan.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addPelatihanModal">
            <div class="modal-dialog modal-lg">
                @include('pelatihan.formadd', ['pelatihan'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editPelatihanModal">
            <div class="modal-dialog modal-lg">
                @include('pelatihan.formedit', ['pelatihan'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showPelatihanModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showPelatihan"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
