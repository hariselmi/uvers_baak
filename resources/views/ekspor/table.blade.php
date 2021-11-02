<div class="" id="eksporTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('Nama Kegiatan') }}</th>
                <th>{{ __('Kategori Kegiatan') }}</th>
                <th>{{ __('Peran') }}</th>
                <th>{{ __('Jenis Kepesertaan') }}</th>
                <th>{{ __('Capaian Prestasi') }}</th>
                <th>{{ __('Keterangan') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekspors as $value)
                <tr>
                    <td>{{ Get_field::get_data($value->auditor_id, 'users', 'name') }}</td>
                    <td>{{ Get_field::get_data($value->users_id, 'users', 'name') }}</td>
                    <td>{{ $value->email }}</td>
                    <td class="hidden-xs">{{ $value->telp }}</td>
                    <td class="hidden-xs">{{ $value->telp }}</td>
                    <td class="item_btn_group">
                        @php
                            $actions = [
                                ['data-replace' => '#showEkspor', 'url' => '#showEksporModal', 'ajax-url' => url('ekspor/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editEkspor', 'url' => '#editEksporModal', 'ajax-url' => url('ekspor/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'ekspor/' . $value->id, 'name' => 'delete']
                            ];
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$ekspors, 'index_route'=>route('ekspor.index')])
</div>
