<div class="" id="skpiDetails">
    <!-- Content Header (Page header) -->

    <section class="content-header m-3">
        <h1>{{ __('SKPI') }}
            <a class="btn btn-small btn-success pull-right" href="{{route('skpi.excel')}}" data-toggle='modal' target="_blank">{{ __('Excel') }}</a>
            {{-- <a class="btn btn-small btn-success pull-right" href="{{route('skpi.excel')}}" data-toggle='modal' target="_blank">{{ __('Validasi') }}</a> --}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        @include('partials.filters', ['filter_route'=>url('/skpi'), 'filter_id'=>'skpiFilter'])
                    </div>
                    <div class="box-body">
                        @include('skpi.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addSkpiModal">
            <div class="modal-dialog modal-lg">
                @include('skpi.formadd', ['skpi'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editSkpiModal">
            <div class="modal-dialog modal-lg">
                @include('skpi.formedit', ['skpi'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="showSkpiModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showSkpi"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
