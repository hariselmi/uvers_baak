<div class="" id="pelatihanTable">
    <table class="table table-bordered table-striped" id='tablePelatihan'>
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
            @foreach ($dataPelatihan as $value)
                <tr>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim') }}</td>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama') }}</td>
                    <td>{{ $value->nama_kegiatan }}</td>
                    <td>{{ $value->peran }}</td>
                    <td>{{ $value->penyelenggara }}</td>
                    <td>{{  Get_field::format_indo($value->tgl_mulai) }}</td>
                    <td>{{  Get_field::format_indo($value->tgl_selesai) }}</td>
                    <td>{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</td>
                    <td class="item_btn_group">
                        @if (Auth::user()->role == 'mahasiswa')
                            @if ($value->status != 1)
                                @php
                                    $actions = [
                                        ['data-replace' => '#showPelatihan', 'url' => '#showPelatihanModal', 'ajax-url' => url('pelatihan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ];
                                @endphp
                            @else
                                @php
                                    $actions = [
                                        ['data-replace' => '#showPelatihan', 'url' => '#showPelatihanModal', 'ajax-url' => url('pelatihan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                        ['url' => 'pelatihan/' . $value->id, 'name' => 'delete']
                                    ];
                                @endphp
                            @endif
                        @else
                            @php
                                $actions = [
                                    ['data-replace' => '#showPelatihan', 'url' => '#showPelatihanModal', 'ajax-url' => url('pelatihan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['data-replace' => '#editPelatihan', 'url' => '#editPelatihanModal', 'ajax-url' => url('pelatihan/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                    ['url' => 'pelatihan/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @endif
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataPelatihan, 'index_route'=>route('pelatihan.index')])
</div>

<script>
    $('#tablePelatihan').DataTable({
        searching: false, 
        paging: false, 
        info: false,
    });

    $('#addPelatihanModal').modal('hide');
    $('#editPelatihanModal').modal('hide');
</script>