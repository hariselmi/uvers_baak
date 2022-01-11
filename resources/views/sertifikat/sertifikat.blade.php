<div class="" id="sertifikatDetails">
    <!-- Content Header (Page header) -->

    <section class="content-header m-3">
        <h4>{{ __('Sertifikat Kompetensi') }}
            @if (auth()->user()->checkSpPermission('sertifikat.create') && Auth::user()->role == 'mahasiswa')
            <a class="btn btn-small btn-success pull-right" href="#addSertifikatModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/sertifikat'), 'filter_id'=>'sertifikatFilter'])
                    </div>
                    <div class="box-body">
                        @include('sertifikat.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addSertifikatModal">
            <div class="modal-dialog modal-lg">
                @include('sertifikat.formadd', ['sertifikat'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editSertifikatModal">
            <div class="modal-dialog modal-lg">
                @include('sertifikat.formedit', ['sertifikat'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showSertifikatModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showSertifikat"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
