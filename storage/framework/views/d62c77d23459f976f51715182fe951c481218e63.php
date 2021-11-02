<div class="" id="memberDetails">
    <!-- Content Header (Page header) -->

    <?php if(auth()->user()->checkSpPermission('ekspor.create')): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Ekspor Data Beasiswa')); ?>

            
        </h1>
    </section>
    <?php endif; ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/ekspor'), 'filter_id'=>'memberFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('ekspor.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addMemberModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('ekspor.formadd', ['ekspor'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editMemberModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('ekspor.formedit', ['ekspor'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showMemberModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showMember"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/ekspor/ekspor.blade.php ENDPATH**/ ?>