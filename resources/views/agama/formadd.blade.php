<div class="modal-content" id="addAgama">
    {{ Form::open(['url' => 'agama', 'files' => true]) }}
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
        {{ __('Tambah Agama') }}
        </h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    {{ Form::label('name', 'Nama Agama' . ' *', ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
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