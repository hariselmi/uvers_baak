<div class="" id="lombaTable">
    <table class="table table-bordered table-striped" id='tableLomba'>
        <thead>
            <tr>
                <th>{{ __('NIM') }}</th>
                <th>{{ __('Nama') }}</th>
                <th>{{ __('Nama Kegiatan') }}</th>
                <th>{{ __('Peran') }}</th>
                <th>{{ __('Penyelenggara') }}</th>
                <th>{{ __('Tanggal Mulai') }}</th>
                <th>{{ __('Tanggal Akhir') }}</th>
                <th>{{ __('Status Pengajuan') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataLomba as $value)
                <tr>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim') }}</td>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama') }}</td>
                    <td>{{ $value->nama_kegiatan }}</td>
                    <td>{{ $value->peran }}</td>
                    <td>{{ $value->penyelenggara }}</td>
                    <td>{{ $value->tgl_mulai }}</td>
                    <td>{{ $value->tgl_selesai }}</td>
                    <td>{{ Get_field::get_data($value->status, 'status_aktivitas', 'name') }}</td>
                    <td class="item_btn_group">
                        @if (Auth::user()->role == 'mahasiswa')
                            @php
                                $actions = [
                                    ['data-replace' => '#showLomba', 'url' => '#showLombaModal', 'ajax-url' => url('lomba/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['url' => 'lomba/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @else
                            @php
                                $actions = [
                                    ['data-replace' => '#showLomba', 'url' => '#showLombaModal', 'ajax-url' => url('lomba/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                    ['data-replace' => '#editLomba', 'url' => '#editLombaModal', 'ajax-url' => url('lomba/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                    ['url' => 'lomba/' . $value->id, 'name' => 'delete']
                                ];
                            @endphp
                        @endif
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataLomba, 'index_route'=>route('lomba.index')])
</div>

@section('script')
<script>
     $('#tableLomba').DataTable({
         searching: false, 
         paging: false, 
         info: false,
        });
 
</script>
@endsection

<script>
    $('#addLombaModal').modal('hide');
    $('#editLombaModal').modal('hide');
</script>