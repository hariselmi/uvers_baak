<div class="row">
    <form class="form-inline custom-filter" action="<?php echo e($filter_route); ?>" method="GET" id="<?php echo e($filter_id); ?>">
        <div class="col-md-12">
            <div class="form-group pr-2">
              <label class="pr-1" for="per_page"><?php echo e(__('Show')); ?> </label>
              <select autocomplete="off" class="form-control" name="filter[per_page]" id="per_page"  onchange="$('#<?php echo e($filter_id); ?>').submit()">
                  <option value="10">10 entries</option>
                  <option value="25">25 entries</option>
                  <option value="50">50 entries</option>
                  <option value="100">100 entries</option>
              </select>
            </div>
            <?php if($filter_id == 'dailyreportFilter' || $filter_id == 'saleFilter' || $filter_id == 'receivingFilter'): ?>
            <div class="form-group pr-2">
                <label class="pr-1"><?php echo e(__('From')); ?> </label>
                <input autocomplete="off" type="text" name="filter[start_date]" id="start_date" class="form-control" onchange="$('#<?php echo e($filter_id); ?>').submit()" />
            </div>
            <div class="form-group pr-2">
                <label class="pr-1" for="EndDate"><?php echo e(__('To')); ?> </label>
                <input autocomplete="off" type="text" name="filter[end_date]" id="end_date" class="form-control" onchange="$('#<?php echo e($filter_id); ?>').submit()" />
            </div>
            <?php else: ?>
            <div class="form-group pull-right">
                <label class="pr-1" for="search"><?php echo e(__('Search')); ?> </label>
                <input autocomplete="off" type="text" name="filter[search]" id="search" class="form-control" onkeyup="submitOnEnter('#<?php echo e($filter_id); ?>')" />
            </div>
            <?php endif; ?>
            <?php if($filter_id == 'saleFilter'): ?>
            <div class="form-group pr-2">
                <label class="pr-1" for="customer"><?php echo e(__('Customers')); ?> </label>
                <select autocomplete="off" class="form-control select2" name="filter[customer]" id="customer"  onchange="$('#<?php echo e($filter_id); ?>').submit()">
                    <option value="">Select Customer</option>
                    <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
            <?php if($filter_id == 'receivingFilter'): ?>
            <div class="form-group pr-2">
                <label class="pr-1" for="supplier"><?php echo e(__('Suppliers')); ?> </label>
                <select autocomplete="off" class="form-control select2" name="filter[supplier]" id="supplier"  onchange="$('#<?php echo e($filter_id); ?>').submit()">
                    <option value="">Select Supplier</option>
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
        </div>
    </form>
  </div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/filters.blade.php ENDPATH**/ ?>