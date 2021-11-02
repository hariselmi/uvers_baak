<div class="modal-content" id="showSertifikat">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <?php echo e(__('Detail Sertifikat Kompetensi')); ?></h1>
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
                                <b>Nama Kegiatan </b> <a class="pull-right"><?php echo e($sertifikat->nama_kegiatan ? $sertifikat->nama_kegiatan : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Peran</b> <a class="pull-right"><?php echo e($sertifikat->peran ? $sertifikat->peran : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Penyelenggara</b> <a class="pull-right"><?php echo e($sertifikat->penyelenggara ? $sertifikat->penyelenggara : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Mulai</b> <a class="pull-right"><?php echo e($sertifikat->tgl_mulai ? $sertifikat->tgl_mulai : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Selesai</b> <a class="pull-right"><?php echo e($sertifikat->tgl_selesai ? $sertifikat->tgl_selesai : '-'); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Sertifikat/Piala/Medali</b> <a target="_blank" class="pull-right" href="<?php echo e($sertifikat->sertifikat ? asset('/document/certificate').'/'.$sertifikat->sertifikat : 'javascript:void(0)'); ?>"><?php echo e($sertifikat->sertifikat ? $sertifikat->sertifikat : '-'); ?></a>
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
</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/sertifikat/profile.blade.php ENDPATH**/ ?>