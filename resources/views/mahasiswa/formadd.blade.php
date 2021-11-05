<div class="modal-content" id="addMahasiswa">
    {{ Form::open(['url' => 'mahasiswa', 'files' => true]) }}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Tambah Kegiatan Lomba') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('nim', 'NIM *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('nim', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('nama', 'Nama Lengkap *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('nama', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tempat_lahir', 'Tempat Lahir *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('tempat_lahir', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_lahir', 'Tanggal Lahir *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_lahir', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('telp', 'No. Telp *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('telp', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('email', 'Email *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('agama', 'Agama *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('agama', $agama, null, ['placeholder' => 'Pilih Agama', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('jenis_kelamin', 'Jenis Kelamin *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('jenis_kelamin', ['1' => 'Laki-laki', '2' => 'Perempuan'], null, ['placeholder' => 'Pilih Jenis Kelamin', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('prodi', 'Prodi *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('prodi', $prodi, null, ['placeholder' => 'Pilih Prodi', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('alamat', 'Alamat *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::textarea('alamat', null, ['class' => 'form-control', 'style' => 'height:50px']) }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    @if (!empty($page))
        <input type="hidden" name="page" value="{{ $page }}" />
    @endif
    {{ Form::submit(trans('submit'), ['class' => 'btn btn-success']) }}
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
</div>
{{ Form::close() }}
</div>

<script>

    $('#kategori, #jenisKepesertaan').select2({
        width:'100%'
    });

</script>

