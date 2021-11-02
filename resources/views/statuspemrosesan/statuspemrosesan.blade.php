<div class="" id="statusPemroseanDetails">
    <!-- Content Header (Page header) -->

    @if (auth()->user()->checkSpPermission('statuspemrosesan.create'))
    <section class="content-header m-3">
        <h1>{{ __('Status Pemrosesan') }}
            {{-- <a class="btn btn-small btn-success pull-right" href="{{route('skpi.excel')}}" data-toggle='modal' target="_blank">{{ __('Excel') }}</a> --}}

            {{-- <a class="btn btn-small btn-success pull-right" href="#addStatusPemrosesanModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/statuspemrosesan'), 'filter_id'=>'statusFilter'])
                    </div>
                    <div class="box-body">
                        @include('statuspemrosesan.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addStatusPemrosesanModal">
            <div class="modal-dialog modal-lg">
                @include('statuspemrosesan.formadd', ['statuspemrosesan'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editStatusPemrosesanModal">
            <div class="modal-dialog modal-lg">
                @include('statuspemrosesan.formedit', ['statuspemrosesan'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showStatusPemrosesanModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showStatusPemrosesan"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
