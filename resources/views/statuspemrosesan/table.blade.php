<div class="" id="statusPemrosesanTable">
    <table class="table table-bordered table-striped" id="tablePemrosesan">
        <thead>
            <tr>
                <th>{{ __('Beasiswa') }}</th>
                <th>{{ __('Nama') }}</th>
                <th>{{ __('NIM') }}</th>
                <th>{{ __('Prodi') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Keterangan') }}</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataStatusPemrosesan as $value)
                <tr>
                    <td>{{ Get_field::get_data($value->beasiswa_id, 'beasiswa', 'nama_paket') }}</td>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama') }}</td>
                    <td>{{ Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim') }}</td>
                    <td>{{ Get_field::get_data($value->prodi, 'prodi', 'name') }}</td>
                    <td>{{ Get_field::get_data($value->status, 'status_pemrosesan', 'name') }}</td>
                    <td>{{ $value->catatan ? $value->catatan : '-' }}</td>
                    <td class="item_btn_group">
                        @php
                        if (Auth::user()->role == 'admin') {
                            # code...
                            $actions = [
                                ['data-replace' => '#showStatusPemrosesan', 'url' => '#showStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editStatusPemrosesan', 'url' => '#editStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/edit'), 'name' => ' Validasi', 'icon' => 'pencil'],
                                // ['url' => 'statuspemrosesan/' . $value->id, 'name' => 'delete']
                            ];
                        }else{
                            if ($value->status == 1){
                                $actions = [
                                    ['data-replace' => '#showStatusPemrosesan', 'url' => '#showStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'],
                                    ['url' => 'statuspemrosesan/' . $value->id, 'name' => 'delete']
                                ];
                            }else{
                                $actions = [
                                    ['data-replace' => '#showStatusPemrosesan', 'url' => '#showStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'],
                                ];
                            }


                        }
                        @endphp
                        @include('partials.actions', ['actions'=>$actions])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include('partials.pagination', ['items'=>$dataStatusPemrosesan, 'index_route'=>route('statuspemrosesan.index')])
</div>

@section('script')
<script>
     $('#tablePemrosesan').DataTable({
         searching: false, 
         paging: false, 
         info: false,
        });
 
</script>
@endsection

<script>
    $('#addStatusPemrosesanModal').modal('hide');
    $('#editStatusPemrosesanModal').modal('hide');
</script>