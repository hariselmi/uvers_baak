<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header m-3">
            <h1><?php echo e(__('User')); ?>

                <?php if($user->checkSpPermission('employees.create')): ?>
                    <a class="btn btn-small btn-primary pull-right left-margin-10" href="#addEmployeeModal"
                        data-toggle="modal"><i class="fa fa-plus"></i> <?php echo e(trans('employee.new_employee')); ?></a>
                <?php endif; ?>
                <?php if($user->checkSpPermission('employeerole.create')): ?>
                    <a class="btn btn-small btn-success pull-right left-margin-10" href="#createRole" data-toggle="modal"><i
                            class="fa fa-plus"></i> <?php echo e(__('Tambah Role')); ?></a> 
                <?php endif; ?>
                <a class="btn btn-small btn-info pull-right left-margin-10" href="<?php echo e(route('permissions.list')); ?>"
                    data-toggle="modal"><i class="fa fa-plus"></i> <?php echo e(__('Permissions')); ?></a>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-success">
                        <div class="box-header">
                            <?php echo $__env->make('partials.filters', ['filter_route'=>url('/employees'), 'filter_id'=>'employeeFilter'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="box-body">
                            <?php echo $__env->make('employee.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <div class="modal fade sub-modal" id="addEmployeeModal">
        <div class="modal-dialog modal-lg">
            <?php echo $__env->make('employee.form', ['employee'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/employee/index.blade.php ENDPATH**/ ?>