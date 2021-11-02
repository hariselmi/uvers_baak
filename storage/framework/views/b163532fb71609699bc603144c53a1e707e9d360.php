<div class="" id="identityDetails">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <h1><?php echo e(__('Identitas')); ?>

        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-body">
                        <?php echo $__env->make('identity.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="editIdentityModal">
            <div class="modal-dialog modal-lg">
                <div id="editIdentity"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/identity/identity.blade.php ENDPATH**/ ?>