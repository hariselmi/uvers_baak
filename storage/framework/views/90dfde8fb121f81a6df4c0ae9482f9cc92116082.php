<div class="" id="slidersDetails">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <h1><?php echo e(__('Slider')); ?>

            <a class="btn btn-small btn-success pull-right" href="#addSlidersModal" data-toggle='modal'>
                <i class="fa fa-plus"></i>&nbsp; <?php echo e(__('Tambah')); ?></a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/sliders'), 'filter_id'=>'slidersFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('sliders.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addSlidersModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('sliders.formadd', ['sliders'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editSlidersModal">
            <div class="modal-dialog modal-lg">
                <div id="editSliders"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showSlidersModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showSliders"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/sliders/sliders.blade.php ENDPATH**/ ?>