<div class="" id="lombaDetails">
    <!-- Content Header (Page header) -->

    @if (auth()->user()->checkSpPermission('lomba.create'))
    <section class="content-header m-3">
        <h1>{{ __('Kegiatan Lomba/Kompetisi') }}
            <a class="btn btn-small btn-success pull-right" href="#addLombaModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/lomba'), 'filter_id'=>'lombaFilter'])
                    </div>
                    <div class="box-body">
                        @include('lomba.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addLombaModal">
            <div class="modal-dialog modal-lg">
                @include('lomba.formadd', ['lomba'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editLombaModal">
            <div class="modal-dialog modal-lg">
                @include('lomba.formedit', ['lomba'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showLombaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showLomba"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
