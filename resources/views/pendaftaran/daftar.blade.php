<div class="modal-content" id="daftarPendaftaranBeasiswa">
    @if (!empty($pendaftaranBeasiswa))
    {{ Form::model($pendaftaranBeasiswa, ['route' => ['pendaftaran.storedaftar', $pendaftaranBeasiswa->id], 'method' => 'PUT', 'files' => true]) }}
    @endif
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Daftar Beasiswa') }}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                {{ Form::label('nama_paket', 'Nama Paket *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('nama_paket', null, ['class' => 'form-control', 'readonly' => 'readonly']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('no_identitas', 'No. Identitas/KTP *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('no_identitas', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('no_rekening', 'No. Rekening *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('no_rekening', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('pemilik_rekening', 'Nama Pemilik Rekening *', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('pemilik_rekening', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('ktm', 'KTM', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::file('ktm', null, ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('transkip_nilai', 'Transkip Nilai', ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::file('transkip_nilai', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
</div>


<div style="display:none;">
    <table id="sample_table">
        <tr id="">
            <td class="text-center">
                <input type="hidden" name="id[]" value="0">
                <span class="sn">1</span>.
            </td>
            <td><input class="form-control" type="text" name="syarat[]" id="syarat"></td>
            <td class="text-center"><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
        </tr>
    </table>
</div>


<div class="modal-footer">
    @if (!empty($page))
        <input type="hidden" name="page" value="{{ $page }}" />
    @endif
    {{ Form::submit(trans('Daftar'), ['class' => 'btn btn-success']) }}
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
</div>
{{ Form::close() }}
</div>