<div class="modal-content" id="editSkpi">
    <?php if(!empty($skpi)): ?>
        <?php echo e(Form::model($skpi, ['route' => ['skpi.update', $skpi->id], 'method' => 'PUT', 'files' => true])); ?>

    <?php endif; ?>

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">
            <?php echo e(__('Edit SKPI')); ?>

        </h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-10">
                <div class="form-group row">
                    <?php echo e(Form::label('nama_kegiatan', 'Nama Kegiatan *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('nama_kegiatan', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('peran', 'Peran/Prestasi *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('peran', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('penyelenggara', 'Penyelenggara *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('penyelenggara', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('tgl_mulai', 'Tanggal Mulai *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::date('tgl_mulai', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('tgl_selesai', 'Tanggal Akhir *', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::date('tgl_selesai', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('sertifikat', 'Sertifikat/Piala/Medali', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::file('sertifikat', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('golongan_skpi_id', 'Golongan SKPI', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('golongan_skpi_id', $golonganSkpi, null, ['placeholder' => 'Pilih Golongan SKPI', 'class' => 'form-control']); ?>

                    </div>
                </div>


                <?php if(Auth::user()->role != 'staff-skpi'): ?>

                    <div class="form-group row">
                        <?php echo e(Form::label('status', 'Status', ['class' => 'col-sm-3 text-right'])); ?>

                        <div class="col-sm-9">
                            <?php echo Form::select('status', ['1' => 'Pending', '2' => 'Disetujui'], null, ['placeholder' => 'Pilih Capaian Prestasi', 'class' => 'form-control']); ?>

                        </div>
                    </div>

                <?php else: ?>

                <div class="form-group row" style="display: none">
                    <?php echo e(Form::label('status', 'Status', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('status', ['1' => 'Pending', '2' => 'Disetujui'], null, ['placeholder' => 'Pilih Capaian Prestasi', 'class' => 'form-control']); ?>

                    </div>
                </div>

                <?php endif; ?>
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
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/skpi/formedit1.blade.php ENDPATH**/ ?>