<div class="" id="eksporDetails">
    <!-- Content Header (Page header) -->

    @if (auth()->user()->checkSpPermission('ekspor.create'))
    <section class="content-header m-3">
        <h1>{{ __('Ekspor Data Beasiswa') }}
            {{-- <a class="btn btn-small btn-success pull-right" href="#addEksporModal" data-toggle='modal'>
                <i class="fa fa-plus"></i>&nbsp; {{ __('Tambah') }}</a> --}}
        </h1>
    </section>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        @include('partials.filters', ['filter_route'=>url('/ekspor'), 'filter_id'=>'eksporFilter'])
                    </div>
                    <div class="box-body">
                        @include('ekspor.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addEksporModal">
            <div class="modal-dialog modal-lg">
                @include('ekspor.formadd', ['ekspor'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editEksporModal">
            <div class="modal-dialog modal-lg">
                @include('ekspor.formedit', ['ekspor'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showEksporModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showEkspor"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
