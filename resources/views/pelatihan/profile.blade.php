<div class="modal-content" id="showPelatihan">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Detail Keikutsertaan Pelatihan/ Seminar/ Workshop') }}</h1>
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
                                <b>Nama Kegiatan </b> <a class="pull-right">{{ $pelatihan->nama_kegiatan ? $pelatihan->nama_kegiatan : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right">{{ $pelatihan->peran ? $pelatihan->peran : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right">{{ $pelatihan->penyelenggara ? $pelatihan->penyelenggara : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right">{{ $pelatihan->tgl_mulai ? $pelatihan->tgl_mulai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right">{{ $pelatihan->tgl_selesai ? $pelatihan->tgl_selesai : '-' }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Sertifikat/Piala/Medali</b> <a target="_blank" class="pull-right" href="{{ $pelatihan->sertifikat ? asset('/document/certificate').'/'.$pelatihan->sertifikat : 'javascript:void(0)' }}">{{ $pelatihan->sertifikat ? $pelatihan->sertifikat : '-' }}</a>
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