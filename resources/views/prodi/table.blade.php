<div class="" id="prodiTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Prodi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodiData as $index=>$value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#editProdi', 'url' => '#editProdiModal', 'ajax-url' => url('prodi/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'prodi/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$prodiData, 'index_route'=>route('prodi.index')])
</div>
