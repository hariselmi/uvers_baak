<div class="modal-content" id="addMahasiswa">
    <?php echo e(Form::open(['url' => 'mahasiswa', 'files' => true])); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php echo e(__('Tambah Kegiatan Lomba')); ?>

    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                <?php echo e(Form::label('nim', 'NIM *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('nim', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('nama', 'Nama Lengkap *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('nama', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('tempat_lahir', 'Tempat Lahir *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('tempat_lahir', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('tgl_lahir', 'Tanggal Lahir *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::date('tgl_lahir', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('telp', 'No. Telp *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('telp', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('email', 'Email *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::email('email', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('agama', 'Agama *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('agama', ['1' => 'Islam', '2' => 'Kristen', '3' => 'Katolik', '4' => 'Hindu', '5' => 'Budha', '6' => 'Konghucu'], null, ['placeholder' => 'Pilih Agama', 'class' => 'form-control']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('jenis_kelamin', 'Jenis Kelamin *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('jenis_kelamin', ['1' => 'Laki-laki', '2' => 'Perempuan'], null, ['placeholder' => 'Pilih Jenis Kelamin', 'class' => 'form-control']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('prodi', 'Prodi *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('prodi', ['1' => 'Akuntansi', '2' => 'Manajemen', '3' => 'Sistem Informasi', '4' => 'Teknik Informatika', '5' => 'Teknik Perangkat Lunak', '6' => 'Pendidikan Bahasa Mandarin', '7' => 'Seni Musik', '8' => 'Seni Tari', '9' => 'Teknik Industri', '10' => 'Teknik Lingkungan'], null, ['placeholder' => 'Pilih Prodi', 'class' => 'form-control']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('alamat', 'Alamat *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::textarea('alamat', null, ['class' => 'form-control', 'style' => 'height:50px'])); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if(!empty($page)): ?>
        <input type="hidden" name="page" value="<?php echo e($page); ?>" />
    <?php endif; ?>
    <?php echo e(Form::submit(trans('submit'), ['class' => 'btn btn-success'])); ?>

    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
</div>
<?php echo e(Form::close()); ?>

</div>

<script>

    $('#kategori, #jenisKepesertaan').select2({
        width:'100%'
    });

</script>

<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/mahasiswa/formadd.blade.php ENDPATH**/ ?>