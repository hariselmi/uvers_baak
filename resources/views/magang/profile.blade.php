<div class="modal-content" id="showMagang">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Detail Magang, Pengalaman Organisasi, Kepanitiaan, Kegiatan Sosial/Volunter') }}</h1>
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
                                <b>Nama Kegiatan </b> <a class="pull-right">{{ $magang->nama_kegiatan ? $magang->nama_kegiatan : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right">{{ $magang->peran ? $magang->peran : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right">{{ $magang->penyelenggara ? $magang->penyelenggara : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right">{{ $magang->tgl_mulai ? $magang->tgl_mulai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right">{{ $magang->tgl_selesai ? $magang->tgl_selesai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>magang/Piala/Medali</b> <a target="_blank" class="pull-right" href="{{ $magang->sertifikat ? asset('/document/certificate').'/'.$magang->sertifikat : 'javascript:void(0)' }}">{{ $magang->sertifikat ? $magang->sertifikat : '-' }}</a>
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