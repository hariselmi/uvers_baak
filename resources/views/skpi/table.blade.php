<div class="" id="skpiTable">
    <table class="table table-bordered table-striped" id="tableSkpi">
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
                    <td>{{  Get_field::format_indo($value->tgl_mulai) }}</td>
                    <td>{{  Get_field::format_indo($value->tgl_selesai) }}</td>
                    <td>
                        @switch($value->status)
                            @case(1)
                                <span>{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</span>
                            {{-- <a href="#" class="btn btn-primary btn-sm disabled" role="button" aria-disabled="true" style="background-color:#dd4b39">{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</a> --}}
                                @break
                            @case(2)
                                <span style="color:#00a65a">{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</span>
                            {{-- <a href="#" class="btn btn-primary btn-sm disabled" role="button" aria-disabled="true" style="background-color:#00a65a">{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</a> --}}
                                @break
                            @case(3)
                                <span style="color:#dd4b39">{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</span>
                            {{-- <a href="#" class="btn btn-primary btn-sm disabled" role="button" aria-disabled="true" style="background-color:#dd4b39">{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</a> --}}
                                @break
                            @default
                                
                        @endswitch
                    </td>
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

<script>
    $('#tableSkpi').DataTable({
        searching: false, 
        paging: false, 
        info: false,
    });
    
    $('#validasiSkpiModal').modal('hide');
    $('#editSkpiModal').modal('hide');
</script>