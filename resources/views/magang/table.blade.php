<div class="" id="magangTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('Nama Kegiatan') }}</th>
                <th>{{ __('Peran') }}</th>
                <th>{{ __('Penyelenggara') }}</th>
                <th>{{ __('Tanggal Mulai') }}</th>
                <th>{{ __('Tanggal Akhir') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataMagang as $value)
                <tr>
                    <td>{{ $value->nama_kegiatan }}</td>
                    <td>{{ $value->peran }}</td>
                    <td>{{ $value->penyelenggara }}</td>
                    <td>{{ $value->tgl_mulai }}</td>
                    <td>{{ $value->tgl_selesai }}</td>
                    <td class="item_btn_group">
                        @if (Auth::user()->role == 'mahasiswa')
                            @php
                                $actions = [
                                    ['data-replace' => '#showMagang', 'url' => '#showMagangModal', 'ajax-url' => url('magang/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['url' => 'magang/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
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
