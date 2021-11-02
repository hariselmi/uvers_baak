<div class="" id="nonNonLombaDetails">
    <!-- Content Header (Page header) -->

    <?php if(auth()->user()->checkSpPermission('nonlomba.create')): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Kegiatan Non Lomba')); ?>

            <a class="btn btn-small btn-success pull-right" href="#addNonLombaModal" data-toggle='modal'>
                <i class="fa fa-plus"></i>&nbsp; <?php echo e(__('Tambah')); ?></a>
        </h1>
    </section>
    <?php endif; ?>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/nonlomba'), 'filter_id'=>'nonlombaFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('nonlomba.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addNonLombaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('nonlomba.formadd', ['nonlomba'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editNonLombaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('nonlomba.formedit', ['nonlomba'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showNonLombaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showNonLomba"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/nonlomba/nonlomba.blade.php ENDPATH**/ ?>