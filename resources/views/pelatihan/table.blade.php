<div class="" id="pelatihanTable">
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
            @foreach ($dataPelatihan as $value)
                <tr>
                    <td>{{ $value->nama_kegiatan }}</td>
                    <td>{{ $value->peran }}</td>
                    <td>{{ $value->penyelenggara }}</td>
                    <td>{{ $value->tgl_mulai }}</td>
                    <td>{{ $value->tgl_selesai }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#showPelatihan', 'url' => '#showPelatihanModal', 'ajax-url' => url('pelatihan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editPelatihan', 'url' => '#editPelatihanModal', 'ajax-url' => url('pelatihan/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'pelatihan/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataPelatihan, 'index_route'=>route('pelatihan.index')])
</div>
