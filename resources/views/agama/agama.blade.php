<div class="" id="agamaDetails">
    <!-- Content Header (Page header) -->
    @if (auth()->user()->checkSpPermission('agama.create'))
    <section class="content-header m-3">
        <h1>{{ __('Agama') }}
            <a class="btn btn-small btn-success pull-right" href="#addAgamaModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/agama'), 'filter_id'=>'agamaFilter'])
                    </div>
                    <div class="box-body">
                        @include('agama.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addAgamaModal">
            <div class="modal-dialog modal-lg">
                @include('agama.formadd', ['agama'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editAgamaModal">
            <div class="modal-dialog modal-lg">
                <div id="editAgama"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showAgamaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showAgama"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
