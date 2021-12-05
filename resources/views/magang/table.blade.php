<div class="" id="magangTable">
    <table class="table table-bordered table-striped" id='tableMagang'>
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
            @foreach ($dataMagang as $value)
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
                            @if ($value->status != 1)
                                @php
                                    $actions = [
                                        ['data-replace' => '#showMagang', 'url' => '#showMagangModal', 'ajax-url' => url('magang/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ];
                                @endphp
                            @else
                                @php
                                    $actions = [
                                        ['data-replace' => '#showMagang', 'url' => '#showMagangModal', 'ajax-url' => url('magang/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                        ['url' => 'magang/' . $value->id, 'name' => 'delete']
                                    ];
                                @endphp
                            @endif
                        @else
                            @php
                                $actions = [
                                    ['data-replace' => '#showMagang', 'url' => '#showMagangModal', 'ajax-url' => url('magang/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['data-replace' => '#editMagang', 'url' => '#editMagangModal', 'ajax-url' => url('magang/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                    ['url' => 'magang/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @endif
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataMagang, 'index_route'=>route('magang.index')])
</div>

<script>
    $('#tableMagang').DataTable({
        searching: false, 
        paging: false, 
        info: false,
    });
    
    $('#addMagangModal').modal('hide');
    $('#editMagangModal').modal('hide');
</script>