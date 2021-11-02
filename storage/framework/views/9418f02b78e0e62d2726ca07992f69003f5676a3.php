<div class="" id="lombaDetails">
    <!-- Content Header (Page header) -->

    <?php if(auth()->user()->checkSpPermission('lomba.create')): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Kegiatan Lomba/Kompetisi')); ?>

            <a class="btn btn-small btn-success pull-right" href="#addLombaModal" data-toggle='modal'>
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
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/lomba'), 'filter_id'=>'lombaFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('lomba.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addLombaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('lomba.formadd', ['lomba'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editLombaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('lomba.formedit', ['lomba'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showLombaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showLomba"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/lomba/lomba.blade.php ENDPATH**/ ?>