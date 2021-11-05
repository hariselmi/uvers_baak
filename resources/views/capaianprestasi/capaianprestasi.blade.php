<div class="" id="capaianprestasiDetails">
    <!-- Content Header (Page header) -->
    @if (auth()->user()->checkSpPermission('capaianprestasi.create'))
    <section class="content-header m-3">
        <h1>{{ __('Capaian Prestasi') }}
            <a class="btn btn-small btn-success pull-right" href="#addCapaianPrestasiModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/capaianprestasi'), 'filter_id'=>'capaianprestasiFilter'])
                    </div>
                    <div class="box-body">
                        @include('capaianprestasi.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addCapaianPrestasiModal">
            <div class="modal-dialog modal-lg">
                @include('capaianprestasi.formadd', ['capaianprestasi'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editCapaianPrestasiModal">
            <div class="modal-dialog modal-lg">
                <div id="editCapaianPrestasi"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showCapaianPrestasiModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showCapaianPrestasi"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
