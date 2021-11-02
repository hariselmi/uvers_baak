<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header m-3">
            <div class="row">
                <div class="col-xs-6">
                    <h1 class="m-0"><?php echo e(__('All Permissions')); ?></h1>
                </div>
                <div class="col-xs-6 text-right"><button type="button" submit-toggle="#rolePermissionMapping"
                        class="btn btn-success"><?php echo e(__('Save Permissions')); ?></button>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- /.box-header -->
                    <!-- /.box -->
                    <?php echo e(Form::open(['url' => route('permissionrole.create'), 'id' => 'rolePermissionMapping'])); ?>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="box box-success">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-xs-3 mt-1 text-right"><strong><?php echo e(__('Select a Role')); ?></strong>
                                        </div>
                                        <div class="col-xs-8">
                                            <?php echo e(Form::select('role_id', $roles, $role_id, ['class' => 'form-control', 'onchange' => 'onChange()', 'id' => 'role_id'])); ?>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>
                    <?php echo $__env->make('employee.permission_list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo e(Form::close()); ?>

                    <!-- /.box-header -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <div class="modal fade" id="createPermission">
        <div class="modal-dialog">
            <!-- <?php echo e(Form::open(['route' => 'permissions.create', 'method' => 'post'])); ?>

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><?php echo e(__('Add a Permission')); ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <?php echo e(Form::label('label', __('Name'))); ?>

                            <?php echo e(Form::text('label', null, ['class' => 'form-control'])); ?>

                        </div>
                        <div class="form-group">
                            <?php echo e(Form::label('name', __('Route'))); ?>

                            <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Create')); ?></button>
                    </div>
                </div>
                <?php echo e(Form::close()); ?> -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin_dynamic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/employee/permissions.blade.php ENDPATH**/ ?>