<div class="modal-content" id="showStatusPemrosesan">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            {{ __('Status Pemrosesan') }}</h1>
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
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Beasiswa </b> <a class="pull-right">{{ Get_field::get_data($statusPemrosesan->beasiswa_id, 'beasiswa', 'nama_paket') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Nama </b> <a class="pull-right">{{ Get_field::get_data($statusPemrosesan->mahasiswa_id, 'mahasiswa', 'nama') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>NIM </b> <a class="pull-right">{{ Get_field::get_data($statusPemrosesan->mahasiswa_id, 'mahasiswa', 'nim') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Prodi </b> <a class="pull-right">{{ Get_field::get_data(Get_field::get_data($statusPemrosesan->mahasiswa_id, 'mahasiswa', 'prodi'), 'prodi', 'name') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Status Pemrosesan </b> <a class="pull-right">{{ Get_field::get_data($statusPemrosesan->status, 'status_pemrosesan', 'name') }}</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Keterangan </b> <a class="pull-right">{{ $statusPemrosesan->catatan ? $statusPemrosesan->catatan : '-' }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>


    <div class="row">

        <div style="width: 90%; margin:auto">
            <div class="tableFixHead">
                 <!--  Bootstrap table-->
                 <div class="table-responsive">
                    <table id="tableSyarat" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5px">#</th>
                                <th scope="col">Syarat</th>
                                <th scope="col" style="width:30%">File diupload</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($syarat as $key=>$data)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>
                                        {{$data->syarat}}
                                    </td>
                                    <td>
                                        @foreach ($file_syarat as $file)
                                            @if ($data->id == $file->syarat_id)
                                                <a target="_blank" class="pull-right" href="{{ $file->file_syarat ? $file->file_syarat : 'javascript:void(0)' }}">{{ $file->file_syarat ? $file->file_syarat : '' }}</a>
                                            @else
                                                <a target="_blank" class="pull-right" href="javascript:void(0)"></a>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Add rows button-->
                
            </div>

        </div>
    </div>
        <!-- /.row -->
    </section>
</div>