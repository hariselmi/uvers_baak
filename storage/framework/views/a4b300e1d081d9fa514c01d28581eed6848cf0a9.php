<div class="modal-content" id="editMagang">
    <?php if(!empty($magang)): ?>
        <?php echo e(Form::model($magang, ['route' => ['magang.update', $magang->id], 'method' => 'PUT', 'files' => true])); ?>

    <?php endif; ?>
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            <?php echo e(__('Edit Magang, Pengalaman Organisasi, Kepanitiaan, Kegiatan Sosial/Volunter')); ?>

        </h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <?php echo e(Form::label('nama_kegiatan', 'Nama Kegiatan *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('nama_kegiatan', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('peran', 'Peran/Prestasi *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('peran', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('penyelenggara', 'Penyelenggara *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('penyelenggara', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('tgl_mulai', 'Tanggal Mulai *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::date('tgl_mulai', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('tgl_selesai', 'Tanggal Akhir *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::date('tgl_selesai', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('sertifikat', 'Sertifikat/Piala/Medali', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::file('sertifikat', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?php if(!empty($page)): ?>
            <input type="hidden" name="page" value="<?php echo e($page); ?>" />
        <?php endif; ?>
        <?php echo e(Form::submit('Simpan', ['class' => 'btn btn-success'])); ?>

        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
    </div>
    <?php echo e(Form::close()); ?>

</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/magang/formedit.blade.php ENDPATH**/ ?>