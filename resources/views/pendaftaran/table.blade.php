<div class="" id="pendaftaranTable">
    <table class="table table-bordered table-striped" id='tablePendaftaran'>
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Nama Paket') }}</th>
                <th>{{ __('Deskrpsi') }}</th>
                <th>{{ __('Status Pendaftaran') }}</th>
                <th>{{ __('Periode Pendaftaran') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPendaftaranBeasiswa as $key=>$value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->nama_paket }}</td>
                    <td>{{ $value->deskripsi }}</td>
                    <td>{{ Get_field::get_data($value->status_pendaftaran, 'status_pendaftaran', 'name') }}</td>
                    <td>{{ $value->tgl_mulai_periode }} s.d {{ $value->tgl_sampai_periode }}</td>
                    <td class="item_btn_group">
                        @php

                        $userRole   = Auth::user()->role;

                        if ($userRole != 'admin') {
                            # code...
                            $actions = [
                                ['data-replace' => '#daftarPendaftaranBeasiswa', 'url' => '#daftarPendaftaranBeasiswaModal', 'ajax-url' => url('pendaftaran/' . $value->id . '/daftar'), 'name' => ' Daftar', 'icon' => 'clipboard'], 
                            ];
                        } else {
                            # code...
                            $actions = [
                                ['data-replace' => '#editPendaftaranBeasiswa', 'url' => '#editPendaftaranBeasiswaModal', 'ajax-url' => url('pendaftaran/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'pendaftaran/' . $value->id, 'name' => 'delete']
                            ];
                        }
        
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataPendaftaranBeasiswa, 'index_route'=>route('pendaftaran.index')])
</div>


@section('script')
<script>
     $('#tablePendaftaran').DataTable({
         searching: false, 
         paging: false, 
         info: false,
        });
 
</script>
@endsection

<script>
    $('#addPendaftaranBeasiswaModal').modal('hide');
    $('#editPendaftaranBeasiswaModal').modal('hide');
    $('#daftarPendaftaranBeasiswaModal').modal('hide');
</script>