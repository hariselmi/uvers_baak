<div class="" id="skpiDetails">
    <!-- Content Header (Page header) -->

    <section class="content-header m-3">
        <h1><?php echo e(__('SKPI')); ?>

            <a class="btn btn-small btn-success pull-right" href="<?php echo e(route('skpi.excel')); ?>" data-toggle='modal' target="_blank"><?php echo e(__('Excel')); ?></a>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/skpi'), 'filter_id'=>'skpiFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('skpi.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addSkpiModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('skpi.formadd', ['skpi'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editSkpiModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('skpi.formedit', ['skpi'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showSkpiModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showSkpi"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/skpi/skpi.blade.php ENDPATH**/ ?>