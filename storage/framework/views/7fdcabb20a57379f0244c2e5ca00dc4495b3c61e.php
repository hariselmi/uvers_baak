<div id="employeeTable">

    <table id="myTable" class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th><?php echo e(trans('employee.name')); ?></th>
                <th><?php echo e(trans('employee.email')); ?></th>
                <th class="hidden-xs">Role</th>
                <th class="text-center"><?php echo e(__('Action')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->name); ?></td>
                    <td><?php echo e($value->email); ?></td>
                    <td>
                        <?php $n=1; ?>
                        <?php $__currentLoopData = $value->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($n > 1 ? ', ' : null); ?><?php echo e(ucwords($role)); ?>

                            <?php $n++; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [['data-replace' => '#editEmployee', 'url' => '#editEmployeeModal', 'ajax-url' => url('employees/' . $value->id . '/edit'), 'name' => trans('item.edit'), 'icon' => 'pencil'], ['url' => 'employees/' . $value->id, 'name' => 'delete']];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$employees, 'index_route'=>route('employees.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="modal fade" id="createRole">
        <div class="modal-dialog">
            <?php echo e(Form::open(['route' => 'employeerole.create', 'method' => 'post'])); ?>

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo e(__('Tambah User Role')); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Name')); ?>

                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'required'])); ?>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
                    <button type="submit" class="btn btn-primary"
                        onclick="$('.modal-backdrop').remove();$('body').removeClass('modal-open');"><?php echo e(__('Create')); ?></button>
                </div>
            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/employee/table.blade.php ENDPATH**/ ?>