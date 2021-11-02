<?php if(!empty($employee)): ?>
    <div class="modal-content" id="editEmployee">
        <?php echo e(Form::model($employee, ['route' => ['employees.update', $employee->id], 'method' => 'PUT'])); ?>

    <?php else: ?>
        <div class="modal-content" id="addEmployee">
            <?php echo e(Form::open(['url' => 'employees', 'files' => true])); ?>

<?php endif; ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
    <?php if(!empty($employee)): ?> <?php echo e(__('Edit User')); ?> <?php else: ?>
            <?php echo e(__('Tambah User')); ?><?php endif; ?>
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <?php echo e(Form::label('name', trans('employee.name') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('name', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('email', trans('employee.email') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('email', null, ['class' => 'form-control'])); ?>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <?php echo e(Form::label('password', trans('employee.password'), ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('password_confirmation', trans('employee.confirm_password'), ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <input type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm Password">
                </div>
            </div>
        </div>
    </div>
    <?php if(auth()->user()->checkSpPermission('assaign.roles')): ?>
        <div class="form-group row">
            <?php echo e(Form::label('role', __('Role *'), ['class' => 'col-sm-2 text-center'])); ?>

            <div class="col-sm-10 pl-0">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span style="margin-right:30px"><input type="radio" name="role[]" value="<?php echo e($role->name); ?>"
                            <?php echo e(!empty($employee) && $employee->hasRole($role->name) ? 'checked' : ''); ?>>
                        <?php echo e(ucwords($role->name)); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <?php echo e(Form::submit(__('Simpan'), ['class' => 'btn btn-success'])); ?>

    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
</div>
<?php echo e(Form::close()); ?>

</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/employee/form.blade.php ENDPATH**/ ?>