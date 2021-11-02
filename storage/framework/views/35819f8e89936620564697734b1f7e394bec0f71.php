<?php if(Session::has('message')): ?>
    <p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>
<?php if(!empty($errors->all())): ?>
    <div class="alert alert-danger">
        <?php echo e(Html::ul($errors->all())); ?>

    </div>
<?php endif; ?><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/flash.blade.php ENDPATH**/ ?>