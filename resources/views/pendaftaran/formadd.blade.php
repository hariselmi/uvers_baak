<div class="modal-content" id="addPendaftaranBeasiswa">
    {{ Form::open(['url' => 'pendaftaran', 'files' => true]) }}
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        {{ __('Tambah Pendaftaran Beasiswa') }}
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

    <div class="row">

        <div style="width: 90%; margin:auto">

            <a class="btn btn-primary pull-right add-record" data-added="0"><i
                    class="glyphicon glyphicon-plus"></i>&nbsp;Add Row</a>

            <div class="tableFixHead">
                <table class="table table-bordered" id="tbl_posts">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:1%">No</th>
                            <th class="text-center">KTS/OB</th>
                            <th class="text-center">Referensi</th>
                            <th class="text-center">Pernyataan</th>
                            <th class="text-center">Jawaban</th>
                            <th class="text-center">Alasan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_posts_body">
                            <tr id="rec-1">
                                <td class="text-center">
                                    <input type="hidden" name="id[]" value="0">
                                    <span class="sn">1</span>.
                                </td>
                                <td>
                                    <select class="form-select form-control" aria-label="Default select example"
                                        id="category" name="category[]">
                                        <option value="1">KTS (Minor)</option>
                                        <option value="2">KTS (Mayor)</option>
                                        <option value="3">OB</option>
                                    </select>
                                </td>
                                <td><textarea class="form-control" name="reference[]" id="reference" rows="3"
                                        placeholder="Referensi"></textarea></td>
                                <td><textarea class="form-control" name="statement[]" id="statement" rows="3"
                                        placeholder="Pernyataan"></textarea></td>
                                <td>
                                    <select class="form-select form-control" aria-label="Default select example"
                                        id="answer" name="answer[]">
                                        <option value="1">Setuju</option>
                                        <option value="2">Tidak Setuju</option>
                                    </select>
                                </td>
                                <td><textarea class="form-control" name="reason[]" id="reason" rows="3"
                                        placeholder="Alasan Tidak Setuju"></textarea></td>
                                <td class="text-center"><a class="btn btn-xs delete-record" data-id="1"><i
                                            class="glyphicon glyphicon-trash"></i></a></td>
                            </tr>
                    </tbody>
                </table>
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


<script type="text/javascript" src="{{ asset('js/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/finding.js') }}"></script>