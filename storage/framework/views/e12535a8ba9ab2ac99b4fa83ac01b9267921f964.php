<div class="" id="pendaftaranDetails">
    <!-- Content Header (Page header) -->

    <?php if(Auth::user()->rolte == 'admin'): ?>
    <section class="content-header m-3">
        <h1><?php echo e(__('Pendaftaran Beasiswa')); ?>

            <a class="btn btn-small btn-success pull-right" href="#addPendaftaranBeasiswaModal" data-toggle='modal'>
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
                        <?php echo $__env->make('partials.filters', ['filter_route'=>url('/pendaftaran'), 'filter_id'=>'pendaftaranFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="box-body">
                        <?php echo $__env->make('pendaftaran.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="modal fade sub-modal" id="addPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('pendaftaran.formadd', ['pendaftaran'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="editPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('pendaftaran.formedit', ['pendaftaran'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="daftarPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                <?php echo $__env->make('pendaftaran.daftar', ['pendaftaran'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        <div class="modal fade sub-modal" id="showPendaftaranBeasiswaModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" id="showPendaftaranBeasiswa"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pendaftaran/pendaftaran.blade.php ENDPATH**/ ?>