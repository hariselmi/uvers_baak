<div class="modal-content" id="addLomba">
    {{ Form::open(['url' => 'lomba', 'files' => true]) }}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Tambah Kegiatan Lomba/Kompetisi') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('nama_kegiatan', 'Nama Kegiatan *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('nama_kegiatan', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('peran', 'Peran/Prestasi *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('peran', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('penyelenggara', 'Penyelenggara *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('penyelenggara', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_mulai', 'Tanggal Mulai *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_mulai', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_selesai', 'Tanggal Akhir *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_selesai', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('kategori', 'Kategori Kegiatan', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('kategori', $kategoriKegiatan, null, ['placeholder' => 'Pilih Kategori Kegiatan', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('jenis', 'Jenis Kepesertaan', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('jenis', $jenisKepesertaan, null, ['placeholder' => 'Pilih Jenis Kepersertaan', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('jml_peserta', 'Jumlah Peserta', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::number('jml_peserta', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('capaian', 'Capaian Prestasi', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('capaian', $capaianPrestasi, null, ['placeholder' => 'Pilih Capaian Prestasi', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('sertifikat', 'Sertifikat/Piala/Medali', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::file('sertifikat', null, ['class' => 'form-control']) }}
                    <label style="color: #dc3545; font-size:.875em">*Pastikan file dalam format PDF/JPG/PNG file max 5 MB</label>
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('laman_penyelenggara', 'URL Laman Penyelenggara', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('laman_penyelenggara', null, ['class' => 'form-control']) }}
                    <label style="color: #dc3545; font-size:.875em">*contoh: http//kejuaraan.com</label>
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('foto_penghargaan', 'Foto Upacara Penyerahan Penghargaan', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::file('foto_penghargaan', null, ['class' => 'form-control']) }}
                    <label style="color: #dc3545; font-size:.875em">*Pastikan file dalam format PDF/JPG/PNG file max 5 MB</label>
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('surat_lomba', 'Surat Tugas atau Surat Izin', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::file('surat_lomba', null, ['class' => 'form-control']) }}
                    <label style="color: #dc3545; font-size:.875em">*Pastikan file dalam format PDF/JPG/PNG file max 5 MB</label>
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('keterangan', 'Keterangan', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'style' => 'height:50px']) }}
                    <label style="color: #dc3545; font-size:.875em">*Dapat diisi dengan Nama Mahasiswa Pemenang dan atau Keterangan Lainnya</label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    @if (!empty($page))
        <input type="hidden" name="page" value="{{ $page }}" />
    @endif
    {{ Form::submit(trans('Simpan'), ['class' => 'btn btn-success']) }}
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
</div>
{{ Form::close() }}
</div>

<script>

    $('#kategori, #jenis, #capaian').select2({
        width:'100%'
    });

    var path = "{{ route('kegiatan') }}";
    setTimeout(() => {
        $('#nama_kegiatan').typeahead({
            source:  function (query, process) {
            return $.get(path, { term: query }, function (data) {
                    return process(data);
                });
            },
            updater:function (item) {
                // console.log(item.split('Penyelenggara : ')[1].split(' |'), 'Penyelenggara')
                let penyelenggara = item.split('Penyelenggara : ')[1].split(' |')[0]
                let tglMulai = item.split('Penyelenggara : ')[1].split(' |')[1].split('Tgl : ')[1].split(' s.d')[0]
                let tglSelesai = item.split('Penyelenggara : ')[1].split(' |')[1].split('s.d ')[1].split(')')[0]

                $('#penyelenggara').val(penyelenggara);
                $('#tgl_mulai').val(tglMulai);
                $('#tgl_selesai').val(tglSelesai);

                return item.split('(')[0].slice('', -1);
            }
        });


    $( document ).ready(function() {
        $('input').attr('autocomplete','off');
    });
        
    }, 1000);

</script>

