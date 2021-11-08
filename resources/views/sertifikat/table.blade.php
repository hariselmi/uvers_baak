<div class="" id="sertifikatTable">
    <table class="table table-bordered table-striped" id='tableSertifikat'>
        <thead>
            <tr>
                <th>{{ __('NIM') }}</th>
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Nama Kegiatan') }}</th>
                <th>{{ __('Peran') }}</th>
                <th>{{ __('Penyelenggara') }}</th>
                <th>{{ __('Tanggal Mulai') }}</th>
                <th>{{ __('Tanggal Akhir') }}</th>
                <th>{{ __('Status Pengajuan') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSertifikat as $value)
                <tr>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim') }}</td>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama') }}</td>
                    <td>{{ $value->nama_kegiatan }}</td>
                    <td>{{ $value->peran }}</td>
                    <td>{{ $value->penyelenggara }}</td>
                    <td>{{ $value->tgl_mulai }}</td>
                    <td>{{ $value->tgl_selesai }}</td>
                    <td>{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</td>
                    <td class="item_btn_group">
                        @if (Auth::user()->role == 'mahasiswa')
                            @php
                                $actions = [
                                    ['data-replace' => '#showSertifikat', 'url' => '#showSertifikatModal', 'ajax-url' => url('sertifikat/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['url' => 'sertifikat/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @else
                            @php
                                $actions = [
                                    ['data-replace' => '#showSertifikat', 'url' => '#showSertifikatModal', 'ajax-url' => url('sertifikat/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['data-replace' => '#editSertifikat', 'url' => '#editSertifikatModal', 'ajax-url' => url('sertifikat/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                    ['url' => 'sertifikat/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @endif
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataSertifikat, 'index_route'=>route('sertifikat.index')])
</div>

@section('script')
<script>
     $('#tableSertifikat').DataTable({
         searching: false, 
         paging: false, 
         info: false,
        });

 
</script>
@endsection
