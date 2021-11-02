<div class="modal-content" id="showMahasiswa">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Profil Anggota') }}</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        @include('partials.flash')
        <div class="row">
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        {{-- <img class="profile-user-img img-responsive img-circle" src="{{$avatar}}" alt="User profile picture"> --}}
                        <h3 class="profile-username text-center">{{ $mahasiswa->nama }}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item hidden-print">
                                <b>NPM</b> <a class="pull-right">{{ $mahasiswa->nim }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tempat Lahir</b> <a class="pull-right">{{ $mahasiswa->tempat_lahir }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Lahir</b> <a class="pull-right">{{ $mahasiswa->tgl_lahir }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Telp</b> <a class="pull-right">{{ $mahasiswa->telp }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Agama</b> <a class="pull-right">{{ Get_field::get_data($mahasiswa->agama, 'agama', 'name') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jenis Kelamin</b> <a class="pull-right">{{ Get_field::get_data($mahasiswa->jenis_kelamin, 'jenis_kelamin', 'name') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Alamat</b> <a class="pull-right">{{ $mahasiswa->nim }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Prodi</b> <a class="pull-right">{{ Get_field::get_data($mahasiswa->prodi, 'prodi', 'name') }}</a>
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