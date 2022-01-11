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
                    {{ Form::textarea('deskripsi', null, ['class' => 'form-control', 'required', 'style' => 'height:50px']) }}
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
            

            @foreach ($custom as $key=>$item)
            <div class="form-group row">
                {{ Form::label('nama_custom_'.($key+1), 'Nama Custom '.($key+1), ['class' => 'col-sm-3 text-right']) }}
                <div class="col-sm-9">
                    {{ Form::text('nama_custom_'.($key+1), $item->nama_field, ['class' => 'form-control']) }}
                </div>
            </div>
            @endforeach

            @for ($i=count($custom)+1;$i<=10;$i++)
                <div class="form-group row">
                    {{ Form::label('nama_custom_'.($i), 'Nama Custom '.($i), ['class' => 'col-sm-3 text-right']) }}
                    <div class="col-sm-9">
                        {{ Form::text('nama_custom_'.($i), null, ['class' => 'form-control']) }}
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <div class="row">

        <div style="width: 90%; margin:auto">
                    <a class="btn btn-primary pull-right rounded-0" id="insertRowEdit" href="#">Add new row</a>

            <div class="tableFixHead">
                {{-- <table class="table table-bordered" id="tbl_posts">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:1%">No</th>
                            <th class="text-center">File Persyaratan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_posts_body">
                        @if (!empty($pendaftaranBeasiswa))
                            @foreach ($syaratBeasiswa as $key=>$data)
                                <tr id="rec-1">
                                    <td class="text-center">
                                        <input type="hidden" name="id[]" value="0">
                                        <span class="sn">{{$key+1}}</span>.
                                    </td>
                                    <td><input class="form-control" type="text" name="syarat[]" id="syarat" value="{{$data->syarat}}"></td>
                                    <td class="text-center"><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table> --}}
                 <!--  Bootstrap table-->
                 <div class="table-responsive">
                    <table id="tableSyarat" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5px">#</th>
                                <th scope="col">Syarat</th>
                                <th scope="col" style="width:5px"></th>
                            </tr>
                        </thead>
                        <tbody>

                        @if (!empty($pendaftaranBeasiswa))
                            @foreach ($syaratBeasiswa as $key=>$data)
                                <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>
                                        <input class="form-control" type="text" name="syarat[]" id="syarat" value="{{$data->syarat}}">
                                        <input class="form-control" type="hidden" name="id[]" id="id" value="{{$data->id}}">
                                    </td>
                                    <td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button></td>
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
    {{ Form::submit(trans('Simpan'), ['class' => 'btn btn-success']) }}
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
</div>
{{ Form::close() }}
</div>


<script type="text/javascript" src="{{ asset('js/angular.min.js') }}"></script>

@if (!empty($pendaftaranBeasiswa))
    

<script>
    $(function () {

    // Start counting from the third row
    var counter = {!! $syaratBeasiswaCount !!}+1;

    $("#insertRowEdit").on("click", function (event) {
        event.preventDefault();

        var newRow = $("<tr>");
        var cols = '';

        // Table columns
        cols += '<th scrope="row">' + counter + '</th>';
        cols += '<td><input class="form-control" rounded-0" type="text" name="syaratBaru[]" id="syaratBaru"></td>';
        cols += '<td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button></td>';

        // Insert the columns inside a row
        newRow.append(cols);

        // Insert the row inside a table
        $("#tableSyarat").append(newRow);

        // Increase counter after each row insertion
        counter++;
    });

    // Remove row when delete btn is clicked
    $("#tableSyarat").on("click", "#deleteRow", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });
    });

</script>
@endif
