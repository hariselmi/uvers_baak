<div class="modal-content" id="editMagang">
    @if (!empty($magang))
        {{ Form::model($magang, ['route' => ['magang.update', $magang->id], 'method' => 'PUT', 'files' => true]) }}
    @endif
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            {{ __('Edit Magang, Pengalaman Organisasi, Kepanitiaan, Kegiatan Sosial/Volunter') }}
        </h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    {{ Form::label('nama_kegiatan', 'Nama Kegiatan *', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::text('nama_kegiatan', null, ['class' => 'form-control', 'required', 'id' => 'nama_kegiatan_edit']) }}
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
                        {{ Form::text('penyelenggara', null, ['class' => 'form-control', 'id' => 'penyelenggara_edit', 'required']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tgl_mulai', 'Tanggal Mulai *', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::date('tgl_mulai', null, ['class' => 'form-control', 'id' => 'tgl_mulai_edit', 'required']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('tgl_selesai', 'Tanggal Akhir *', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::date('tgl_selesai', null, ['class' => 'form-control', 'id' => 'tgl_selesai_edit', 'required']) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('sertifikat', 'Sertifikat/Piala/Medali', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::file('sertifikat', null, ['class' => 'form-control', 'required']) }}
                        <label style="color: #dc3545; font-size:.875em">*Pastikan file dalam format PDF file max 5 MB</label>
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


@if (!empty($magang))
<script>

    var path = "{{ route('kegiatan') }}";
    // setTimeout(() => {
        $('#nama_kegiatan_edit').typeahead({
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

                $('#penyelenggara_edit').val(penyelenggara);
                $('#tgl_mulai_edit').val(tglMulai);
                $('#tgl_selesai_edit').val(tglSelesai);

                return item.split('(')[0].slice('', -1);
            }
        });


    $( document ).ready(function() {
        $('input').attr('autocomplete','off');
    });
        
    // }, 1000);

</script>
@endif