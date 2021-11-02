<div class="" id="pagesDetails">
    <!-- Content Header (Page header) -->
    <section class="content-header m-3">
        <h1><?php echo e(__('Halaman')); ?>

        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-success">
                    <div class="box-header">
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/pages'), 'filter_id'=>'pagesFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('pages.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="editPagesModal">
            <div class="modal-dialog modal-lg">
                <div id="editPages"></div>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showPagesModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showPages"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pages/pages.blade.php ENDPATH**/ ?>