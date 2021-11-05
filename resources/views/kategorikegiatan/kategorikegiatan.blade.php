<div class="" id="kategorikegiatanDetails">
    <!-- Content Header (Page header) -->
    @if (auth()->user()->checkSpPermission('kategorikegiatan.create'))
    <section class="content-header m-3">
        <h1>{{ __('Kategori Kegiatan') }}
            <a class="btn btn-small btn-success pull-right" href="#addKategoriKegiatanModal" data-toggle='modal'>
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
                        @include('partials.filters', ['filter_route'=>url('/kategorikegiatan'), 'filter_id'=>'kategorikegiatanFilter'])
                    </div>
                    <div class="box-body">
                        @include('kategorikegiatan.table')
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addKategoriKegiatanModal">
            <div class="modal-dialog modal-lg">
                @include('kategorikegiatan.formadd', ['kategorikegiatan'=>''])
            </div>
        </div>
        <div class="modal fade sub-modal" id="editKategoriKegiatanModal">
            <div class="modal-dialog modal-lg">
                <div id="editKategoriKegiatan"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showKategoriKegiatanModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showKategoriKegiatan"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
