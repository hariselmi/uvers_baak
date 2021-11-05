<div class="" id="agamaTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Agama</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agamaData as $index=>$value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#editAgama', 'url' => '#editAgamaModal', 'ajax-url' => url('agama/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'agama/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$agamaData, 'index_route'=>route('agama.index')])
</div>
