<div class="" id="kategorikegiatanTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Kategori Kegiatan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoriKegiatanData as $index=>$value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#editKategoriKegiatan', 'url' => '#editKategoriKegiatanModal', 'ajax-url' => url('kategorikegiatan/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'kategorikegiatan/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$kategoriKegiatanData, 'index_route'=>route('kategorikegiatan.index')])
</div>
