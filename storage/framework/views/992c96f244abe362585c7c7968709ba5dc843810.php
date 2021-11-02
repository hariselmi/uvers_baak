<div class="modal-content" id="editStatusPemrosesan">
    <?php if(!empty($statusPemrosesan)): ?>
    <?php echo e(Form::model($statusPemrosesan, ['route' => ['statuspemrosesan.update', $statusPemrosesan->id], 'method' => 'PUT', 'files' => true])); ?>

    <?php endif; ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php echo e(__('Edit Anggota')); ?>

    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                <?php echo e(Form::label('mahasiswa_id', 'Nama *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('mahasiswa_id', $mahasiswa, null, ['placeholder' => 'Pilih Nama Mahasiswa', 'class' => 'form-control']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('no_identitas', 'No. Identitas/KTP *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('no_identitas', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('no_rekening', 'No. Rekening *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('no_rekening', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('pemilik_rekening', 'Nama Pemilik Rekening *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('pemilik_rekening', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('ktm', 'KTM', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::file('ktm', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('transkip_nilai', 'Transkip Nilai', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::file('transkip_nilai', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('status_pendaftaran', 'Status Pendaftaran *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('status_pendaftaran', ['3' => 'Diproses', '4' => 'Disetujui', '5' => 'Ditolak'], null, ['placeholder' => 'Pilih Status Pendaftaran', 'class' => 'form-control']); ?>

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

</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/statuspemrosesan/formedit.blade.php ENDPATH**/ ?>