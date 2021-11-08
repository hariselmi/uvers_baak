<div class="" id="nonNonLombaDetails">
    <!-- Content Header (Page header) -->

    @if (auth()->user()->checkSpPermission('nonlomba.create') && Auth::user()->role == 'mahasiswa'))
    <section class="content-header m-3">
        <h1>{{ __('Kegiatan Non Lomba') }}
            <a class="btn btn-small btn-success pull-right" href="#addNonLombaModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/nonlomba'), 'filter_id'=>'nonlombaFilter'])
                    </div>
                    <div class="box-body">
                        @include('nonlomba.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addNonLombaModal">
            <div class="modal-dialog modal-lg">
                @include('nonlomba.formadd', ['nonlomba'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editNonLombaModal">
            <div class="modal-dialog modal-lg">
                @include('nonlomba.formedit', ['nonlomba'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showNonLombaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showNonLomba"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
