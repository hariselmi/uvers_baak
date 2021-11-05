<div class="" id="jeniskepesertaanDetails">
    <!-- Content Header (Page header) -->
    @if (auth()->user()->checkSpPermission('jeniskepesertaan.create'))
    <section class="content-header m-3">
        <h1>{{ __('Jenis Kepesertaan') }}
            <a class="btn btn-small btn-success pull-right" href="#addJenisKepesertaanModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/jeniskepesertaan'), 'filter_id'=>'jeniskepesertaanFilter'])
                    </div>
                    <div class="box-body">
                        @include('jeniskepesertaan.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addJenisKepesertaanModal">
            <div class="modal-dialog modal-lg">
                @include('jeniskepesertaan.formadd', ['jeniskepesertaan'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editJenisKepesertaanModal">
            <div class="modal-dialog modal-lg">
                <div id="editJenisKepesertaan"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showJenisKepesertaanModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showJenisKepesertaan"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
