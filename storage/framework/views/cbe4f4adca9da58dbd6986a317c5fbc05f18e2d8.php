<div class="modal-content" id="showStatusPemrosesan">
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
                        
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Beasiswa </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Nama </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>NIM </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Prodi </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>No. Identitas/KTP </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>No. Rekening </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Nama Pemilik Rekening </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Alamat </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>No Telp </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>KTM </b> <a class="pull-right">-</a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Transkip Nilai </b> <a class="pull-right">-</a>
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
</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/statuspemrosesan/profile.blade.php ENDPATH**/ ?>