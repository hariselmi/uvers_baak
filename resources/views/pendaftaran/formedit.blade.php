<div class="modal-content" id="editPendaftaranBeasiswa">
    @if (!empty($pendaftaranBeasiswa))
    {{ Form::model($pendaftaranBeasiswa, ['route' => ['pendaftaran.update', $pendaftaranBeasiswa->id], 'method' => 'PUT', 'files' => true]) }}
    @endif
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Edit Pendaftaran Beasiswa') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('nama_paket', 'Nama Paket *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('nama_paket', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('deskripsi', 'Deskripsi *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::textarea('deskripsi', null, ['class' => 'form-control', 'required']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('status_pendaftaran', 'Status Pendaftaran *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('status_pendaftaran', ['1' => 'Masih Dibuka', '2' => 'Sudah Ditutup'], null, ['placeholder' => 'Pilih Status Pendaftaran', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_mulai_periode', 'Tgl Mulai Pendaftaran *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_mulai_periode', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('tgl_sampai_periode', 'Tgl Sampai Pendaftaran *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::date('tgl_sampai_periode', null, ['class' => 'form-control']) }}
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