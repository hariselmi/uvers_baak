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
        </div>
    </div>

    {{-- <div class="row">

        <div style="width: 90%; margin:auto">

            <a class="btn btn-primary pull-right add-record" data-added="0"><i
                    class="glyphicon glyphicon-plus"></i>&nbsp;Add Row</a>

            <div class="tableFixHead">
                <table class="table table-bordered" id="tbl_posts">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:1%">No</th>
                            <th class="text-center">File Persyaratan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tbl_posts_body">
                            <tr id="rec-1">
                                <td class="text-center">
                                    <input type="hidden" name="id[]" value="0">
                                    <span class="sn">1</span>.
                                </td>
                                <td><input class="form-control" type="text" name="syarat[]" id="syarat"></td>
                                <td class="text-center"><a class="btn btn-xs delete-record" data-id="1"><i class="glyphicon glyphicon-trash"></i></a></td>
                            </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div> --}}


    <div class="row">

        <div style="width: 90%; margin:auto">
                    <a class="btn btn-primary pull-right rounded-0" id="insertRow" href="#">Add new row</a>

            <div class="tableFixHead">
                 <!--  Bootstrap table-->
                 <div class="table-responsive">
                    <table id="tableSyaratAdd" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" style="width:5px">#</th>
                                <th scope="col">Syarat</th>
                                <th scope="col" style="width:5px"></th>
                            </tr>
                        </thead>
                        <tbody>
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
    {{ Form::submit(trans('submit'), ['class' => 'btn btn-success']) }}
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('Tutup') }}</button>
</div>
{{ Form::close() }}
</div>

<script>

    $('#kategori, #jenisKepesertaan').select2({
        width:'100%'
    });

    $(function () {

        // Start counting from the third row
        var counter = 1;

        $("#insertRow").on("click", function (event) {
            event.preventDefault();

            var newRow = $("<tr>");
            var cols = '';

            // Table columns
            cols += '<th scrope="row">' + counter + '</th>';
            cols += '<td><input class="form-control" rounded-0" type="text" name="syarat[]" id="syarat"></td>';
            cols += '<td><button class="btn btn-danger rounded-0" id ="deleteRow"><i class="fa fa-trash"></i></button></td>';

            // Insert the columns inside a row
            newRow.append(cols);

            // Insert the row inside a table
            $("#tableSyaratAdd").append(newRow);

            // Increase counter after each row insertion
            counter++;
        });

        // Remove row when delete btn is clicked
        $("#tableSyaratAdd").on("click", "#deleteRow", function (event) {
            $(this).closest("tr").remove();
            counter -= 1
        });
    });



</script>
