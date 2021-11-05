<div class="" id="mahasiswaTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('NIM') }}</th>
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Prodi') }}</th>
                <th>{{ __('Tempat, Tanggal Lahir') }}</th>
                <th>{{ __('Alamat') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataMahasiswa as $value)
                <tr>
                    <td>{{ $value->nim }}</td>
                    <td>{{ $value->nama }}</td>
                    <td>{{ Get_field::get_data($value->prodi, 'prodi', 'name') }}</td>
                    <td>{{ $value->tempat_lahir }}, {{ $value->tgl_lahir }}</td>
                    <td>{{ $value->alamat }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#showMahasiswa', 'url' => '#showMahasiswaModal', 'ajax-url' => url('mahasiswa/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editMahasiswa', 'url' => '#editMahasiswaModal', 'ajax-url' => url('mahasiswa/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'mahasiswa/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataMahasiswa, 'index_route'=>route('mahasiswa.index')])
</div>
