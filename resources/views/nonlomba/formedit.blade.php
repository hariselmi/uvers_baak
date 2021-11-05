<div class="modal-content" id="editNonLomba">
    @if (!empty($nonlomba))
        {{ Form::model($nonlomba, ['route' => ['nonlomba.update', $nonlomba->id], 'method' => 'PUT', 'files' => true]) }}
    @endif
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            {{ __('Edit Non Lomba') }}
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
                        {!! Form::select('kategori', ['1' => 'Sekolah', '2' => 'Kecamatan', '3' => 'Kab/Kota','4' => 'Provinsi','5' => 'Wilayah','6' => 'Nasional','7' => 'Internasional'], null, ['placeholder' => 'Pilih Kategori Kegiatan', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('jenis', 'Jenis Kepesertaan', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {!! Form::select('jenis', ['1' => 'Individu', '2' => 'Kelompok'], null, ['placeholder' => 'Pilih Jenis Kepersertaan', 'class' => 'form-control']) !!}
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
                        {!! Form::select('capaian', ['1' => 'Juara Umum', '2' => 'Juara I', '3' => 'Juara II','4' => 'Juara III','5' => 'Juara Harapan','6' => 'Partisipasi/delgasi/peserta kejuruan','7' => 'Penyelenggara Kegiatan Kejuaraan'], null, ['placeholder' => 'Pilih Capaian Prestasi', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('sertifikat', 'Sertifikat/Piala/Medali', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::file('sertifikat', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('laman_penyelenggara', 'URL Laman Penyelenggara', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::text('laman_penyelenggara', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('foto_penghargaan', 'Foto Upacara Penyerahan Penghargaan', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::file('foto_penghargaan', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('surat_nonlomba', 'Surat Tugas atau Surat Izin', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::file('surat_nonlomba', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('keterangan', 'Keterangan', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::textarea('keterangan', null, ['class' => 'form-control', 'style' => 'height:50px']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        @if (!empty($page))
            <input type="hidden" name="page" value="{{ $page }}" />
        @endif
        {{ Form::submit('Simpan', ['class' => 'btn btn-success']) }}
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
    </div>
    {{ Form::close() }}
</div>
