<div class="" id="statusPemroseanDetails">
    <!-- Content Header (Page header) -->

    <?php if(auth()->user()->checkSpPermission('statuspemrosesan.create')): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Status Pemrosesan')); ?>

            

            
        </h1>
    </section>
    <?php endif; ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/statuspemrosesan'), 'filter_id'=>'statusFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('statuspemrosesan.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addStatusPemrosesanModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('statuspemrosesan.formadd', ['statuspemrosesan'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editStatusPemrosesanModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('statuspemrosesan.formedit', ['statuspemrosesan'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showStatusPemrosesanModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showStatusPemrosesan"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/statuspemrosesan/statuspemrosesan.blade.php ENDPATH**/ ?>