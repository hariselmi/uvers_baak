<div class="" id="prodiDetails">
    <!-- Content Header (Page header) -->
    @if (auth()->user()->checkSpPermission('prodi.create'))
    <section class="content-header m-3">
        <h1>{{ __('Prodi') }}
            <a class="btn btn-small btn-success pull-right" href="#addProdiModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/prodi'), 'filter_id'=>'prodiFilter'])
                    </div>
                    <div class="box-body">
                        @include('prodi.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addProdiModal">
            <div class="modal-dialog modal-lg">
                @include('prodi.formadd', ['prodi'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editProdiModal">
            <div class="modal-dialog modal-lg">
                <div id="editProdi"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showProdiModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showProdi"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
