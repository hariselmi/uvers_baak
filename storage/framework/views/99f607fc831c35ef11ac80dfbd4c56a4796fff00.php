<div class="modal-content" id="editPendaftaranBeasiswa">
    <?php if(!empty($pendaftaranBeasiswa)): ?>
    <?php echo e(Form::model($pendaftaranBeasiswa, ['route' => ['pendaftaran.update', $pendaftaranBeasiswa->id], 'method' => 'PUT', 'files' => true])); ?>

    <?php endif; ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php echo e(__('Edit Pendaftaran Beasiswa')); ?>

    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                <?php echo e(Form::label('nama_paket', 'Nama Paket *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('nama_paket', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('deskripsi', 'Deskripsi *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::textarea('deskripsi', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('status_pendaftaran', 'Status Pendaftaran *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('status_pendaftaran', ['1' => 'Masih Dibuka', '2' => 'Sudah Ditutup'], null, ['placeholder' => 'Pilih Status Pendaftaran', 'class' => 'form-control']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('tgl_mulai_periode', 'Tgl Mulai Pendaftaran *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::date('tgl_mulai_periode', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('tgl_sampai_periode', 'Tgl Sampai Pendaftaran *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::date('tgl_sampai_periode', null, ['class' => 'form-control'])); ?>

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

</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pendaftaran/formedit.blade.php ENDPATH**/ ?>