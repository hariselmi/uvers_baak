<div class="modal-content" id="editStatusPemrosesan">
    @if (!empty($statusPemrosesan))
    {{ Form::model($statusPemrosesan, ['route' => ['statuspemrosesan.update', $statusPemrosesan->id], 'method' => 'PUT', 'files' => true]) }}
    @endif
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Edit Status Pemrosesan') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('mahasiswa_id', 'Nama *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('mahasiswa_id', $mahasiswa, null, ['placeholder' => 'Pilih Nama Mahasiswa', 'class' => 'form-control', 'disabled' => true]) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('no_identitas', 'No. Identitas/KTP *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('no_identitas', null, ['class' => 'form-control', 'disabled' => true]) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('no_rekening', 'No. Rekening *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('no_rekening', null, ['class' => 'form-control', 'disabled' => true]) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('pemilik_rekening', 'Nama Pemilik Rekening *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('pemilik_rekening', null, ['class' => 'form-control', 'disabled' => true]) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('catatan', 'Catatan', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::textarea('catatan', null, ['class' => 'form-control', 'style' => 'height:50px']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('status', 'Status Pendaftaran *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('status', $status_pemrosesan, null, ['placeholder' => 'Pilih Status Pendaftaran', 'class' => 'form-control']) !!}
                </div>
            </div>
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