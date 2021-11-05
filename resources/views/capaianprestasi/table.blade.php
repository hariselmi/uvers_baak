<div class="" id="capaianprestasiTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Jenis Kepesertaan</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($capaianPrestasiData as $index=>$value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#editCapaianPrestasi', 'url' => '#editCapaianPrestasiModal', 'ajax-url' => url('capaianprestasi/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'capaianprestasi/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$capaianPrestasiData, 'index_route'=>route('capaianprestasi.index')])
</div>
