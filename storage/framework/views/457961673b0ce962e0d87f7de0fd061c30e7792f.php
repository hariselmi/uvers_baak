<div class="modal-content" id="addMember">
    <?php echo e(Form::open(['url' => 'members', 'files' => true])); ?>

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
                <?php echo e(Form::label('name', 'Nama Kegiatan' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', 'Peran/Prestasi' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', 'Penyelenggara' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', 'Tanggal Mulai' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::date('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', 'Tanggal Akhir' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::date('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('kategori', 'Kategori Kegiatan' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('kategori', ['1' => 'Sekolah', '2' => 'Kecamatan', '3' => 'Kab/Kota','4' => 'Provinsi','5' => 'Wilayah','6' => 'Nasional','7' => 'Internasional'], null, ['placeholder' => 'Pilih Kategori Kegiatan', 'class' => 'form-control', 'required']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('jenisKepesertaan', 'Jenis Kepesertaan' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('jenisKepesertaan', ['1' => 'Individu', '2' => 'Kelompok'], null, ['placeholder' => 'Pilih Jenis Kepersertaan', 'class' => 'form-control', 'required']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('jumlahPeserta', 'Jumlah Peserta' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('jumlahPeserta', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('capaianPrestasi', 'Capaian Prestasi' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('capaianPrestasi', ['1' => 'Juara Umum', '2' => 'Juara I', '3' => 'Juara II','4' => 'Juara III','5' => 'Juara Harapan','6' => 'Partisipasi/delgasi/peserta kejuruan','7' => 'Penyelenggara Kegiatan Kejuaraan'], null, ['placeholder' => 'Pilih Capaian Prestasi', 'class' => 'form-control', 'required']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('sertifikat', 'Sertifikat/Piala/Medali' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::file('sertifikat', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', 'URL Laman Penyelenggara' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('sertifikat', 'Foto Upacara Penyerahan Penghargaan' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::file('sertifikat', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('sertifikat', 'Surat Kegiatan Lomba' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::file('sertifikat', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', 'Keterangan' . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::textarea('content', null, ['class' => 'form-control', 'required'])); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if(!empty($page)): ?>
        <input type="hidden" name="page" value="<?php echo e($page); ?>" />
    <?php endif; ?>
    <?php echo e(Form::submit(trans('member.submit'), ['class' => 'btn btn-success'])); ?>

    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
</div>
<?php echo e(Form::close()); ?>

</div>

<script>

    $('#kategori, #jenisKepesertaan').select2({
        width:'100%'
    });

</script>

<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/ekspor/formadd.blade.php ENDPATH**/ ?>