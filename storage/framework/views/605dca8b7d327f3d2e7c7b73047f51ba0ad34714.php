<div class="modal-content" id="showSkpi">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <?php echo e(__('Detail SKPI')); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Detaile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama Kegiatan </b> <a class="pull-right"><?php echo e($skpi->nama_kegiatan ? $skpi->nama_kegiatan : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right"><?php echo e($skpi->peran ? $skpi->peran : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right"><?php echo e($skpi->penyelenggara ? $skpi->penyelenggara : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right"><?php echo e($skpi->tgl_mulai ? $skpi->tgl_mulai : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right"><?php echo e($skpi->tgl_selesai ? $skpi->tgl_selesai : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Kategori Kegiatan</b> <a class="pull-right"><?php echo e($skpi->kategori ? Get_field::get_data($skpi->kategori, 'kategori_kegiatan', 'name') : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jenis Kepesertaan</b> <a class="pull-right"><?php echo e($skpi->jenis ? Get_field::get_data($skpi->jenis, 'jenis_kepesertaan', 'name') : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jumlah Peserta</b> <a class="pull-right"><?php echo e($skpi->jml_peserta ? $skpi->jml_peserta : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Capaian Prestasi</b> <a class="pull-right"><?php echo e($skpi->capaian ? Get_field::get_data($skpi->capaian, 'capaian_prestasi', 'name') : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Sertifikat/Piala/Medali</b> <a target="_blank" class="pull-right" href="<?php echo e($skpi->sertifikat ? asset('/document/certificate').'/'.$skpi->sertifikat : 'javascript:void(0)'); ?>"><?php echo e($skpi->sertifikat ? $skpi->sertifikat : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>URL Laman Penyelenggara</b> <a class="pull-right"><?php echo e($skpi->laman_penyelenggara ? $skpi->laman_penyelenggara : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Foto Upacara Penyerahan Penghargaan</b> <a target="_blank" class="pull-right" href="<?php echo e($skpi->foto_penghargaan ? asset('/document/award').'/'.$skpi->foto_penghargaan : 'javascript:void(0)'); ?>"><?php echo e($skpi->foto_penghargaan ? $skpi->foto_penghargaan : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Surat Kegiatan Skpi</b> <a class="pull-right"<a target="_blank" class="pull-right" href="<?php echo e($skpi->surat_lomba ? asset('/document/letter').'/'.$skpi->surat_lomba : 'javascript:void(0)'); ?>"><?php echo e($skpi->surat_lomba ? $skpi->surat_lomba : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Keterangan</b> <a class="pull-right"><?php echo e($skpi->keterangan ? $skpi->keterangan : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Status</b> <a class="pull-right"><?php echo e($skpi->status ? Get_field::get_data($skpi->status, 'status', 'name') : '-'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/skpi/profile.blade.php ENDPATH**/ ?>