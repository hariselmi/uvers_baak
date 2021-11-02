<div class="modal-content" id="editEkspor">
    @if (!empty($ekspor))
    {{ Form::model($ekspor, ['route' => ['ekspors.update', $ekspor->id], 'method' => 'PUT', 'files' => true]) }}
    @endif
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Edit Anggota') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('auditor_id', trans('ekspor.chief_auditor') . ' *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('auditor_id', $auditor, null, ['id' => 'edit_auditor_id', 'class' => 'form-control', 'required', 'onchange' => 'getEkspors(this.value)']) !!}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('name', trans('ekspor.ekspor_name') . ' *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {!! Form::select('users_id', $users, null, ['id' => 'edit_users_id', 'class' => 'form-control', 'required']) !!}
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