<div class="modal-content" id="showMember">
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
                        
                        <h3 class="profile-username text-center"><?php echo e($member->name); ?></h3>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>No. Telp </b> <a class="pull-right"><?php echo e($member->telp); ?></a>
                            </li>
                            <li class="list-group-item hidden-print">
                                <b>Email</b> <a class="pull-right"><?php echo e($member->email); ?></a>
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
</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pendaftaran/profile.blade.php ENDPATH**/ ?>