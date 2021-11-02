<div class="" id="magangDetails">
    <!-- Content Header (Page header) -->

    <?php if(auth()->user()->checkSpPermission('magang.create')): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Magang, Pengalaman Organisasi, Kepanitiaan, Kegiatan Sosial/Volunter')); ?>

            <a class="btn btn-small btn-success pull-right" href="#addMagangModal" data-toggle='modal'>
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
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/magang'), 'filter_id'=>'magangFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('magang.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addMagangModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('magang.formadd', ['magang'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editMagangModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('magang.formedit', ['magang'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showMagangModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showMagang"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/magang/magang.blade.php ENDPATH**/ ?>