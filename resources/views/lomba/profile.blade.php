<div class="modal-content" id="showLomba">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Detail Kegiatan Lomba/Kompetisi') }}</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('partials.flash')
        <div class="row">
            <div class="col-md-12">
                <!-- Detaile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        {{-- <img class="profile-user-img img-responsive img-circle" src="{{$avatar}}" alt="User profile picture"> --}}
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama Kegiatan </b> <a class="pull-right">{{ $lomba->nama_kegiatan ? $lomba->nama_kegiatan : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right">{{ $lomba->peran ? $lomba->peran : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right">{{ $lomba->penyelenggara ? $lomba->penyelenggara : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right">{{ $lomba->tgl_mulai ? $lomba->tgl_mulai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right">{{ $lomba->tgl_selesai ? $lomba->tgl_selesai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Kategori Kegiatan</b> <a class="pull-right">{{ $lomba->kategori ? Get_field::get_data($lomba->kategori, 'kategori_kegiatan', 'name') : '-'}}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jenis Kepesertaan</b> <a class="pull-right">{{ $lomba->jenis ? Get_field::get_data($lomba->jenis, 'jenis_kepesertaan', 'name') : '-'}}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jumlah Peserta</b> <a class="pull-right">{{ $lomba->jml_peserta ? $lomba->jml_peserta : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Capaian Prestasi</b> <a class="pull-right">{{ $lomba->capaian ? Get_field::get_data($lomba->capaian, 'capaian_prestasi', 'name') : '-'}}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Sertifikat/Piala/Medali</b> <a target="_blank" class="pull-right" href="{{ $lomba->sertifikat ? asset('/document/certificate').'/'.$lomba->sertifikat : 'javascript:void(0)' }}">{{ $lomba->sertifikat ? $lomba->sertifikat : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>URL Laman Penyelenggara</b> <a class="pull-right">{{ $lomba->laman_penyelenggara ? $lomba->laman_penyelenggara : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Foto Upacara Penyerahan Penghargaan</b> <a target="_blank" class="pull-right" href="{{ $lomba->foto_penghargaan ? asset('/document/award').'/'.$lomba->foto_penghargaan : 'javascript:void(0)' }}">{{ $lomba->foto_penghargaan ? $lomba->foto_penghargaan : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Surat Kegiatan Lomba</b> <a class="pull-right"<a target="_blank" class="pull-right" href="{{ $lomba->surat_lomba ? asset('/document/letter').'/'.$lomba->surat_lomba : 'javascript:void(0)' }}">{{ $lomba->surat_lomba ? $lomba->surat_lomba : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Keterangan</b> <a class="pull-right">{{ $lomba->keterangan ? $lomba->keterangan : '-' }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>