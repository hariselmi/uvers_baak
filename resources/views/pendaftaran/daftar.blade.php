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
        </div>
    </div>



    <div class="row">

        <div style="width: 90%; margin:auto">
            <div class="tableFixHead">
                 <!--  Bootstrap table-->
                 <div class="table-responsive">
                    <table id="tableSyarat" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5px">#</th>
                                <th scope="col">Syarat</th>
                                <th scope="col" style="width:30%">Upload File</th>
                            </tr>
                        </thead>
                        <tbody>

                        @if (!empty($pendaftaranBeasiswa))
                            @foreach ($syaratBeasiswa as $key=>$data)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>
                                        {{$data->syarat}}
                                        <input class="form-control" type="hidden" name="syaratId[]" id="syaratId" value="{{$data->id}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="file" name="fileSyarat[]" id="fileSyarat" value="">
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>

                <!-- Add rows button-->
                
            </div>

        </div>
    </div>
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