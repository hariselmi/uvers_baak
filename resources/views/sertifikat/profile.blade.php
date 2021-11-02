<div class="modal-content" id="showSertifikat">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Detail Sertifikat Kompetensi') }}</h1>
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
                                <b>Nama Kegiatan </b> <a class="pull-right">{{ $sertifikat->nama_kegiatan ? $sertifikat->nama_kegiatan : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right">{{ $sertifikat->peran ? $sertifikat->peran : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right">{{ $sertifikat->penyelenggara ? $sertifikat->penyelenggara : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right">{{ $sertifikat->tgl_mulai ? $sertifikat->tgl_mulai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right">{{ $sertifikat->tgl_selesai ? $sertifikat->tgl_selesai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Sertifikat/Piala/Medali</b> <a target="_blank" class="pull-right" href="{{ $sertifikat->sertifikat ? asset('/document/certificate').'/'.$sertifikat->sertifikat : 'javascript:void(0)' }}">{{ $sertifikat->sertifikat ? $sertifikat->sertifikat : '-' }}</a>
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