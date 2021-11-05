<div class="" id="jeniskepesertaanTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Jenis Kepesertaan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jenisKepesertaanData as $index=>$value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#editJenisKepesertaan', 'url' => '#editJenisKepesertaanModal', 'ajax-url' => url('jeniskepesertaan/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'jeniskepesertaan/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$jenisKepesertaanData, 'index_route'=>route('jeniskepesertaan.index')])
</div>
