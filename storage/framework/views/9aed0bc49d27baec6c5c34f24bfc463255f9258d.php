<div class="modal-content" id="showMahasiswa">
    <section class="content-header">
        <h1><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <?php echo e(__('Profil Anggota')); ?></h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php echo $__env->make('partials.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <!-- Profile Image -->
                <div class="box box-success">
                    <div class="box-body box-profile">
                        
                        <h3 class="profile-username text-center"><?php echo e($mahasiswa->nama); ?></h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item hidden-print">
                                <b>NPM</b> <a class="pull-right"><?php echo e($mahasiswa->nim); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tempat Lahir</b> <a class="pull-right"><?php echo e($mahasiswa->tempat_lahir); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Tanggal Lahir</b> <a class="pull-right"><?php echo e($mahasiswa->tgl_lahir); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Telp</b> <a class="pull-right"><?php echo e($mahasiswa->telp); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Agama</b> <a class="pull-right"><?php echo e(Get_field::get_data($mahasiswa->agama, 'agama', 'name')); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Jenis Kelamin</b> <a class="pull-right"><?php echo e(Get_field::get_data($mahasiswa->jenis_kelamin, 'jenis_kelamin', 'name')); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Alamat</b> <a class="pull-right"><?php echo e($mahasiswa->nim); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Prodi</b> <a class="pull-right"><?php echo e(Get_field::get_data($mahasiswa->prodi, 'prodi', 'name')); ?></a>
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
</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/mahasiswa/profile.blade.php ENDPATH**/ ?>