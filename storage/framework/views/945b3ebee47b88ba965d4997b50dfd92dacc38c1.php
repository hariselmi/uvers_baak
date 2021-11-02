<div class="modal-content" id="showNonLomba">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <?php echo e(__('Detail Kegiatan Non Lomba')); ?></h1>
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
                                <b>Nama Kegiatan </b> <a class="pull-right"><?php echo e($nonlomba->nama_kegiatan ? $nonlomba->nama_kegiatan : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right"><?php echo e($nonlomba->peran ? $nonlomba->peran : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right"><?php echo e($nonlomba->penyelenggara ? $nonlomba->penyelenggara : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right"><?php echo e($nonlomba->tgl_mulai ? $nonlomba->tgl_mulai : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right"><?php echo e($nonlomba->tgl_selesai ? $nonlomba->tgl_selesai : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Kategori Kegiatan</b> <a class="pull-right"><?php echo e($nonlomba->kategori ? Get_field::get_data($nonlomba->kategori, 'kategori_kegiatan', 'name') : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jenis Kepesertaan</b> <a class="pull-right"><?php echo e($nonlomba->jenis ? Get_field::get_data($nonlomba->jenis, 'jenis_kepesertaan', 'name') : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jumlah Peserta</b> <a class="pull-right"><?php echo e($nonlomba->jml_peserta ? $nonlomba->jml_peserta : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Capaian Prestasi</b> <a class="pull-right"><?php echo e($nonlomba->capaian ? Get_field::get_data($nonlomba->capaian, 'capaian_prestasi', 'name') : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Sertifikat/Piala/Medali</b> <a target="_blank" class="pull-right" href="<?php echo e($nonlomba->sertifikat ? asset('/document/certificate').'/'.$nonlomba->sertifikat : 'javascript:void(0)'); ?>"><?php echo e($nonlomba->sertifikat ? $nonlomba->sertifikat : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>URL Laman Penyelenggara</b> <a class="pull-right"><?php echo e($nonlomba->laman_penyelenggara ? $nonlomba->laman_penyelenggara : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Foto Upacara Penyerahan Penghargaan</b> <a target="_blank" class="pull-right" href="<?php echo e($nonlomba->foto_penghargaan ? asset('/document/award').'/'.$nonlomba->foto_penghargaan : 'javascript:void(0)'); ?>"><?php echo e($nonlomba->foto_penghargaan ? $nonlomba->foto_penghargaan : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Surat Kegiatan Lomba</b> <a class="pull-right"<a target="_blank" class="pull-right" href="<?php echo e($nonlomba->surat_lomba ? asset('/document/letter').'/'.$nonlomba->surat_lomba : 'javascript:void(0)'); ?>"><?php echo e($nonlomba->surat_lomba ? $nonlomba->surat_lomba : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Keterangan</b> <a class="pull-right"><?php echo e($nonlomba->keterangan ? $nonlomba->keterangan : '-'); ?></a>
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
</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/nonlomba/profile.blade.php ENDPATH**/ ?>