<div class="modal-content" id="showPendaftaran">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Detail Pendaftaran') }}</h1>
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
                        <h3 class="profile-username text-center">{{ $pendaftaranbeasiswa->name }}</h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>No. Telp </b> <a class="pull-right">{{ $pendaftaranbeasiswa->telp }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Email</b> <a class="pull-right">{{ $pendaftaranbeasiswa->email }}</a>
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