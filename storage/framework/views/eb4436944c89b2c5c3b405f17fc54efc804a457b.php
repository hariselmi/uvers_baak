<div class="btn-group action-btn-group">
    <button type="button" class="btn action-btn dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-cog" aria-hidden="true"></i><span class="sr-only">Toggle Dropdown</span></button>
    <ul class="dropdown-menu" role="menu">
        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($action['name'] == 'delete'): ?>
                <li><a href="#" class="delete-form" onclick="return confirm('are you sure?')"><i class="fa fa-trash-o"></i><?php echo e(Form::open(array('url' => $action['url'], 'class' => 'form-inline'))); ?>

                <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                <?php echo e(Form::submit('Hapus', array('class' => 'delete-btn'))); ?>

                <?php echo e(Form::close()); ?></a></li>
            <?php else: ?>
                <li><a href="<?php echo e($action['url']); ?>" 
                    <?php if(!empty($action['data-replace'])): ?> data-replace-empty="<?php echo e($action['data-replace']); ?>" <?php endif; ?>
                    <?php if(!empty($action['ajax-url'])): ?> data-ajax-url="<?php echo e($action['ajax-url']); ?>" data-toggle="modal" <?php endif; ?>
                <?php if(isset($action['target'])): ?>
                    target="<?php echo e($action['target']); ?>" 
                <?php endif; ?>
                 ><i class="fa fa-<?php echo e(!empty($action['icon']) ? $action['icon'] : 'eye'); ?>"></i><?php echo e($action['name']); ?></a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/actions.blade.php ENDPATH**/ ?>