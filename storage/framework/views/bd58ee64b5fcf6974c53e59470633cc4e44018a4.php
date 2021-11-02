<div class="row" id="permissionList">
    <?php $__currentLoopData = $all_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $svalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-3">
            <div class="box box-success permission-list">
                <div class="box-header"><b><?php echo e(ucfirst($key)); ?></b> <input type="checkbox" id="checkAllPer"
                        class="pull-right" onclick="checkPermissions(this)"
                        <?php echo e($role->hasAnyPermission($svalue) ? 'checked' : ''); ?>></div>
                <div class="box-body">
                    <?php $__currentLoopData = $svalue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><input type="checkbox" name="permissions[]" value="<?php echo e($value->id); ?>"
                                <?php echo e($role->hasPermissionTo($value->name) ? 'checked' : ''); ?>

                                onclick="checAllkPermissions(this)"> <?php echo e($value->label); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/employee/permission_list.blade.php ENDPATH**/ ?>