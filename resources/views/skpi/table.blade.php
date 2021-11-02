<div class="" id="skpiTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('NIM') }}</th>
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Jenis Pelaporan') }}</th>
                <th>{{ __('Golongan SKPI') }}</th>
                <th>{{ __('Nama Kegiatan') }}</th>
                <th>{{ __('Peran') }}</th>
                <th>{{ __('Penyelenggara') }}</th>
                <th>{{ __('Tanggal Mulai') }}</th>
                <th>{{ __('Tanggal Akhir') }}</th>
                <th>{{ __('Status') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataSkpi as $value)
                <tr>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim') }}</td>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama') }}</td>
                    <td>{{ Get_field::get_data($value->jenis_aktivitas, 'kategori_pelaporan', 'name') }}</td>
                    <td>{{ Get_field::get_data($value->golongan_skpi_id, 'golongan_skpi', 'name') }}</td>
                    <td>{{ $value->nama_kegiatan }}</td>
                    <td>{{ $value->peran }}</td>
                    <td>{{ $value->penyelenggara }}</td>
                    <td>{{ $value->tgl_mulai }}</td>
                    <td>{{ $value->tgl_selesai }}</td>
                    <td>{{ Get_field::get_data($value->status, 'status', 'name') }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#showSkpi', 'url' => '#showSkpiModal', 'ajax-url' => url('skpi/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editSkpi', 'url' => '#editSkpiModal', 'ajax-url' => url('skpi/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                // ['url' => 'skpi/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataSkpi, 'index_route'=>route('skpi.index')])
</div>
