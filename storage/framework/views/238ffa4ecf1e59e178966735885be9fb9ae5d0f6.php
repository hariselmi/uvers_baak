<?php if(!empty($items->firstItem())): ?>
<div class="row">
    <div class="col-sm-6">
      Showing items <?php echo e($items->firstItem()); ?> to <?php echo e($items->lastItem()); ?> out of <?php echo e($items->total()); ?>

    </div>
    <div class="col-sm-6">
      <div class="pull-right">
        <ul class="pagination">
          <?php if($items->currentPage() > 1): ?>
          <li><a href="javascript:;" data-ajax-url="<?php echo e($index_route); ?>?page=<?php echo e($items->currentPage() - 1); ?>"><i class='fa fa-angle-double-left'></i> prev</a></li>
          <?php else: ?>
          <li class="disabled"><a href="javascript:;"><i class='fa fa-angle-double-left'></i> prev</a></li>
          <?php endif; ?>
          <?php for($i=1;$i<=$items->lastPage(); $i++): ?>
            <?php if($items->currentPage() == $i): ?> 
            <li class="active hidden-xs"><a href="javascript:;"><?php echo e($i); ?></a></li>
            <?php else: ?>
            <li class="hidden-xs"><a href="javascript:;" data-ajax-url="<?php echo e($index_route); ?>?page=<?php echo e($i); ?>"><?php echo e($i); ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>
          <?php if($items->currentPage() < $items->lastPage()): ?>
          <li><a href="javascript:;" data-ajax-url="<?php echo e($index_route); ?>?page=<?php echo e($items->currentPage() + 1); ?>">next <i class='fa fa-angle-double-right'></i></a></li>
          <?php else: ?>
          <li class="disabled"><a href="javascript:;">next <i class='fa fa-angle-double-right'></i></a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
<?php endif; ?><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/partials/pagination.blade.php ENDPATH**/ ?>