<div class="modal-content" id="validasiSkpi">
    {{ Form::open(['url' => 'skpi/validasi', 'files' => true]) }}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Validasi Per Nama Kegiatan') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('nama_kegiatan', 'Nama Kegiatan', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    <select class="form-control" name="nama_kegiatan" id="nama_kegiatan" onchange="getData(this.value)">
                        <option>Pilih Nama Kegiatan</option>
                        @foreach ( $namaKegiatan as $kegiatan)
                            <option value="{{$kegiatan->nama}}">{{$kegiatan->nama_kegiatan}}</option>
                        @endforeach
                    </select>
                    {{-- {!! Form::select('nama_kegiatan', $namaKegiatan, null, ['placeholder' => 'Pilih Nama Kegiatan', 'class' => 'form-control', 'onchange'=>'getData(this.value)']) !!} --}}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('penyelenggara', 'Penyelenggara', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('penyelenggara', null, ['class' => 'form-control', 'readonly']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_mulai', 'Tanggal Mulai', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_mulai', null, ['class' => 'form-control', 'readonly']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_selesai', 'Tanggal Akhir', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_selesai', null, ['class' => 'form-control', 'readonly']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('status_awal', 'Status Awal', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('status_awal', $statusAktivitas, null, ['placeholder' => 'Pilih Status Awal', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('status_akhir', 'Status Akhir', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('status_akhir', $statusAktivitas, null, ['placeholder' => 'Pilih Status Akhir', 'class' => 'form-control']) !!}
                </div>
            </div>
            <h6>*Validasi ini akan mengubah semua status sekaligus berdasarkan nama kegiatan yang dipilih</h6>
        </div>
    </div>
</div>
<div class="modal-footer">
    @if (!empty($page))
        <input type="hidden" name="page" value="{{ $page }}" />
    @endif
    {{ Form::submit(trans('simpan'), ['class' => 'btn btn-success']) }}
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
</div>
{{ Form::close() }}
</div>

<script>
    $('#nama_kegiatan, #status_awal, #status_akhir').select2({
        width:'100%'
    });

    function getData(e){
        let namaKegiatan = $( "#nama_kegiatan option:selected" ).text();

        // console.log(namaKegiatan, 'namaKegiatan');
        // console.log(e, 'e');
        // return;

        if (e) {
            let penyelenggara = namaKegiatan.split('Penyelenggara : ')[1].split(' |')[0]
            let tglMulai = namaKegiatan.split('Penyelenggara : ')[1].split(' |')[1].split('Tgl : ')[1].split(' s.d')[0]
            let tglSelesai = namaKegiatan.split('Penyelenggara : ')[1].split(' |')[1].split('s.d ')[1].split(')')[0]

            $('#penyelenggara').val(penyelenggara);
            $('#tgl_mulai').val(tglMulai);
            $('#tgl_selesai').val(tglSelesai);
        }else{
            $('#penyelenggara').val('');
            $('#tgl_mulai').val('');
            $('#tgl_selesai').val('');
        }

    }
</script>