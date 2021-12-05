<div class="" id="nonLombaTable">
    <table class="table table-bordered table-striped" id="tableNonLomba">
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
            @foreach ($dataNonLomba as $value)
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
                                        ['data-replace' => '#showNonLomba', 'url' => '#showNonLombaModal', 'ajax-url' => url('nonlomba/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ];
                                @endphp
                            @else
                                @php
                                    $actions = [
                                        ['data-replace' => '#showNonLomba', 'url' => '#showNonLombaModal', 'ajax-url' => url('nonlomba/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                        ['url' => 'nonlomba/' . $value->id, 'name' => 'delete']
                                    ];
                                @endphp
                            @endif
                        @else
                            @php
                                $actions = [
                                    ['data-replace' => '#showNonLomba', 'url' => '#showNonLombaModal', 'ajax-url' => url('nonlomba/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['data-replace' => '#editNonLomba', 'url' => '#editNonLombaModal', 'ajax-url' => url('nonlomba/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                    ['url' => 'nonlomba/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @endif
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataNonLomba, 'index_route'=>route('nonlomba.index')])
</div>

<script>
    $('#tableNonLomba').DataTable({
        searching: false, 
        paging: false, 
        info: false,
       });

    $('#addNonLombaModal').modal('hide');
    $('#editNonLombaModal').modal('hide');
</script>