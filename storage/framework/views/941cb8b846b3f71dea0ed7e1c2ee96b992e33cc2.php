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
                    <?php echo e(Form::label('kategori', 'Kategori Kegiatan', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('kategori', ['1' => 'Sekolah', '2' => 'Kecamatan', '3' => 'Kab/Kota','4' => 'Provinsi','5' => 'Wilayah','6' => 'Nasional','7' => 'Internasional'], null, ['placeholder' => 'Pilih Kategori Kegiatan', 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('jenis', 'Jenis Kepesertaan', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('jenis', ['1' => 'Individu', '2' => 'Kelompok'], null, ['placeholder' => 'Pilih Jenis Kepersertaan', 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('jml_peserta', 'Jumlah Peserta', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::number('jml_peserta', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('capaian', 'Capaian Prestasi', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo Form::select('capaian', ['1' => 'Juara Umum', '2' => 'Juara I', '3' => 'Juara II','4' => 'Juara III','5' => 'Juara Harapan','6' => 'Partisipasi/delgasi/peserta kejuruan','7' => 'Penyelenggara Kegiatan Kejuaraan'], null, ['placeholder' => 'Pilih Capaian Prestasi', 'class' => 'form-control']); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('sertifikat', 'Sertifikat/Piala/Medali', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::file('sertifikat', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('laman_penyelenggara', 'URL Laman Penyelenggara', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::text('laman_penyelenggara', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('foto_penghargaan', 'Foto Upacara Penyerahan Penghargaan', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::file('foto_penghargaan', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('surat_skpi', 'Surat Kegiatan SKPI', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::file('surat_skpi', null, ['class' => 'form-control'])); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <?php echo e(Form::label('keterangan', 'Keterangan', ['class' => 'col-sm-3 text-right'])); ?>

                    <div class="col-sm-9">
                        <?php echo e(Form::textarea('keterangan', null, ['class' => 'form-control', 'style' => 'height:50px'])); ?>

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
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/skpi/formedit.blade.php ENDPATH**/ ?>