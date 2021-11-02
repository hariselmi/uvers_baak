<div class="" id="pelatihanDetails">
    <!-- Content Header (Page header) -->

    <?php if(auth()->user()->checkSpPermission('pelatihan.create')): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Keikutsertaan Pelatihan/ Seminar/ Workshop')); ?>

            <a class="btn btn-small btn-success pull-right" href="#addPelatihanModal" data-toggle='modal'>
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
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/pelatihan'), 'filter_id'=>'pelatihanFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('pelatihan.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addPelatihanModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('pelatihan.formadd', ['pelatihan'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editPelatihanModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('pelatihan.formedit', ['pelatihan'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showPelatihanModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showPelatihan"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pelatihan/pelatihan.blade.php ENDPATH**/ ?>